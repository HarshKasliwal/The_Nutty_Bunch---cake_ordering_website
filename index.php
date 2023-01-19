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
				//$cart_data[$keys]["sele_qty"] = $cart_data[$keys]["sele_qty"] + $_POST["cqty"];
                echo "<script>alert('This Cake is Allready Add');
                      window.location='index.php'</script>";
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

include("header.php");

//add to cart using cookie

//print_r($_COOKIE["cake_info"]);



?>



		<!-- banner -->
		<!-- main image slider container -->
		<div id="slider-main">
			<div class="banner-text-agile text-center">
				<div class="container">
					<h3 class="text-white font-weight-bold mb-3">The Taste Of Our Amazing Cakes</h3>
					<p class="text-light">Best Cakes Here</p><br>
					
						<a href="all_cake.php" class="btn btn-success btn-lg">For More</a>
					
				</div>
			</div>
			<!-- previous button -->
			<button id="prev">
				<i class="fas fa-chevron-left"></i>
			</button>

			<!-- image container -->
			<div id="slider"></div>

			<!-- next button -->
			<button id="next">
				<i class="fas fa-chevron-right"></i>
			</button>

			<!-- small circles container -->
			<div id="circles"></div>

		</div>
		
	<!-- banner-bottom -->
	<section class="banner-main-agiles py-5">
		<div class="banner-bottom-w3layouts" id="about">
			<div class="container pt-xl-5 pt-lg-3">
				<div class="row mt-5">
					<div class="col-lg-6">
						<p class="text-uppercase">A few words</p>
						<h3 class="aboutright">Welcome to Cakes Bakery</h3>
						<h4 class="aboutright">Chocolate Brithday Cake</h4>
						<p></p>
						<button type="button" class="btn btn-primary button mt-md-5 mt-4" onclick="window.location='about.php'">
							<span>Learn More</span>
						</button>
					</div>
					<div class="col-lg-6 about-img text-lg-enter">
						<img src="images/about.png" alt="" class="img-fluid">
					</div>
				</div>
			</div>


		</div>
		
		<!-- cake -->
		<img src="images/cake7.png" alt="" class="img-fluid cake-style">

		<!-- //cake -->
	</section>

	<!-- services -->
	<div class="serives-agile py-5 bg-light border-top" id="services">
		<div class="container py-xl-5 py-lg-3">
			<div class="row support-bottom text-center">
				<div class="col-md-4 support-grid">
					<i class="far fa-heart"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Made With Love</h5>
					<!-- <p>Ut enim ad minima veniam, quis nostrum ullam corporis suscipit laboriosam.</p> -->
				</div>
				<div class="col-md-4 support-grid my-md-0 my-4">
					<i class="fas fa-birthday-cake"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Seasonal Pastries</h5>
					<!-- <p>Ut enim ad minima veniam, quis nostrum ullam corporis suscipit laboriosam.</p> -->
				</div>
				<div class="col-md-4 support-grid">
					<i class="far fa-calendar"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Event Catering</h5>
					<!-- <p>Ut enim ad minima veniam, quis nostrum ullam corporis suscipit laboriosam.</p> -->
				</div>
			</div>
		</div>
	</div>
	<!-- //services -->

	<section class="welcome_bakery_area cake_feature_main p_100">
        	<div class="container">
				<div class="main_title">
					<h2>Our Featured Cakes</h2>
				</div><br><br>
                <div class="cake_feature_row row">
                <?php
                $sel_cake="SELECT `cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price` FROM `cake_details` LIMIT 4 ;";

                $qry=mysqli_query($con,$sel_cake);

                while($fetch_record=mysqli_fetch_array($qry))
                {

                ?>	
                
					<div class="col-lg-3 col-md-4 col-6">
                        <form action="" method="post">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="admin/<?php echo $fetch_record[2]; ?>" alt="" style="height: 250px; width: 250px;" class="img-fluid">
                                <input type="hidden" name="cimg" value="<?php echo $fetch_record[2]; ?>">
							</div>
							<div class="cake_text">
								<h4><?php echo $fetch_record[5]; ?></h4>
                                <input type="hidden" name="cprice" value="<?php echo $fetch_record[5]; ?>">
								<h3><?php echo $fetch_record[1];  ?></h3>
                                <input type="hidden" name="cname" value="<?php echo $fetch_record[1]; ?>">
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
				             <input type="submit" name="addcart" value="Add To Cart" class="btn btn-success">
                                <input type="hidden" name="cakeid" value="<?php echo $fetch_record[0];?>">
							</div>
						</div>
                        </form>
					</div>
               
                <?php } ?>
				</div>
        	</div>
        </section>
        <div class="col text-center">
            <br><a href="all_cake.php" class="btn btn-primary py-4 w-50"><h1>For All Cakes</h1></a>
        </div>

        <!--================End Welcome Area =================-->
     
	<!-- support -->
	<div class="serives-agile py-5" id="support">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-5">
				<h3 class="text-dark mb-2">Help & Support</h3>
				
			</div>
			<div class="row support-bottom text-center">
				<div class="col-md-4 support-grid">
					<i class="fas fa-headphones"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Online Support</h5>
					<p>nuttybunch.com</p>
					<button type="button" class="button button-2" onclick="window.location='contact.php'">
						<span>visit Us</span>
					</button>
				</div>
				<div class="col-md-4 support-grid my-md-0 my-5">
					<i class="far fa-comments"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Live Chat 24/7</h5>
					<p>in instagram @the_nutty_bunch</p>
					<button type="button" class="button button-2 active" onclick="window.location='contact.php'">
						<span>Let's Chat</span>
					</button>
				</div>
				<div class="col-md-4 support-grid">
					<i class="fas fa-question"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Any Questions</h5>
					<p>Contact Us</p>
					<button type="button" class="button button-2" onclick="window.location='contact.php'">
						<span>Learn More</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- support -->

<?php

include("footer.php");

?>