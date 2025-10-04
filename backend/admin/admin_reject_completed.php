<?php
    include('../config/dbcon.php');
   $id = $_GET['id'];
   $sql = ("DELETE FROM tblorders where id = '$id'") or die (mysqli_error());
   $result=mysqli_query($con, $sql);
   
if($result==true){
    echo '<script>alert("delete successfully!");
                  window.location.href="view_orders.php"</script>';
    }
    else{
        echo '<script>alert("Sorry unable to process your request!");
                  window.location.href="view_orders.php"</script>';
        }
//    header("location:view_orders.php.php");
?>