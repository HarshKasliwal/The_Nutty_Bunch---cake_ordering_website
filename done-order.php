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
		<table class="table table-responsive">
            <tr>
                <th>o-id</th>
                <th>Cake_id</th>
                <th>Cake_Name</th>
                <th>Cake_qty</th>
                <th>Cake_Price</th>
                <th>All Total</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
               $sel_orderms="SELECT o_id FROM `order_master` WHERE delivery_status='done'";
    
                $sel_qr=mysqli_query($con,$sel_orderms);

                while($record=mysqli_fetch_array($sel_qr))
                {
                    $oidd=$record[0];

                    $sel_ordetails="SELECT `o_id`, `cake_id`, `cake_name`, `cake_qty`, `cake_price`, `all_total` FROM `order_details` WHERE o_id=$oidd";

                    $fetch_qr=mysqli_query($con,$sel_ordetails);

                    while($fetch_record=mysqli_fetch_array($fetch_qr))
                    {
            
                ?>
                <td><?php echo $fetch_record[0]; ?></td>
                <td><?php echo $fetch_record[1]; ?></td>
                <td><?php echo $fetch_record[2]; ?></td>
                <td><?php echo $fetch_record[3]; ?></td>
                <td><?php echo $fetch_record[4]; ?></td>
                <td><?php echo $fetch_record[5]; ?></td>
                <td><a href="order-delete.php?ordl=<?php echo $fetch_record[0]; ?>">Delete</td>
                
            </tr>
            <?php } ?>
           </table>

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
   }
   else
   {
       echo "<script>
             window.location='index.php'</script>";
   }
       ?>

