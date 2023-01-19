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
		<!--//banner-->
           
		    <div class="container">
                <form action="" method="post">
                    <div class="form-group"><br><br>
                        <label>cake-flavour : </label><input type="text" name="fname" class="form-control" required><br><br>
                        <input type="submit" name="add" value="Add" class="w-50 btn btn-success"><br><br>
                    </div>
                </form>
           </div>
           <?php
            if(isset($_POST["add"]))
            {
                 $flavour_name=$_POST["fname"];

                $chk_qry="SELECT `f_id`, `flavour` FROM `cake_flavour` WHERE flavour='$flavour_name'";

                $qry=mysqli_query($con,$chk_qry);

                if(mysqli_num_rows($qry)>0)
                {
                    echo '<div class="alert alert-danger" align="center"><h1>this cake flavour is allready exist</h1></div>';
                }
                else
                {
                

                $ins_qry="INSERT INTO `cake_flavour`(`flavour`) VALUES ('$flavour_name');";

                //echo $ins_qry;

                $iqry=mysqli_query($con,$ins_qry);

                    if($iqry)
                    {
                        echo '<div class="alert alert-success" align="center"><h1>cake flavour add successful</h1></div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger" align="center"><h1>cake flavour not added</h1></div>';
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

