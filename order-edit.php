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
				<span>Order</span>
				</h2>
		    </div>
           <?php
            
            $ids=$_GET["or"];
    
            $sel_qry="SELECT `o_id`, `date`, `amount`, `c_name`, `delivery_status` FROM `order_master` WHERE o_id=$ids";
    
            $qry=mysqli_query($con,$sel_qry);
    
            $fetch_qr=mysqli_fetch_array($qry);
    
            ?>
           
		  <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group"><br><br>
                        <label>Order-No : </label><input type="text" name="cname" class="form-control" value="<?php echo $fetch_qr[0]; ?>" disabled><br>
                    </div>
                    
        
                    <div class="form-group">
                        <label>Order-Date</label>
                        <input type="text" name="cprice" required value="<?php echo $fetch_qr[1]; ?>" class="form-control" disabled>
                    </div><br>
                    
                    <div class="form-group"><br><br>
                        <label>Order-Amount : </label><input type="text" name="cname" class="form-control" value="<?php echo $fetch_qr[2]; ?>" disabled><br>
                    </div>
                    <div class="form-group"><br><br>
                        <label>Customer-Name : </label><input type="text" name="cname" class="form-control" value="<?php echo $fetch_qr[3]; ?>" disabled><br>
                    </div>
                    
                    <div class="form-group"><br><p>In Delivery Status := Use Only (1)packingcake (2)onway (3)done</p><br>
                        <label>Delivery_Status: </label><input type="text" name="dstatus" class="form-control" value="<?php echo $fetch_qr[4]; ?>" required><br>
                        <input type="submit" name="add" value="change" class="form-control btn btn-success"><br><br>
                    </div>
                    
                    
                    
                </form>
           </div>
           
           <?php
            if(isset($_POST["add"]))
            {
                 $status=$_POST["dstatus"];
                
                 $notspace_status=str_replace(' ','',$status);

                $chk_qry="update order_master set delivery_status='$notspace_status' where o_id=$ids";

                $qry=mysqli_query($con,$chk_qry);
                
                if($qry)
                {
                    echo "<script>window.location='order-manage.php'</script>";
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

