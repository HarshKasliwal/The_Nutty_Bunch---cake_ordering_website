<?php
session_start();
include("same.php");

if(isset($_POST["addcart"]))
{
   if(isset($_COOKIE["cake_info"]))
	{
		$cookie_data = stripslashes($_COOKIE['cake_info']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'cake_id');

	if(in_array($_POST["cakeid"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["cake_id"] == $_POST["cakeid"])
			{
				//$cart_data[$keys]["sele_qty"] =$_POST["cqty"];
                echo "<script>alert('This Cake is Allready Add');
                      window.location='all_cake.php'</script>";
			}
		}
	}
	else
	{
		$item_array = array(
            'cake_id' => $_POST["cakeid"],
            'cake_name' => $_POST["cname"],
            'cake_price' => $_POST["cprice"],
            'cake_img' => $_POST["cimg"],
            'sele_qty' => $_POST["cqty"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('cake_info', $item_data, time() + (86400 * 30));
}

include('header.php');

//print_r($_COOKIE["cake_info"]);


?>

<br><br><br><br><br>
<div class="container">
				<div class="row">
					<div class="col-lg-3 col-xl-3">
						<div class="row">
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>By Cake Type</h3><br>
                                    <?php
									$ty="SELECT `t_id`, `diff_ty` FROM `cake_type`";
									$ty_qry=mysqli_query($con,$ty);
								
									while($fetch_record=mysqli_fetch_array($ty_qry))
									{
									?>
									<ul>
                                   		<form action="" method="post">
										<li style="list-style: none;"><input type="submit" name="types" value="<?php echo $fetch_record[1];?>" class="btn btn-link"></li>
                                            <input type="hidden" name="types_nm" value="<?php echo $fetch_record[1]; ?>">
                                        </form>
									</ul>
                                    <?php }?>
								</div>
							</div>
                            
                            
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3></h3>
										<h4>Flavour</h4>
                                       <?php
									$fl="SELECT `f_id`, `flavour` FROM `cake_flavour`";
                                    $fl_qr=mysqli_query($con,$fl);
                                    while($fetch_record_of_fl=mysqli_fetch_array($fl_qr)){
									?> 
                                        
					               <ul>
                                       <form action="" method="post">
					                  <li style="list-style: none;"><input type="submit" name="flavour" value="<?php echo $fetch_record_of_fl[1];?>" class="btn btn-link">
                                        <input type="hidden" name="flavour_nm" value="<?php echo $fetch_record_of_fl[1]; ?>">
                                      </li>
					                  </form>
					               </ul>
                                   <?php }?>
					            </div>
							
							</div>
							
						</div>
					</div>
           
                   
                     <!-- for flaover cakes -->
                    
                        <?php
                        if(isset($_POST["flavour"]))
                        {
                            $flavor_nm=$_POST["flavour_nm"];
                            
                        ?>
                        <div class="col-lg-9 col-xl-9">
                            <div class="row row-pb-md">
                                <?php
                               $ty="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` WHERE flavour='$flavor_nm';";
				               $fl_qry=mysqli_query($con,$ty);
								
				            while($fetch_record=mysqli_fetch_array($fl_qry))
                            {
                                ?>

                                <div class="col-lg-4 mb-4 text-center">
                                <form action="" method="post">
                                    <div class="product-entry border">
                                            <img src="admin/<?php echo $fetch_record[2];?>" class="img-fluid" alt="" style="height: 300px; width: 300px;">
                                        <input type="hidden" name="cimg" value="<?php echo $fetch_record[2]; ?>">
                                            <div class="desc">
                                                <p style="color: black; font-weight: 600;"><?php echo $fetch_record[1];?></p>
                                                <input type="hidden" name="cname" value="<?php echo $fetch_record[1]; ?>">

                                                <span class="price"><?php echo "Rs.   ".$fetch_record[5]; ?></span><br>
                                                <input type="hidden" name="cprice" value="<?php echo $fetch_record[5]; ?>">
                                                
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
                                                
                                                <input type="submit" name="addcart" value="Add To Cart" class="btn btn-success"><br>
                                                <input type="hidden" name="cakeid" value="<?php echo $fetch_record[0];?>">

                                            </div>
                                        </div>

                                 </form>

                                </div>


                        <?php  } ?>

                      </div>
                  </div>
                        <?php } ?>
                    
                     <!-- End for flaover cakes -->
                    
                     <!-- for types cakes -->
                    
                        <?php
                        if(isset($_POST["types"]))
                        {
                            $type_nm=$_POST["types_nm"];
                            
                        ?>
                        <div class="col-lg-9 col-xl-9">
                            <div class="row row-pb-md">
                                <?php
                               $ty="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` WHERE diff_ty='$type_nm';";
				               $ty_qry=mysqli_query($con,$ty);
								
				            while($fetch_record=mysqli_fetch_array($ty_qry))
                            {
                                ?>

                               <div class="col-lg-4 mb-4 text-center">
                                <form action="" method="post">
                                    <div class="product-entry border">
                                            <img src="admin/<?php echo $fetch_record[2];?>" class="img-fluid" alt="" style="height: 300px; width: 300px;">
                                        <input type="hidden" name="cimg" value="<?php echo $fetch_record[2]; ?>">
                                            <div class="desc">
                                                <p style="color: black; font-weight: 600;"><?php echo $fetch_record[1];?></p>
                                                <input type="hidden" name="cname" value="<?php echo $fetch_record[1]; ?>">

                                                <span class="price"><?php echo "Rs.   ".$fetch_record[5]; ?></span><br>
                                                <input type="hidden" name="cprice" value="<?php echo $fetch_record[5]; ?>">
                                                
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
                                                
                                                <input type="submit" name="addcart" value="Add To Cart" class="btn btn-success"><br>
                                                <input type="hidden" name="cakeid" value="<?php echo $fetch_record[0];?>">

                                            </div>
                                        </div>

                                 </form>

                                </div>


                        <?php  } ?>

                      </div>
                  </div>
                        <?php } ?>
                    
                    <!-- End for types cakes -->
                    
                    <!-- for all cakes -->
                    
                    <?php
                    if(!isset($_POST["flavour"]) && !isset($_POST["types"]) ){
                    ?>
                    
                        <div class="col-lg-9 col-xl-9">
                            <div class="row row-pb-md">
                                <?php
                                $all_cake="SELECT `cake_id`, `cake_name`, `cake_img`, `cake_price` FROM `cake_details`";

                                $cakes_qr=mysqli_query($con,$all_cake);

                                while($fetch_record=mysqli_fetch_array($cakes_qr)){
                                ?>

                                 <div class="col-lg-4 mb-4 text-center">
                                <form action="" method="post">
                                    <div class="product-entry border">
                                            <img src="admin/<?php echo $fetch_record[2];?>" class="img-fluid" alt="" style="height: 300px; width: 300px;">
                                        <input type="hidden" name="cimg" value="<?php echo $fetch_record[2]; ?>">
                                            <div class="desc">
                                                <p style="color: black; font-weight: 600;"><?php echo $fetch_record[1];?></p>
                                                <input type="hidden" name="cname" value="<?php echo $fetch_record[1]; ?>">

                                                <span class="price"><?php echo "Rs.   ".$fetch_record[3]; ?></span><br>
                                                <input type="hidden" name="cprice" value="<?php echo $fetch_record[3]; ?>">
                                                
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
                                                
                                                <input type="submit" name="addcart" value="Add To Cart" class="btn btn-success"><br>
                                                <input type="hidden" name="cakeid" value="<?php echo $fetch_record[0];?>">

                                            </div>
                                        </div>

                                 </form>

                                </div>


                        <?php  } ?>

                      </div>
                  </div>
                <?php } ?>
                <!--  End for all cakes -->
                     
       </div>
</div>
				
<br><br>
<?php
include("footer.php");

?>