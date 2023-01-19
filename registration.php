<?php 
session_start();

include("same.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration here :)</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
             <div class="container">
                  <div class="w-50 m-auto py-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Registration now</h3><br>
                                <form class="row contact_form" action="" method="post">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="unm" placeholder="Username (only alphabet)" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <textarea cols="10" rows="4" class="form-control" name="addr" placeholder="Address" required></textarea>
                                    </div>
                                     <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email" required>
                                    </div>
                                     <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="mob"
                                            placeholder="mobile 10 digit" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="pass1"
                                            placeholder="Password" required>
                                    </div>
                                     <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="pass2"
                                            placeholder="Re-Type Password" required>
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button type="submit" value="Registration" name="add" class="form-control btn btn-success">
                                            Registration
                                        </button><br>
                                        <div class="text-center">
                                        
                                       
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
           </div>
            
</body>
</html>
<?php
if(isset($_POST["add"]))
{
    $username=$_POST["unm"];
    $address=$_POST["addr"];
    $email=$_POST["email"];
    $mobile=$_POST["mob"];
    $password1=$_POST["pass1"];
    $password2=$_POST["pass2"];
    
    //echo $username.$address.$email.$mobile.$password1,$password2;
    
    $sel_qr_email="SELECT * FROM `customer` WHERE email='$email'";
    
    $em_qr=mysqli_query($con,$sel_qr_email);
    
    $em_chk=mysqli_num_rows($em_qr);
    
    
    $sel_qr_mob="SELECT * FROM `customer` WHERE mob=$mobile";
    
    $mob_qr=mysqli_query($con,$sel_qr_mob);
    
    $mob_chk=mysqli_num_rows($mob_qr);
    
    if(!preg_match("/^[a-zA-Z]*$/",$username))
        {
            echo "<script>alert('Enter validute username');
            window.location='registration.php'</script>";
            exit();
        }
        elseif(!preg_match("/^[0-9]{10}$/",$mobile))
        {
            echo "<script>alert('Enter 10 digit mobile number');
            window.location='registration.php'</script>";
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<script>alert('Enter validute email');
            window.location='registration.php'</script>";
            exit();
        }
        elseif(!preg_match("^[a-z A-Z 0-9]+(. | _)?[a-z A-Z 0-9]*\@(yahoo|gmail|rediff|email)\.(in|com|org|gov)$^",$email))
        {
            echo "<script>alert('Enter validute email');
            window.location='registration.php'</script>";
            exit();
        }
        elseif($em_chk > 0)
        {
            echo "<script>alert('This Email is use');
            window.location='registration.php'</script>";
            exit();
        }
        elseif($mob_chk > 0)
        {
            echo "<script>alert('This number use');
            window.location='registration.php'</script>";
            exit();
        }
        elseif($password1 !== $password2)
        {
            echo "<script>alert('password not match');
            window.location='registration.php'</script>";
            exit();
        }
        else{
            
                        
                        $secure_pass1=md5($password1);
                        //$secure_pass2=md5($p2);

                        $qq="INSERT INTO `customer`(`c_name`, `pswd`, `email`, `mob`, `address`) VALUES ('$username','$secure_pass1','$email',$mobile,'$address');";
 
                        $qry=mysqli_query($con,$qq);
                            
                            
                           echo "<script>alert('registration success');
                           window.location='login.php'</script>";
                           exit();
            
        }
}
?>