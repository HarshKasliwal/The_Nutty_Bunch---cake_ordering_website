<?php
session_start();
include("same.php");
//$_SESSION["admin_email"]=$email;
if(isset($_SESSION["admin_email"]))
{
//part..
include("header.php");

include("side-bar.php");

?>


        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>cake-type</span>
				</h2>
		    </div>
           <?php
            
            $ids=$_GET["ty"];
    
            $sel_qry="SELECT * FROM `cake_type` WHERE t_id=$ids";
    
            $qry=mysqli_query($con,$sel_qry);
    
            $fetch_qr=mysqli_fetch_array($qry);
            
            ?>
           
		 <div class="container">
                <form action="" method="post">
                    <div class="form-group"><br><br>
                        <label>type-id : </label><input type="text" name="tids" class="form-control" value="<?php echo $fetch_qr[0]; ?>" disabled><br><br>
                        <label>cake-type : </label><input type="text" name="tname" class="form-control" value="<?php echo $fetch_qr[1]; ?>" required><br><br>
                        <input type="submit" name="add" value="change" class="w-50 btn btn-success"><br><br>
                    </div>
                </form>
           </div>
           
           <?php
            if(isset($_POST["add"]))
            {
                 $type_name=$_POST["tname"];

                $chk_qry="select * from cake_type where diff_ty='$type_name'";

                $qry=mysqli_query($con,$chk_qry);

                if(mysqli_num_rows($qry)>0)
                {
                    echo '<div class="alert alert-danger" align="center"><h1>this cake type is allready exist</h1></div>';
                }
                else
                {
                
                    $up_qr="update cake_type set diff_ty='$type_name' where t_id=$ids";

                $iqry=mysqli_query($con,$up_qr);

                    if($iqry)
                    {
                        echo "<script>window.location='type-manage.php'</script>";
                    }
                    else
                    {
                        echo '<div class="alert alert-danger" align="center"><h1>this cake type is not add</h1></div>';
                    }
                }
            }
            ?>
           
		</div>
		<div class="clearfix"> </div>
       </div>
     
<?php 
    include("footer.php");
    ?>

</body>
</html>
<?php
   }
   else
   {
       echo "<script>
             window.location='index.php'</script>";
   }
       ?>

