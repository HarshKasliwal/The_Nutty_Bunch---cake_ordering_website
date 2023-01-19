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
				<span>cake-flavour</span>
				</h2>
		    </div>
		<table class="table table-responsive">
            <tr>
                <th>cake_flavour-id</th>
                <th>flavour-name</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
            <tr>
                <?php
                $sel_qry="SELECT `f_id`, `flavour` FROM `cake_flavour` ORDER BY f_id DESC;";
    
                $qry=mysqli_query($con,$sel_qry);
    
                while($fetch_record=mysqli_fetch_array($qry))
                {
                ?>
                <td><?php echo $fetch_record[0]; ?></td>
                <td><?php echo $fetch_record[1]; ?></td>
                <td><a href="flavour-edit.php?fy=<?php echo $fetch_record[0]; ?>">Edit</td>
                <td><a href="flavour-delete.php?fy=<?php echo $fetch_record[0]; ?>">Delete</td>
                
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

