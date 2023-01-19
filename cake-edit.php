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
				<span>cake</span>
				</h2>
		    </div>
           <?php
            
            $ids=$_GET["ck"];
    
            $sel_qry="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` WHERE cake_id=$ids";
    
            $qry=mysqli_query($con,$sel_qry);
    
            $fetch_qr=mysqli_fetch_array($qry);
    
            $sel_qry="SELECT * FROM `cake_type` WHERE diff_ty NOT IN ('$fetch_qr[3]')";

            $qry=mysqli_query($con,$sel_qry);

            $sel_qry_fla="SELECT * FROM `cake_flavour` WHERE flavour NOT IN ('$fetch_qr[4]')";

            $fla_qry=mysqli_query($con,$sel_qry_fla);
            
            ?>
           
		  <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group"><br><br>
                        <label>cake-Name : </label><input type="text" name="cname" class="form-control" value="<?php echo $fetch_qr[1]; ?>" required><br>
                    </div>
                    
                    <div class="form-group">
                        <label>Select cake-type</label>
                        <select class="form-control" name="ctype" required>
                            <option selected><?php echo $fetch_qr[3]; ?></option>
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
                            <option selected><?php echo $fetch_qr[4]; ?></option>
                            <?php
                                while($fl=mysqli_fetch_array($fla_qry)){
                            ?>
                            <option> <?php echo $fl[1]; ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                      <label>CURRENT SHOES IMAGE</label>
                        <img src="<?php echo $fetch_qr[2]; ?>" style="width:80px;height:60px">&nbsp;<?php echo  $fetch_qr[2]; ?>
                        <input  type="hidden" name="crimg" value="<?php echo  $fetch_qr[2]; ?>" >
                  </div>
                    <div class="form-group">
                      <label>SHOES IMAGE</label>
                        <input type="file" name="cimg"/>
                    </div>
                    
                    <div class="form-group">
                        <label>cake-price</label>
                        <input type="text" name="cprice" required value="<?php echo $fetch_qr[5]; ?>" class="form-control"><br>
                        <input type="submit" name="add" value="change" class="form-control btn btn-success"><br><br>
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

                if($cakenm == $fetch_qr[1])
                {
                
                    if(mysqli_num_rows($qry)>0)
                  {
                    echo '<div class="alert alert-danger" align="center"><h1>this cake is allready exist</h1></div>';
                  }
                }
                else
                {
                
                    $r1=rand(11111,99999);
                    $r2=rand(11111,99999);
                    
                    $mul=$r1.$r2;
                    
                    $file_name=$_FILES["cimg"]["name"];
                    
                    if($file_name=="")
                    {
                        //$upload_dst="./cake_image/".$mul.$file_name;

                        //$database_dst="cake_image/".$mul.$file_name;

                        move_uploaded_file($_FILES["cimg"]["tmp_name"],$upload_dst);

                        $ins_qry="UPDATE `cake_details` SET `cake_name`='$cakenm',`diff_ty`='$cakety',`flavour`='$cakefl',`cake_price`=$cakepr WHERE cake_id=$ids";


                        //echo $ins_qry;

                        $iqry=mysqli_query($con,$ins_qry);

                        if($iqry)
                        {
                           echo "<script>window.location='cake-manage.php'</script>";
                        }
                        else
                        {
                            echo '<div class="alert alert-danger" align="center"><h1>cake not change</h1></div>';
                        }

                    }
                    else
                    {
                        $upload_dst="./cake_image/".$mul.$file_name;

                        $database_dst="cake_image/".$mul.$file_name;

                        move_uploaded_file($_FILES["cimg"]["tmp_name"],$upload_dst);

                        $ins_qry="UPDATE `cake_details` SET `cake_name`='$cakenm',`cake_img`='$database_dst',`diff_ty`='$cakety',`flavour`='$cakefl',`cake_price`=$cakepr WHERE cake_id=$ids";


                        //echo $ins_qry;

                        $iqry=mysqli_query($con,$ins_qry);

                        if($iqry)
                        {
                           echo "<script>window.location='cake-manage.php'</script>";
                        }
                        else
                        {
                            echo '<div class="alert alert-danger" align="center"><h1>cake not change</h1></div>';
                        }
                        
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

