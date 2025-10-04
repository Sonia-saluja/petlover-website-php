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
                    <h1 class="m-0">ORDERS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">ORDERS</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->

    <div class="container">
        <form id="formFilter" name="formFilter" action="admin_reservefilter.php" method="POST"
            class="pull-left col-md-7 hidden-print">

            <div class="form-horizontal wow fadeInDown">
                <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> Fillter Ordere
                    Here
                </label>
                <div class="col-md-6">

                    <select name="filter" id="filter" class="form-control">
                        <option value="New">New</option>

                        <option value="cancel">Cancel</option>
                        <option value="completed">Completed</option>
                    </select>

                </div>
            </div>
        </form>

        <div class="col-md-12">
            <table class="table table-hover table-condensed wow fadeInDown">

                <tbody id="tablebody">
                    <?php include('../config/dbcon.php');



			   $stat = 'new';
			   $total = 0;
			   $sql = ("SELECT tblcnp.*,tblorders.* 
                    FROM tblorders LEFT JOIN 
                    tblcnp ON tblorders.cnpoid = tblcnp.id 
                    WHERE tblorders.ostatus = 'New' order by tblorders.id LIMIT 0,30 ")
                     or die (mysqli_error());

        $result=mysqli_query($con, $sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						$total = $row['prize'] * $row['oqty'];?>
                    <!-- <tr class="success" style="cursor:pointer;">
                        <td>
                            <a href="#viewModal<?php echo $row['id']?>" data-toggle="modal"
                                data-target="#viewModal<?php echo $row['id']?>" class="btn btn-default">
                               
                                 View</a></td>
                        <td><?php echo $row['cname'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['timestamp'];?></td>


                    </tr> -->
                    <!-- <?php
                    ?> -->
                    <!-- Modal -->
                    <div class="modal fade" id="viewModal<?php echo $row['id']?>" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button><br>
                                    <h4 class="modal-title" id="myModalLabel"> ORDER INFORMATION</h4>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body" id="div1">
                                        <input type="hidden" name="fdid" value="<?php echo $row['id']?>">

                                        <dl class="dl-horizontal ">

                                            <dt>Pet Ordered:</dt>
                                            <dd><?php echo $row['name'].' ';?><img src="<?php echo $row['image']?>"
                                                    width="90px;" class="img-responsive img-rounded"></dd>
                                            <dt>Description:</dt>
                                            <dd><?php echo $row['description'];?></dd>
                                            <dt>Price:</dt>
                                            <dd><?php echo 'Shs. '.$row['prize'];?></dd>
                                            <dt>Quantity:</dt>
                                            <dd><?php echo $row['oqty'];?></dd>
                                            <dt>Total:</dt>
                                            <dd><?php echo 'Shs. '.number_format($total,2,'.',',');?></dd>
                                            <hr style="border-top: 1px dashed #8c8b8b;
	                                                border-bottom: 1px dashed #fff;">
                                            <h4><b>CUSTOMER DETAILS</b></h4>
                                            <dt>Ordered by:</dt>
                                            <dd><?php echo $row['cname'].' ';?></dd>
                                            <dt>Ordered Type:</dt>
                                            <dd><?php echo $row['otype'].' ';?></dd>
                                            <dt>Date Pick-up:</dt>
                                            <dd><?php echo $row['datepickup'].' ';?></dd>
                                            <dt>Date Order:</dt>
                                            <dd><?php echo $row['timestamp'];?></dd>
                                            <dt>Address:</dt>
                                            <dd><?php echo $row['address'];?></dd>
                                            <dt>Contact:</dt>
                                            <dd><?php echo $row['contact'];?></dd>

                                            <dt>Status:</dt>
                                            <dd><?php echo $row['ostatus'];?></dd>
                                        </dl>

                                    </div>
                                    <em style="font-size:12px;color:red; margin-left:20px;">Note: Updated Order status
                                        here</em>
                                    <div class="modal-footer">
                                        <a href="index.php" class="btn btn-default wow fadeInDown">Close</a>
                                        <button type="button" onClick="printContent('div1');"
                                            class="btn btn-info wow fadeInDown"><i
                                                class="glyphicon glyphicon-print"></i> Download Receipt</button>
                                        <button type="submit" class="btn btn-danger wow fadeInDown" name="cancel"><i
                                                class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
                                        <button type="submit" class="btn btn-success wow fadeInDown" name="deliver"><i
                                                class="glyphicon glyphicon-send"></i> Delivered</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- --------------------------modal  -->
    <?php
    //  include('../config/dbcon.php');
	//    if(isset($_POST['deliver'])){
	// 	   $id = $_POST['fdid'];
	// 	   $sql =("UPDATE tblorders set ostatus = 'Completed' WHERE id = '$id'") or die (mysqli_error());
		   
    //     $result=mysqli_query($con, $sql);
    //    if($result==true){
	// 		   header("location:index.php");
    //         }
		   
	// 	   }
	// 	 else if(isset($_POST['cancel'])){
	// 		 $id = $_POST['fdid'];
	// 		 $sql = ("UPDATE tblorders set ostatus = 'Cancel' WHERE id = '$id'") or die (mysqli_error());
	// 		 $result=mysqli_query($con, $sql);
    //    if($result== true){
	// 			 header("location:index.php");}
	// 		 }
	// 	   ?>


    <!-- endmodal -->
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">View Orders
                        </h3>

                    </div>
                    <div class="grid-container">

                        <div class="grid-item mt-3 float-end">
                            <a href="" onClick="window.print();return false"
                                class="btn btn-info pull-right hidden-print wow fadeInDown"><img
                                    src="../../images/ico/printer.ico" style="max-width: 24px; max-height: 24px;">
                                Print</a>
                            <a href="index.php" class="btn btn-default pull-right hidden-print wow fadeInDown"
                                style="margin-right:10px;"><img src="../../images/ico/refresh.png"
                                    style="max-width: 24px; max-height: 24px;">
                                Refresh</a>
                        </div>
                    </div>
                    <!-- <form id="formFilter" name="formFilter" action="admin_reservefilter.php" method="POST"
                        class="pull-left col-md-7 hidden-print">

                        <div class="">
                            <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> VIEW
                                RECORDS</label>
                            <div class="col-md-6">

                                <select name="filter" id="filter" class="form-control">
                                    <option value="New">New</option>

                                    <option value="cancel">Cancel</option>
                                    <option value="completed">Completed</option>
                                </select>

                            </div>

                        </div>
                    </form> -->


                    <!-- <a href="" onClick="window.print();return false"
                        class="btn btn-info pull-right hidden-print wow fadeInDown"><img src="images/ico/printer.ico"
                            style="max-width: 24px; max-height: 24px;"> Print</a>
                    <a href="index.php" class="btn btn-default pull-right hidden-print wow fadeInDown"
                        style="margin-right:10px;"><img src="images/ico/refresh.png"
                            style="max-width: 24px; max-height: 24px;">
                        Refresh</a> -->
                    <!-- /.card-header -->
                    <div class="card-body responsive">
                        <!-- <table id="example1" class="table table-bordered table-striped">  -->
                        <table id="" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>From</th>
                                    <th>Product Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody id="tablebody">
                                <?php
                                
                                $stat = 'new';
                                $total = 0;
                                $i = 1;
                                $sql = ("SELECT tblcnp.*,tblorders.* 
                                        FROM tblorders LEFT JOIN 
                                        tblcnp ON tblorders.cnpoid = tblcnp.id 
                                        WHERE tblorders.ostatus = 'New' order by tblorders.id LIMIT 0,30 ")
                                        or die (mysqli_error());

                                $result=mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result)>0){
                                    foreach ($result as $row) {
                                        $total = $row['prize'] * $row['oqty'];

                                
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['cname'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['contact'];?></td>
                                    <td><?php echo $row['timestamp'];?></td>

                                    <td>
                                        <!-- <?php
                                    // if ($row['ostatus'] == "new") {
                                    //     echo '<a class="btn btn-sm btn-success" href="status_update.php?id=' . $row['id'] . '&ostatus=1">New</a>';
                                    // } else {
                                    //     echo '<a class="btn btn-sm btn-danger" href="status_update.php?id=' . $data['id'] . '&ostatus=0">completed</a>';
                                    // }
                                    ?> -->
                                        <a href="#viewModal<?php echo $row['id']?>" data-toggle="modal"
                                            data-target="#viewModal<?php echo $row['id']?>" class="btn btn-primary">
                                            View</a>
                                        <a href="admin_reject_completed.php?id=<?php echo $row['id']?>"
                                            class="btn btn-danger"> Delete</a>
                                        <!-- <button class="btn- btn-primary">view</button> -->

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td colspan="7" class="text-center">NO DATA FOUND</td>
                                </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr No</th>
                                    <th>From</th>
                                    <th>Product Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Status</th>

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
    <!-------------------------------------------------------order deliver status canacel r completed---------------------------------------------------------------->
    <?php
  include("status_update.php");

?>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include("../includes/footer.php");

?>