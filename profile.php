<?php 
session_start();

include("same.php");

$usernm=$_SESSION["user_name"];

$sel_qr="select * from customer where email='$usernm'";

$qry=mysqli_query($con,$sel_qr);

$fetch_record=mysqli_fetch_array($qry);


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
                                    <div class="col-md-12 form-group p_star"><label>Username : </label><br>
                                        <input type="text" class="form-control" name="unm" placeholder="Username (only alphabet)" value="<?php echo $fetch_record[1]; ?>" disabled>
                                    </div>
                                    <div class="col-md-12 form-group p_star"><label>Address : </label><br>
                                        <textarea cols="10" rows="4" class="form-control" name="addr" placeholder="Address" disabled><?php echo $fetch_record[5]; ?></textarea>
                                    </div>
                                     <div class="col-md-12 form-group p_star"><label>Email : </label><br>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email" value="<?php echo $fetch_record[3]; ?>" disabled>
                                    </div>
                                     <div class="col-md-12 form-group p_star"><label>Mobile No : </label><br>
                                        <input type="text" class="form-control" name="mob"
                                            placeholder="mobile 10 digit" value="<?php echo $fetch_record[4]; ?>" disabled>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">

                                        <button type="submit" value="Change" name="add" class="form-control btn btn-danger">
                                           Change
                                        </button><br>
                                        <div class="text-center">
                                        
                                        <br><a href="index.php" class="text-center">Back To Home :)</a> 
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
              
    echo "<script>alert('First verification');
           window.location='verification_login.php'</script>";
        
            
        
}
?>