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
		<table class="table table-responsive">
            <tr>
                <th>cake-id</th>
                <th>cake-name</th>
                <th>cake-image</th>
                <th>cake-type</th>
                <th>cake-flavour</th>
                <th>cake-price</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
            <tr>
                <?php
                $sel_qry="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` ORDER BY cake_id DESC;";
    
                $qry=mysqli_query($con,$sel_qry);
    
                while($fetch_record=mysqli_fetch_array($qry))
                {
                ?>
                <td><?php echo $fetch_record[0]; ?></td>
                <td><?php echo $fetch_record[1]; ?></td>
                <td><?php echo "<img src='$fetch_record[2]' height='100px' width='100px'>"; ?></td>
                <td><?php echo $fetch_record[3]; ?></td>
                <td><?php echo $fetch_record[4]; ?></td>
                <td><?php echo $fetch_record[5]; ?></td>
                <td><a href="cake-edit.php?ck=<?php echo $fetch_record[0]; ?>">Edit</td>
                <td><a href="cake-delete.php?ck=<?php echo $fetch_record[0]; ?>">Delete</td>
                
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

