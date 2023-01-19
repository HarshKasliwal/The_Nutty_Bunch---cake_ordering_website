<?php
session_start();
include("same.php");

$email=$_SESSION["user_name"];
$sel_qr="SELECT `o_id`, `date`, `amount`, `c_id`, `c_name`, `delivery_status`, `Address`, `Email`, `PhoneNO` FROM `order_master` WHERE Email='$email';";

$data_qr=mysqli_query($con,$sel_qr);

$customer_details=mysqli_fetch_array($data_qr);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="12;URL=index.php">
    <title>Print Bill</title>
    <link rel="stylesheet" href="css/bill_style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/chef.png">
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>Nutty bunch,Bandra</div>
        <div>9898989898</div>
        <div><a href="mailto:company@example.com">nutty_bunch@11.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name"><?php echo $customer_details[4];?></h2>
          <div class="address"><?php echo $customer_details[6];?></div>
          <div class="email"><a href="mailto:john@example.com"><?php echo $customer_details[7];?></a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE :</h1>
          <div class="date">Date of Invoice: <?php echo $customer_details[1];?><P>Format:Y-m-d</P></div>
        </div>
      </div>
      <hr><center><h3>After 10sec. page automatically Redirect to cart save Bill.</h3></center><hr><br> 
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">No</th>
            <th class="desc">Cake_Name</th>
            <th class="unit">Cake_Quantity</th>
            <th class="qty">cake_Price</th>
            <th class="total">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <?php
              $cake_data=stripslashes($_COOKIE["cake_info"]);
                                
              $cart_data=json_decode($cake_data,true);
              
                foreach($cart_data as $keys => $val)
                {
                    $cid=$val["cake_id"];
                    $cnm=$val["cake_name"];
                    $cqty=$val["sele_qty"];
                    $cprice=$val["cake_price"];
                    $amount=$_SESSION["totalofall"];
                    $c_amount=str_replace(',','',$amount);
                    
                    $cake_tot=$c_amount * $cqty;
                
              ?>
            <td class="no"><?php echo $cid; ?></td>
            <td class="desc"><h3><?php echo $cnm; ?></h3></td>
            <td class="unit"><?php echo $cprice; ?></td>
            <td class="qty"><?php echo $c_amount; ?></td>
            <td class="total"><?php echo $cake_tot; ?></td>
          </tr>
            <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><?php echo $amount; ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
    </main>
    <center><h1><a href="javascript:window.print()" style="color: forestgreen;">Click to Print</a></h1></center>
    
     <hr><center><h3>Invoice was created on a computer and is valid without the signature and seal.</h3></center><hr>
    
  </body>
</html>
<?php
unset($_SESSION["totalofall"]);
setcookie("cake_info", "", time() - 3600);
?>