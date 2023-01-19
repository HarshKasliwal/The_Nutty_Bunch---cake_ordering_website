<?php 
session_start();

include("same.php");

$email=$_SESSION["Email"];

$sel_qr="select * from customer where email='$email'";

$qry=mysqli_query($con,$sel_qr);

$fetch_record=mysqli_fetch_array($qry);

if(isset($_SESSION["Email"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>your details</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
             <div class="container">
                  <div class="w-50 m-auto py-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                  <h3>Profile Details</h3><br>
                                <form class="row contact_form" action="" method="post">
                                    <div class="col-md-12 form-group p_star"><label>Email : </label><br>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $fetch_record[1]; ?>" disabled>
                                    </div>
                                    <div class="col-md-12 form-group p_star"><label>New Password : </label><br>
                                        <input type="password" class="form-control" name="pass1" placeholder="password" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star"><label>Re-type Password : </label><br>
                                        <input type="password" class="form-control" name="pass2" placeholder="password" required>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">

                                        <button type="submit" value="Change" name="add" class="form-control btn btn-danger">
                                           Change
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
}
else
{
    echo "<script>
           window.location='profile.php'</script>";
}

if(isset($_POST["add"]))
{
    //$usernm
    $ps1=$_POST["pass1"];
    $ps2=$_POST["pass2"];
    
    if($ps1 !== $ps2)
    {
       echo "<script>alert('password not match');
           window.location='change_data.php'</script>"; 
    }
    else
    {
        $ps_md5=md5($ps1);
        $up_qr="update customer set pswd='$ps_md5' where email='$email'";
        
        $up_qq=mysqli_query($con,$up_qr);
        
        if($up_qq)
        {
           unset($_SESSION["ver_user"]);
            echo "<script>alert('Change Successful');
           window.location='profile.php'</script>"; 
            
        }
    }
    
   
}
?>