<?php

include("../config/dbcon.php");

// delete staff code 
if(isset($_POST['deleteUserbtn'])){

    $product_id = $_POST['delete_id'];
    
    $delete = "DELETE FROM tblcnp WHERE id='$product_id'";

    $query_run = mysqli_query($con,$delete);

    if($query_run==true){
        echo '<script>alert("Delete Successfully!");
                    window.location.href="view_product.php";</script>';
                }else {
                        echo '<script>alert("Sory unable to process your request!");
                    window.location.href="view_product.php";</script>';
                        }
        
    }

    
?>