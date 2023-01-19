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
                <th>Date</th>
                <th>Amount</th>
                <th>C_name</th>
                <th>Delivery Status</th>
                <th>Edit</th>
            </tr>
            <tr>
                <?php
                $sel_qry="SELECT `o_id`, `date`, `amount`, `c_id`, `c_name`, `delivery_status`, `Address`, `Email`, `PhoneNO` FROM `order_master` ORDER BY o_id DESC;";
    
                $qry=mysqli_query($con,$sel_qry);
    
                while($fetch_record=mysqli_fetch_array($qry))
                {
                ?>
                <td><?php echo $fetch_record[0]; ?></td>
                <td><?php echo $fetch_record[1]; ?></td>
                <td><?php echo $fetch_record[2]; ?></td>
                <td><?php echo $fetch_record[4]; ?></td>
                <td><?php echo $fetch_record[5]; ?></td>
                <td><a href="order-edit.php?or=<?php echo $fetch_record[0]; ?>">Edit</td>
                
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
   else
   {
       echo "<script>
             window.location='index.php'</script>";
   }
       ?>

