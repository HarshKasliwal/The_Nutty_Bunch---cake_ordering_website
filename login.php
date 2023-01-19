<?php 
session_start();

include("same.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login here :)</title>

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
                                    Please Sign in now</h3><br>
                                <form action="" method="post">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="unm"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="pass" 
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button type="submit" name="login" class="form-control btn btn-success">
                                            log in
                                        </button><br>
                                        <div class="text-center">
                                        
                                        <br><a href="registration.php" class="text-center">create new account :)</a> 
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

if(isset($_POST["login"]))
{
    
$email=$_POST["unm"];
$password=$_POST["pass"];
$pass_md5=md5($password);
    
    $sel_qry="SELECT `c_name`, `pswd` FROM `customer` WHERE email='$email' AND pswd='$pass_md5'";
        
    $qry=mysqli_query($con,$sel_qry);
    
    if(mysqli_num_rows($qry)>0)
    {
        $_SESSION["user_name"]=$email;
    //    echo $_SESSION["admin_email"];
        if(isset($_COOKIE['cake_info']))
        {
            echo "<script>alert('Your Cart');
              window.location='cart.php'</script>";
        }
        else
        {
            echo "<script>alert('Welcome user');
              window.location='index.php'</script>";
            
        }
        
    }
    else
    {
        echo "<script>alert('Something is wrong');
             window.location='login.php'</script>";
    }
}

?>