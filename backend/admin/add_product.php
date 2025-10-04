<?php
   include("../includes/header.php");
   include("../includes/topbar.php");
   include("../includes/sidebar.php");
   include("../config/dbcon.php");


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Add Product
                        </h3>
                        <button type="button" class="btn btn-primary btn-sm float-right">
                            <a href="view_product.php" style="color:white" ;> View product</a>
                        </button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Enter Product name</label>
                                            <input type="text" class="form-control" name="cnpname" placeholder="Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Enter Price</label>
                                            <input type="text" class="form-control" name="prize" placeholder="price"
                                                required>
                                        </div>

                                    </div>
                                </div>
                                <!-- row--2 -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" name="des"
                                                placeholder="Description" required></textarea>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- row--3 -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Enter Status</label>
                                            <select name="stat" class="form-control">
                                                <option>Select</option>
                                                <option value="Available">Available</option>
                                                <option value="Un-Available">Un-Available</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input class="form-control" type="file" name="image" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- <input type="submit" formenctype="multipart/form-data" value="Submit as Multipart/form-data"> -->
                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <?php 
include('../config/dbcon.php');
if(isset($_POST['save'])){
			$name = $_POST['cnpname'];
			$age = $_POST['age'];
			$prize = $_POST['prize'];
			$des = $_POST['des'];
			$stat = $_POST['stat'];
   $uploadDir = "../assets/uploads/"; // Directory to store uploaded images
//    $uploadDir = "../uploads/"
   // Check if the file is an actual image
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if ($check !== false) {
       $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
       
       // Generate a unique name for the image
       $imageName = uniqid() . "." . $imageFileType;
    //    $targetPath = $uploadDir . $imageName;
       $targetPath = $imageName;

       // Check if the file already exists
       if (file_exists($targetPath)) 
       {
           echo "Sorry, file already exists.";
           
       } else if ($_FILES["image"]["size"] > 500000) {

           echo "Sorry, your file is too large.";
           
       } else {
              
               // Allow only certain file formats (you can adjust this as needed)
               $allowed_extesnions = array("jpg", "jpeg", "png", "gif");
               
               if (in_array($imageFileType, $allowed_extesnions)) {
                   // Move the uploaded file to the specified directory
                   if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
                       echo "The file ". htmlspecialchars( $imageName ). " has been uploaded.";

                       // Insert image path or data into the database
                       // Example: 
                       $imagePath = $targetPath;
                       // $sql = "INSERT INTO images (image_path) VALUES ('$imagePath')";
                       // Execute your database query here
                   } else {
                       echo "Sorry, there was an error uploading your file.";
                   }
               } else{
                       echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
               }
       }
   } else {
       echo "File is not an image.";
   }
			if(empty($name) || empty($prize) || empty($des) || empty($stat)){

                // var_dump($name);
                // var_dump($prize);
                // var_dump($des);
                // var_dump($stat);die();
					echo '<script>alert("Fields must be empty.");
								 window.location.href="add_product.php";
					</script>';
				
				}else {
					$sql = ("INSERT INTO tblcnp VALUES(NULL,'$name','$prize','$age','$des','$imagePath','$stat')") or die (mysql_error());
                    $result=mysqli_query($con, $sql);
					if($result==true){
						echo '<script>alert("Save Successfully!");
									window.location.href="add_product.php";</script>';
                                }else {
										echo '<script>alert("Sory unable to process your request!");
									window.location.href="add_product.php";</script>';
										}
						
					}
		}
?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("../includes/footer.php");
?>