<?php
session_start();
include("same.php");
//$_SESSION["admin_email"]=$email;
if(isset($_SESSION["admin_email"]))
{
//part..
include("header.php");

include("side-bar.php");


$sel_qry="SELECT * FROM `cake_type`";

$qry=mysqli_query($con,$sel_qry);
    
$sel_qry_fla="SELECT `f_id`, `flavour` FROM `cake_flavour`";
    
$fla_qry=mysqli_query($con,$sel_qry_fla);
?>


        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>cake</span>
				</h2>
		    </div>
		<!--//banner-->
           
		    <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group"><br><br>
                        <label>cake-Name : </label><input type="text" name="cname" class="form-control" required><br>
                    </div>
                    
                    <div class="form-group">
                        <label>Select cake-type</label>
                        <select class="form-control" name="ctype" required>
                            <option selected disabled>select cake-type</option>
                            <?php
                                while($ty=mysqli_fetch_array($qry)){
                            ?>
                            <option><?php echo $ty[1]; ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label>Select cake-flavour</label>
                        <select name="cflavour" class="form-control" required>
                            <option selected disabled>select cake-flavour</option>
                            <?php
                                while($fl=mysqli_fetch_array($fla_qry)){
                            ?>
                            <option> <?php echo $fl[1]; ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label>cake-image</label>
                        <input type="file" name="cimg" required>
                    </div><br>
                    
                    <div class="form-group">
                        <label>cake-price</label>
                        <input type="text" name="cprice" required class="form-control"><br>
                        <input type="submit" name="add" value="Add" class="form-control btn btn-success"><br><br>
                    </div><br>
                    
                </form>
           </div>
           <?php
            if(isset($_POST["add"]))
            {
                 $cakenm=$_POST["cname"];
                 $cakety=$_POST["ctype"];
                 $cakefl=$_POST["cflavour"];
                 $cakepr=$_POST["cprice"];

                $chk_qry="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` WHERE  cake_name='$cakenm'";

                $qry=mysqli_query($con,$chk_qry);

                if(mysqli_num_rows($qry)>0)
                {
                    echo '<div class="alert alert-danger" align="center"><h1>this cake is allready exist</h1></div>';
                }
                else
                {
                
                    $r1=rand(11111,99999);
                    $r2=rand(11111,99999);
                    
                    $mul=$r1.$r2;
                    
                    $file_name=$_FILES["cimg"]["name"];
                    
                    $upload_dst="./cake_image/".$mul.$file_name;
                    
                    $database_dst="cake_image/".$mul.$file_name;
                    
                    move_uploaded_file($_FILES["cimg"]["tmp_name"],$upload_dst);
                    
                $ins_qry="INSERT INTO `cake_details`(`cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price`) VALUES ('$cakenm','$database_dst','$cakety','$cakefl',$cakepr);";

                //echo $ins_qry;

                $iqry=mysqli_query($con,$ins_qry);

                    if($iqry)
                    {
                        echo '<div class="alert alert-success" align="center"><h1>cake add successful</h1></div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger" align="center"><h1>cake not added</h1></div>';
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

