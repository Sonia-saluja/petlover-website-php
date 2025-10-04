<?php

include('../config/dbcon.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $_GET['ostatus'];
    // var_dump($_GET['ostatus']);die();
    $query = "UPDATE tblorders SET ostatus=$status WHERE id=$id";
    
    $result = mysqli_query($con, $query);
    
    if($result==true){
        echo '<script>alert("update status Successfully!");
                    window.location.href="view_orders.php";</script>';
                }else {
                        echo '<script>alert("Sory unable to process your request!");
                    window.location.href="view_orders.php";</script>';
                        }
        
    }
 
 ?>


<?php
    // include('../config/dbcon.php');
	   if(isset($_POST['deliver'])){
		   $id = $_POST['fdid'];
		   $sql =("UPDATE tblorders set ostatus = 'Completed' WHERE id = '$id'") or die (mysqli_error());
		   
        $result=mysqli_query($con, $sql);
       if($result==true){
        echo '<script>alert("status updated.");
        window.location.href="view_orders.php";
</script>';
			
            }
		   
		   }
		 else if(isset($_POST['cancel'])){
			 $id = $_POST['fdid'];
			 $sql = ("UPDATE tblorders set ostatus = 'Cancel' WHERE id = '$id'") or die (mysqli_error());
			 $result=mysqli_query($con, $sql);
       if($result== true){
                 echo '<script>alert("status updated.");
        window.location.href="view_orders.php";
    </script>';
			 
                }
			 }
	// 	   ?>