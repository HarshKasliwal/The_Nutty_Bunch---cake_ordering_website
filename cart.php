<?php
session_start();

include('same.php');

if(isset($_POST["update_cake"]))
{
    
		$cookie_data = stripslashes($_COOKIE['cake_info']);
		$cart_data = json_decode($cookie_data, true);
    
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['cake_id'] == $_POST["cakeid"])
			{
                $cart_data[$keys]["sele_qty"] =$_POST["cqty"];
				$item_data = json_encode($cart_data);
				setcookie("cake_info", $item_data, time() + (86400 * 30));
                
                echo "<script>alert('Upate Cake');
                      window.location='cart.php'</script>";
			}
		}
}
if(isset($_POST["remove_cake"]))
{
        $cookie_data = stripslashes($_COOKIE['cake_info']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['cake_id'] == $_POST["cakeid"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("cake_info", $item_data, time() + (86400 * 30));
				
                 echo "<script>alert('Delete Cake');
                      window.location='cart.php'</script>";
			}
		}
}

if(isset($_POST["remove_allcake"]))
{
    setcookie("cake_info", "", time() - 3600);
    echo "<script>alert('All Cake Remove');
          window.location='cart.php'</script>";
}

if(isset($_POST["chkforpayment"]))
{
    
    
    if(isset($_SESSION["user_name"]))
    {
        $tot=$_POST["totalofall"];
    
        $_SESSION["totalofall"]=$tot;
        
        echo "<script>alert('Time For Payment');
              window.location='checkout.php'</script>";
    }
    else
    {
        echo "<script>alert('First Login');
              window.location='login.php'</script>";
    }
}

    

include("header.php");


?>

<br><br><br><br>
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
                       <h1 align="center">Cakes Cart Details</h1>
	    				<table class="table">
						    <thead class="thead-primary">
                              
						      <tr class="text-center">
						        <th>Cake Image</th>
						        <th>Cake name</th>
						        <th>Select quantity </th>
						        <th>price</th>
						        <th>Total</th>
                                <th>Update</th>
                                <th>Remove</th>
						      </tr>
						    </thead>
                            
                            <?php
                            
                            if(isset($_COOKIE["cake_info"])){
                                
                                $total=0;
                                
                                $cake_data=stripslashes($_COOKIE["cake_info"]);
                                
                                $cart_data=json_decode($cake_data,true);
                                
                                foreach($cart_data as $keys => $val)
                                {
                            
                            ?>
                            <form action="" method="post">
                                
                                <input type="hidden" name="cakeid" value="<?php echo $val["cake_id"]; ?>">
                                
						    <tbody>
						      <tr class="text-center">
						        
						        <td class="image-prod"><img src="admin/<?php echo $val["cake_img"]; ?>" alt="" class="img-fluid" style="height: 100px; width: 100px;"></td>
						        
						        <td class="product-name">
						        	<h3><?php  echo $val["cake_name"]; ?></h3>
						        	
						        </td>
						        
						        <td class="price">
                                    
                                   <h3><?php  echo $val["cake_price"]; ?></h3>
                                    
                                  </td>
						        
						        <td class="quantity">
				
                                <div class="wrap-input100 validate-input m-b-36">
                                 <select class="form-control" id="cqty" name="cqty" required>
                                     <option><?php echo $val["sele_qty"]; ?></option>
                                   <?php  for($i=1;$i<=10;$i++){
                                       if($i == $val["sele_qty"])
                                       {
                                           continue;
                                       }
                                      else{
                                     ?>
                                     <option><?php echo $i; ?></option>
                                   <?php } } ?>
                                 </select>

                                </div>
					          	
					          </td>
						        
						        <td class="total">Rs.<?php echo number_format($val["cake_price"] * $val["sele_qty"],2); ?></td>
                                  
                             <?php
                                 $total=$total+($val["cake_price"] * $val["sele_qty"]);   
                                ?>
                                 
                                <td><button type="submit" name="update_cake" class="btn btn-warning" value="<?php echo $val["cake_id"]; ?>">Update</button></td>  
                                <td><button type="submit" name="remove_cake" class="btn btn-danger" value="<?php echo $val["cake_id"]; ?>">Remove</button></td>
                               
						      </tr><!-- END TR-->
                                
						    </tbody>
                                </form>
                            <?php
                               
                            }
                            
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right" colspan="2">Total = Rs.<?php echo $total; ?></td>
                                <form action="" method="post">
                                <td colspan="2"><button type="submit" name="remove_allcake" class="btn btn-danger">Remove All</button></td>
                                </form>
                                <br><hr>
                            </tr>
                                    
						  
                        <?php
                        }
                        else
                        {
                        ?>
                            <div class="alert alert-info" align="center"><h1>Empty Cart!!</h1></div> 
                        <?php
                        }
                        ?>
                            
                        </table>
                        
					  </div>
    			</div>
    		</div>
           
            
			</div>
		</section><br><br>

    <div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Total</h3>
    					<p class="d-flex">
    						<span>SubTotal</span>
                            <?php
                            if(!empty($total))
                            {
                            ?>
    						<span>&nbsp;&nbsp;Rs.<?php echo number_format($total,2); ?></span>
                            <?Php
                            }
                            else
                            {
                            ?>
                            <span>&nbsp;&nbsp;Rs.0.00</span>
                            <?php
                            }
                            ?>
    					</p><br>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>&nbsp;&nbsp;Rs.0.00</span>
    					</p><br>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>&nbsp;&nbsp;Rs0.00</span>
    					</p><br>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total:=</span>
    						<?php
                            if(!empty($total))
                            {
                            ?>
    						<span>&nbsp;&nbsp;<h1>Rs.<?php echo number_format($total,2); ?></h1></span>
                            <?Php
                            }
                            else
                            {
                            ?>
                            <span>&nbsp;&nbsp;Rs.0.00</span>
                            <?php
                            }
                            ?>
    					</p>
    				</div>
                            <?php
                            if(empty($total))
                            {
                            ?>
    						<p><a href="checkout.php" class="btn btn-primary py-3 px-4" hidden="">Proceed to Checkout</a></p>
                            <?Php
                            }
                            else
                            {
                            ?>
                                <form action="" method="post">
                                     <input type="hidden" name="totalofall" value="<?php echo number_format($total,2); ?>">
                                <p><button type="submit" name="chkforpayment" value="checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</button></p>    
                                </form>
                                
                            <?php
                                
                            }
                            ?>
    				
    			</div>
    		</div>


<br><br>

	<?php
      
      include('footer.php');
      
    ?>
      
