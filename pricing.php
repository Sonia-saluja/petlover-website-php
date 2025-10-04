<?php

include("frontend/includes/header.php");
include('backend/config/dbcon.php');
?>
<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Pricing</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container" style="display:flex">
        <?php 
        $count = 0;
        $id = 0;
        $sql = "SELECT * FROM tblcnp WHERE status = 'available' order by id desc" or die (mysqli_error($con));
        
        $result=mysqli_query($con, $sql) or die (mysqli_error($con));
        
        if(mysqli_num_rows($result)>=0){
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $count++;
        ?>

        <div class="row" style="padding-right:15px" >
            <div class="col-md-12" >
                <div class="blog-entry" style="box-shadow: 0px 0px 20px -10px gray;">
                    <?php	
						$path = $row['image'];
						$path = explode('..', $path);
						unset($path[0]);
						$path = implode('..', $path);
						
						?>
                    <center><img src="backend<?php echo $path;?>" width="100%" height="250px;"
                            class="img-responsive img-rounded wow fadeInDown"></center>

                    <!-- <a href="blog-single.html" class="block-20 rounded"
							style="background-image: url('images/image_1.jpg');">
						</a> -->
                    <div class="text p-4" style="height:400px">
                        <div class=" mb-2">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th><?php echo $row['name'];?></th>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <th><?php echo $row['age'];?></th>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <th><?php echo $row['prize'];?> </th>
                                </tr>
                            </table>
                        </div>
                        <h3 class="heading"><?php echo $row['description'];?></h3>

                        <button class="btn btn-success  wow fadeInDown" name="order" type="button"
                            style="margin-top:25px;" data-toggle="modal" data-target="#orderModal<?php echo $id;?>">Add
                            to Cart</button>
                  </div>
                </div>
            </div>
            <!-- opeb modakl on addd cart -->
            <div class="modal fade" id="orderModal<?php echo $id;?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"> CUSTOMER
                                INFORMATION</h4>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                            <div class="modal-body">
                                <p>Fields with (*) are required</p>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Name*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your name" required>
                                        <input type="hidden" class="form-control" id="fooddid" name="foodid"
                                            value="<?php echo $id;?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Address*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Contact*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="contact" class="form-control" required
                                            placeholder="Your number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Quantity*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="number" name="oqty" class="form-control" required placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Order Type*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="otype" class="form-control" required>
                                            <option>Select</option>
                                            <option value="Deliver">Deliver</option>
                                            <option value="Pick-up">Pick-up</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" id="datepickup">
                                    <div class="col-md-2">
                                        <label>Date Pick up*</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" name="datep" class="form-control" />
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary" name="savechanges"><i
                                        class="glyphicon glyphicon-thumbs-up"></i> Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php }}

else {echo '<strong style="color:red">No availables data in server</strong>'; } 

?>
        <?php 
// include('includes/dbconn.php');
if(isset($_POST['savechanges'])){
		$id = $_POST['foodid'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$qty = $_POST['oqty'];
		$otype = $_POST['otype'];
		$datep = $_POST['datep'];


		$sql =("SELECT * FROM tblorders WHERE cname = '$name'") or die (mysqli_error());
    $result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)==5){
					echo '<script>alert("You reach maximum order of 5");
								window.loaction.href="pricing.php";</script>';
				}
				else{

				$sql = ("INSERT INTO tblorders VALUES(NULL,'$name','$address','$contact','$id','$qty','new',NULL,'$otype','$datep')") or die (mysqli_error());
        $result=mysqli_query($con, $sql);
							if($result==true){
								echo '<script>alert("Your order will be process.The system will follow up by contacting your number thankyou!");
											 window.location.href="pricing.php"</script>';}
											 else{
												 echo '<script>alert("Sorry unable to process your request. please try again later!");
											 window.location.href="pricing.php"</script>';
												 }
	}	}
?>
        <!-- <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div> -->
    </div>
</section>
<?php
		include("frontend/includes/footer.php");

?>