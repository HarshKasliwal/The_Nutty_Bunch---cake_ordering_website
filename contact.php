<?php
session_start();
include("same.php");
include("header.php");
?>
	
<br><br><br><br>

<?php
if(isset($_POST["add"]))
{
    $name=$_POST["cname"];
    $email=$_POST["email"];
    $sub=$_POST["subject"];
    $msg=$_POST["msg"];
    
    
    $ins_qr="INSERT INTO `cake_feedback`(`customer_name`, `email`, `subject`, `message`) VALUES ('$name','$email','$sub','$msg')";
    
    $qr=mysqli_query($con,$ins_qr);
    
    if($qr)
    {
        echo '<div class="alert alert-success" align="center"><h1>Thank You For FeedBack</h1></div> ';
    }
}
?>
	
	<!-- contact page -->
	<div class="address py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-5">
				<h2 class="text-dark mb-2">Contact Us</h2>
				<p>Give Feedback</p>
			</div>
			<div class="row address-row">
				<div class="col-lg-6 address-right">
					<div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
						<h4 class="font-weight-bold mb-3">Address</h4>
						<p>W, P. G. Kher Marg, (32nd Road, Marg, Off Linking Rd, TPS III, Bandra West, Mumbai, Maharashtra 400050</p>
					</div>
					<div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
						<h4 class="font-weight-bold mb-3">Phone </h4>
						<p>9854277541</p>
						<p>020 114 7589</p>
					</div>
					<div class="address-info agileits-info wow fadeInRight animated" data-wow-delay=".6s">
						<h4 class="font-weight-bold mb-3">Mail</h4>
						<p>
							<a href="mailto:example@mail.com"> nuttybunch@cakes.com</a>
						</p>
						<p>
							<a href="mailto:example@mail.com"> Mail111@nuttybunch.com</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 address-left mt-lg-0 mt-5">
					<div class="address-grid">
						<h4 class="font-weight-bold mb-3">Get In Touch</h4>
						<form action="" method="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name" name="cname" required="">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Subject" name="subject" required="">
							</div>
							<div class="form-group">
								<textarea placeholder="Message" class="form-control" required="" name="msg"></textarea>
							</div>
							<input type="submit" value="SEND" name="add">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 

include("footer.php");

?>