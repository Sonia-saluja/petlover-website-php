<?php

include("../config/dbcon.php");
if(isset($_POST['savechanges'])){
    $id = $_POST['id'];
    // $id = $_GET['prod_id'];
  
    // select data from database
    $select="SELECT *FROM tblcnp WHERE id='$id'";
    $result=mysqli_query($con,$select);
    $row=mysqli_fetch_array($result);
    //set path
    $uploadDir="../assets/uploads".$row['image'];
    // var_dump(  $uploadDir);die();
    // unlink($path);
  if(!empty($uploadDir)){

    $name = $_POST['name'];
    $des = $_POST['des'];
    $stat = $_POST['stat'];
    $prize = $_POST['prize'];
    $age = $_POST['age'];
    
    $sql = ("UPDATE tblcnp set name = '$name',
    description = '$des',
    status = '$stat',
    prize = '$prize',
    age = '$age',
    image = '$uploadDir ' 
    WHERE id = '$id'") or die (mysqli_error());
$result=mysqli_query($con, $sql);

if($result==true){
echo '<script>alert("Update successfully!");
              window.location.href="view_product.php"</script>';
}
else{
    echo '<script>alert("Sorry unable to process your request!");
              window.location.href="view_product.php"</script>';
    }
  }
    $uploadDir = "../assets/uploads/"; // Directory to store uploaded images
    //    $uploadDir = "../uploads/"
       // Check if the file is an actual image
       $check = getimagesize($_FILES["image"]["tmp_name"]);
       if ($check !== false) {
           $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
           
           // Generate a unique name for the image
           $imageName = uniqid() . "." . $imageFileType;
           $targetPath = $uploadDir . $imageName;
    
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

       
    // if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    //     $targetDir = "uploads/"; // Directory where you want to store the images
    //     $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    //     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    //     // Check if the file is an image
    //     $allowedTypes = array("jpg", "jpeg", "png", "gif");
    //     if (in_array($imageFileType, $allowedTypes)) {
    //         // Move the uploaded file to the target directory
    //         if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    //             echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
    //             $location = $targetFile;
    //             // Perform database update if needed
    //             // Example: $sql = "UPDATE tablename SET image='$targetFile' WHERE id=1";
    //         } else {
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    //     } else {
    //         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     }
    // } else {
    //     echo "No file uploaded or an error occurred while uploading.";
    // }
    // $sql = ("UPDATE tblcnp set name = '$name',
    // description = '$des',
    // status = '$stat',
    // prize = '$prize',
    // image = '$location' 
    // WHERE id = '$id'") or die (mysqli_error());
    //image
//         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//         $image_name = addslashes($_FILES['image']['name']);
//         $image_size = getimagesize($_FILES['image']['tmp_name']);
// //
//         move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/uploads/" . $_FILES["image"]["name"]);
//         $location = "../assets/uploads/" . $_FILES["image"]["name"];
                            
                    
            $sql = ("UPDATE tblcnp set name = '$name',
                    description = '$des',
                    status = '$stat',
                    prize = '$prize',
                    age = '$age',
                    image = '      $imagePath ' 
                    WHERE id = '$id'") or die (mysqli_error());
    $result=mysqli_query($con, $sql);

            if($result==true){
                echo '<script>alert("Update successfully!");
                              window.location.href="view_product.php"</script>';
                }
                else{
                    echo '<script>alert("Sorry unable to process your request!");
                              window.location.href="view_product.php"</script>';
                    }


}
mysqli_close($con);




?>