<?php
session_start();
include("same.php");

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Forget Your password:)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
        
		<h1><a href="index.php">c@ke </a></h1>
		<div class="login-bottom">
			<h2 style="text-align: center;">Forget Your password</h2>
			<form action="" method="post">
			<div class="col-md-12">
				<div class="login-mail">
					<input type="text" placeholder="Email" required="" name="eid">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Hint that give in signup" required="" name="pass">
					<i class="fa fa-lock"></i>
				</div>
				   

			
			
			<div class="login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="check" name="login">
					</label>
					
			</div>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

<?php
if(isset($_POST["login"]))
{
    
$email=$_POST["eid"];
$hint=$_POST["pass"];
$hint_md5=md5($hint);
    
    $sel_qry="select admin_id,pswd from admin_login where admin_id='$email' AND hint='$hint_md5'";
        
    $qry=mysqli_query($con,$sel_qry);
    
    if(mysqli_num_rows($qry)>0)
    {
        $_SESSION["right_email"]=$email;
        echo "<script>alert('right details');
              window.location='change_pass.php'</script>";
    }
    else
    {
        echo "<script>alert('Something is wrong');
             window.location='forget.php'</script>";
    }
}
?>