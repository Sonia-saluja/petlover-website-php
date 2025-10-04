<?php
   include("../includes/header.php");
   include("../includes/topbar.php");
   include("../includes/sidebar.php");
   include("../config/dbcon.php");


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product update here </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">update product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.card -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Update product here
                        </h3>
                        <button type="button" class="btn btn-info btn-sm float-right">
                            <a href="view_product.php" style="color:white" ;> View product</a>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                            $id = $_GET['prod_id'];
                         $select_query = "SELECT * FROM tblcnp WHERE id=$id";
                         $query_run = mysqli_query($con, $select_query);
                         $i = 1;
                         if (mysqli_num_rows($query_run) > 0) {
                             foreach ($query_run as $data) {

                         
                        ?>
                        <form action="product_update.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" class="form-control" name="id"
                                            value="<?php echo $data['id'] ?? '';  ?>">
                                        <div class="form-group">
                                            <label>Enter Product name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo $data['name']  ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Enter Price</label>
                                            <input type="text" class="form-control" name="prize"
                                                value="<?php echo $data['prize']   ?>">
                                        </div>

                                    </div>
                                </div>
                                <!-- row--2 -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" name="des"
                                                value="<?php  echo $data['description']  ?>"><?php  echo $data['description'] ?? ''  ?></textarea>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age"
                                                value="<?php  echo $data['age'] ?? ''  ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- row--3 -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Enter Status</label>
                                            <select name="stat" class="form-control">
                                                <option value="<?php echo $data['status'];?>">
                                                    <?php echo $data['status'];?></option>
                                                <option>Select</option>
                                                <option value="Available">Available</option>
                                                <option value="Un-Available">Un-Available</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label>Upload Image</label>
                                                <input class="form-control" type="file" name="image"
                                                    value="<?php  echo $data['image'] ?? ''  ?>">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- <input type="submit" formenctype="multipart/form-data" value="Submit as Multipart/form-data"> -->
                                <button type="submit" name="savechanges" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>

                            </div>
                        </form>
                        <?php
                            }
                            ?>

                        <?php
                        }else{
                            echo "NO RESULT FOUND";
                        }
                        ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <?php
   
	?>
</div>
<?php
    include("../includes/footer.php");
?>