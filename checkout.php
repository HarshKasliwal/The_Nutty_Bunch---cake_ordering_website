<?php
session_start();
include("same.php");

include("header.php");

//echo $_SESSION["totalofall"];


?>
<br><br><br><br>
<?php
      
      if(!empty($_SESSION["totalofall"]))
      {
          $email=$_SESSION["user_name"];
          
          $sel_qr="SELECT `c_id`, `c_name`, `pswd`, `email`, `mob`, `address` FROM `customer` WHERE email='$email'";
          
          $qr=mysqli_query($con,$sel_qr);
          
          $fetch_record=mysqli_fetch_array($qr);
          
           //print_r(date('Y-m-d'));
          
?>
      <form action="" method="post">
      
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" placeholder="" value="<?php echo $fetch_record[1]; ?>" name="fnm" readonly>
	                </div>
	              </div>
                    <input type="hidden" name="cno" value="<?php echo $fetch_record[0]; ?>">
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder="" name="lnm" required>
	                </div>
                </div>
                
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number and street name" value="<?php echo $fetch_record[5]; ?>" name="addr" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" name="apprtment_name">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="" name="cty" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" placeholder="" name="zip" maxlength="6" required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="" value="<?php echo $fetch_record[4]; ?>" name="mob" readonly>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="" value="<?php echo $fetch_record[3]; ?>" name="email" readonly>
	                </div>
                </div>
                
                
	            </div>
	         
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
                            <?php
                            $total=$_SESSION["totalofall"];
                            if(!empty($total))
                            {
                            ?>
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
    						<span> Rs.<?php echo $total; ?></span>
                            <?Php
                            }
                            else
                            {
                            ?>
                            <span>Rs.0.00</span>
                            <?php
                            }
                            ?>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>Rs.0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rs0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<?php
                            if(!empty($total))
                            {
                            ?>
    						<span> Rs.<?php echo $total; ?></span>
                            <?Php
                            }
                            else
                            {
                            ?>
                            <span>Rs.0.00</span>
                            <?php
                            }
                            ?>
    					</p>
    				</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" required value="cash"> Cash on Delivery</label><br>
                                               <label><input type="radio" name="optradio" class="mr-2" required value="online"> Pay Online</label>
											</div>
										</div>
									</div>

								<!--	<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div> -->
                                    <button type="submit" class="btn btn-primary py-3 px-4" name="place_order">Place an order</button>
                            
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
          
    </form>
      
<?php
      }
      else
      {
          echo "<script>
                  window.location='index.php'</script>";
      }

if(isset($_POST["place_order"]))
{
    $rvalue=$_POST["optradio"];
    
    //echo $rvalue;
    
    if($rvalue == "cash")
    {
        $lastname=$_POST["lnm"];
        $Now_date=date('Y-m-d');
        $amount=$_SESSION["totalofall"];
        $c_amount=str_replace(',','',$amount);
        $co_id=$fetch_record[0];
        $co_name=$fetch_record[1]." ".$lastname;
        $address=$_POST["apprtment_name"]." ".$_POST["addr"]." ".$_POST["cty"]." ".$_POST["zip"];
        $emailid=$fetch_record[3];
        $phoneNo=$fetch_record[4];
        
        
             $ins_qr="INSERT INTO `order_master`(`date`, `amount`, `c_id`, `c_name`, `Address`, `Email`, `PhoneNO`) VALUES ('$Now_date',$c_amount,$co_id,'$co_name','$address','$emailid',$phoneNo);";
            
            $qr=mysqli_query($con,$ins_qr);
            //echo $ins_qr;
        
        if($qr)
        {
            $o_id="SELECT o_id FROM `order_master` WHERE Email='$emailid'";
            
            $o_qr=mysqli_query($con,$o_id);
            
            $fetch_id=mysqli_fetch_array($o_qr);
            
            $oid=$fetch_id[0];
            
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
                
                $in_qr="INSERT INTO `order_details`(`o_id`, `cake_id`, `cake_name`, `cake_qty`, `cake_price`, `all_total`) VALUES ($oid,$cid,'$cnm',$cqty,$cprice,$c_amount);";
                
                $odetails_qr=mysqli_query($con,$in_qr);
            }
        }
            
            echo "<script>alert('bill !!');
                  window.location='print_bill.php'</script>";
        
        
    }
    else
    {
        $newURL="https://www.payumoney.com";
        header('Location: '.$newURL);
        //redirect('Location:https://www.goggle.com',true);
    }
    
}

?>
<br><br><br>

<?php
include("footer.php");
?>