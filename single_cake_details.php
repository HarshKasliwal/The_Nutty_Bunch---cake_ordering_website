<?php
session_start();
include("same.php");
include('header.php');

if(isset($_POST["vdetails"]))
{
    $cid=$_POST["cakeid"];
    
    $sel_qr="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` WHERE cake_id=$cid";
    
    $qr=mysqli_query($con,$sel_qr);
    
    $record_fetch=mysqli_fetch_array($qr);

?>
        
  <br><br><br><br><br>      
<form action="" method="post">
 		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						<div class="owl-carousel">
							
							<div class="item">
								<div class="product-entry border">
									
										<img src="admin/<?php echo $record_fetch[2];?>" class="img-fluid" alt="" style="height: 300px; width: 730px;">
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3><?php echo "<h3>".$record_fetch[1]."</h3>"?></h3><br>
							<p class="price">
								<span><?php echo "<h1>"."Rs. $record_fetch[5]"."</h1>"?></span>
								
							</p><br>
							
							
                            <span class="txt1 p-b-11">
							Select Quantity
							</span>
                            <div class="wrap-input100 validate-input m-b-36">
                             <select class="form-control" id="cqty" name="cqty" required>
                               <?php  for($i=1;$i<=10;$i++){?>
                                 <option><?php echo $i; ?></option>
                               <?php } ?>
                             </select>
    
                            </div><br>
                            
                            <input type="submit" name="addtocart" value="Add To Cart" class="btn btn-success form-control">
                         
				</div>
            </div>
        </div>
    </div>
</div>
            
</form><br><br>
                
                
                
<?php
}
include("footer.php");

?>