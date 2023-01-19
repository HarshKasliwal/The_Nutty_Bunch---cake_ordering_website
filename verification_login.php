<?php 
session_start();

include("same.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Verification Login Here </title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
             <div class="container">
                  <div class="w-50 m-auto py-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>
                                    Please verifies in now</h3><br>
                                <form action="" method="post">
                                    <div class="col-md-12 form-group p_star"><label>Email : </label><br>
                                        <input type="email" class="form-control" id="name" name="email"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star"><label>Password : </label><br>
                                        <input type="password" class="form-control" id="password" name="pass" 
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button type="submit" name="login" class="form-control btn btn-success">
                                            Verification
                                        </button><br>
                                        
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
    
$email=$_POST["email"];
$password=$_POST["pass"];
$pass_md5=md5($password);
    
    $sel_qry="SELECT `c_name`, `pswd` FROM `customer` WHERE email='$email' AND pswd='$pass_md5'";
        
    $qry=mysqli_query($con,$sel_qry);
    
    if(mysqli_num_rows($qry)>0)
    {
        $_SESSION["Email"]=$email;
        echo "<script>alert('change password');
              window.location='change_data.php'</script>";
    }
    else
    {
        echo "<script>alert('Something is wrong');
             window.location='profile.php'</script>";
    }
}

?>