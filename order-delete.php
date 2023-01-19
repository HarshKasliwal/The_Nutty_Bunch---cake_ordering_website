<?php
session_start();
include("same.php");

$ids=$_GET["ordl"];

$del_qry="DELETE FROM `order_details` WHERE o_id=$ids";

$qry=mysqli_query($con,$del_qry);

if($qry)
{
    $d_qr="DELETE FROM `order_master` WHERE o_id=$ids";
    
    $done_qry=mysqli_query($con,$d_qr);
    
    if($done_qry)
    {
   
         echo "<script>window.location='done-order.php'</script>";
    }
   
}

?>