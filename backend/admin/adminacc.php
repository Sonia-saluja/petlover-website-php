<?php
   include("../includes/header.php");
   include("../includes/topbar.php");
   include("../includes/sidebar.php");
//    include("../config/dbcon.php");


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin Profile</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Profile
                        </h3>
                        <button type="button" class="btn btn-primary btn-sm float-right">
                            <a href="#" style="color:white" ;> View Profile</a>
                        </button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="alert alert-success" id="infomsg" style="text-align: center"></div>
                                    <center><img src="../assets/icon-images/blue-circle-with-white-user_78370-4707.avif"
                                            class="img-responsive wow fadeInDown" style="height:200px;" /></center>
                                    <div>
                                        <?php
                                            // session_start();
                                            include('../config/dbcon.php');
                                            // $id = $_SESSION['proprietor_id'];
                                            $sql = ("SELECT * FROM admininfo WHERE id=1");
                                            $result=mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result))
                                                {
                                                    $name = $row['name'];
                                                    
                                                    $email = $row['email'];
                                                    $phone = $row['contact'];
                                                    $username = $row['username'];
                                                    $password = $row['password'];
                                                    
                                                }
                                            ?>

                                        <h3 style="text-align:center; font-weight:bold;" class="wow fadeInDown">Admin
                                            Account Information
                                        </h3>
                                        <hr>
                                        <table class="table ">
                                            <tr>
                                                <th>Admin Name</th>
                                                <th>Phone#</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                            </tr>
                                            <tr>
                                            <td><?php echo @$name ?></td>
                                                <td><?php echo @$phone ?></td>
                                                <td><?php echo @$email ?></td>
                                                <td><?php echo @$username ?></td>
                                                <td><?php echo @$password ?></td>
                                            </tr>
                                        </table>
                                    
                                        <hr>
                                    </div>
                                    </form>   
                                     <h1 class="text-center"><b>Update profile here</b></h1>
                                    <form class="form-horizontal" name="adminacc" id="adminacc" method="POST"
                                        action="adminacc_process.php" style="margin-top: 20px;">
                                        <!-- <table>
                                            <tr>
                                                <td style="text-align:right;font-weight:bold;">Profile Avatar: &emsp;
                                                </td>
                                                <td style="text-align:center;">&emsp; <input type="file" name="image" />
                                                </td>
                                            </tr>
                                        </table> -->
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label wow fadeInDown">Admin
                                                Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control wow fadeInDown" id="name"
                                                    name="proprietor_name" value="<?php echo $name?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username"
                                                class="col-sm-4 control-label wow fadeInDown">Phone</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control wow fadeInDown" id="Phone"
                                                    name="phone" value="<?php echo $phone?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username"
                                                class="col-sm-4 control-label wow fadeInDown">Email</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control wow fadeInDown" id="email"
                                                    name="email" value="<?php echo $email?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="username"
                                                class="col-sm-4 control-label wow fadeInDown">Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control wow fadeInDown" id="username"
                                                    name="nuname"  value="<?php echo $username?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="npassword"
                                                class="col-sm-4 control-label wow fadeInDown">Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control wow fadeInDown"
                                                    id="npassword" name="npword"  value="<?php echo $password?>">
                                            </div>
                                        </div>



                                        <hr>
                                        <em style="color:red;" class="wow fadeInDOwn"> Note Fill up the fields before
                                            hitting save changes
                                            button</em>
                                        <div class="form-group">

                                            <center><input type="submit" class="btn btn-success wow fadeInDown"
                                                    name="update" value="Save Changes">
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- <input type="submit" formenctype="multipart/form-data" value="Submit as Multipart/form-data"> -->
                                <!-- <button type="submit" class="btn btn-success wow fadeInDown"
                                                    name="update" value="Save Changes">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button> -->

                            </div>
                       
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">


        </div>

    </div>


    <script>
    $("#page").removeClass();
    $("#messages").removeClass();
    $("#admin").addClass("active");

    $("#infomsg").hide();

    $('#submit').click(function() {
        $.post($("#adminacc").attr("action"),
            $("#adminacc :input").serializeArray(),
            function(info) {
                $("#infomsg").show();
                $("#infomsg").empty();
                $("#infomsg").html(info);
            });
        $("#adminacc").submit(function() {
            return false;
        });
    });
    </script>

    <br><br><br>
    <!--*************************************************** FOOTERS **********************************************-->

    <?php
include("../includes/footer.php");

?>