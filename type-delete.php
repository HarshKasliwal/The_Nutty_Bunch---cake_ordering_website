<?php
session_start();
include("same.php");

$ids=$_GET["ty"];

$del_qry="delete from cake_type where t_id=$ids";

$qry=mysqli_query($con,$del_qry);

if($qry)
{
    echo "<script>window.location='type-manage.php'</script>";
}

?>