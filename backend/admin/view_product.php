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
    <!-- /.content-header -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="product_code.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>Are you sure.You want to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="deleteUserbtn" class="btn btn-primary">yes, Delete.!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Add Product
                        </h3>
                        <button type="button" class="btn btn-primary btn-sm float-right">
                            <a href="add_product.php" style="color:white" ;> Add product</a>
                        </button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body responsive">
                        <!-- <table id="example1" class="table table-bordered table-striped">  -->
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>images</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_query = "SELECT * FROM tblcnp";
                                $query_run = mysqli_query($con, $select_query);
                                $i = 1;
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $data) {

                                
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td> <img src="<?php echo $data['image']?>" style="height:80px;width:80px;"></td>

                                    <td><?php echo $data['name']    ?></td>
                                    <td><?php echo $data['age']    ?></td>
                                    <td><?php echo $data['prize']    ?></td>
                                    <td><?php echo $data['description']    ?></td>
                                    <td><?php
                                           if($data['status'] == "Available"){
                                            echo "<button class='btn btn-success'>".$data['status']."</button>";
                                           }else{
                                            echo "<button class='btn btn-danger unavaiable' style=' width: 118px;'>".$data['status']."</button>";
                                           }
                                    
                                    
                                    // echo $data['status'] 
                                    ?>
                                    </td>

                                    <td>

                                        <div class="grid-container">
                                            <div class="grid-item"><a
                                                    href="product_edit.php?prod_id=<?php echo $data['id'] ?>"
                                                    class="btn btn-warning btn-sm">edit</a></div>
                                            <div class="grid-item"><button type="button"
                                                    class="btn btn-danger btn-sm deletebtn"
                                                    value="<?php  echo $data['id'];  ?>"
                                                    >Delete</button></div>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td colspan="6" class="text-center">NO DATA FOUND</td>
                                </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr no</th>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Age</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("../includes/footer.php");
?>