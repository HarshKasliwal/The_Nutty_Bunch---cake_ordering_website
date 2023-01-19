<?php
session_start();
include("same.php");

$ids=$_GET["ck"];

$del_qry="DELETE FROM `cake_details` WHERE cake_id=$ids";

$qry=mysqli_query($con,$del_qry);

if($qry)
{
    echo "<script>window.location='cake-manage.php'</script>";
}

?>