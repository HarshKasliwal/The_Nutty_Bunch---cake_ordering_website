<?php
session_start();
include("same.php");

$ids=$_GET["fy"];

$del_qry="DELETE FROM `cake_flavour` WHERE f_id=$ids";

$qry=mysqli_query($con,$del_qry);

if($qry)
{
    echo "<script>window.location='flavour-manage.php'</script>";
}

?>