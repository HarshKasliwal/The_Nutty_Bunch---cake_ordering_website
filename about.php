<?php
session_start();
include("same.php");
include("header.php");
?>
	

	<!-- about page -->
	<!-- about section -->
	<section class="bottom-banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 about-img-pages">
				</div>
				<div class="col-lg-6 about-info">
					<div class="title text-center mb-5">
						<h3 class="text-dark mb-2">About Us</h3>
						<p>About Our Cake Website</p>
					</div>
					<div class="service-in text-left">
						<div class="card">
							<div class="card-body">
								<i class="far fa-heart"></i>
								<h5 class="card-title mt-4 mb-3">Made With Love</h5>
								<p class="card-text">Cake is very Testy
								</p>
							</div>
						</div>
					</div>
					<div class="service-in text-left mt-5">
						<div class="card">
							<div class="card-body">
								<i class="fas fa-glass-martini"></i>
								<h5 class="card-title mt-4 mb-3">Seasonal Pastries</h5>
								<p class="card-text">More Cake is Coming Soon....
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //about section -->

	

	<!-- services -->
	<div class="serives-agile py-5 bg-light border-top" id="services">
		<div class="container py-xl-5 py-lg-3">
			<div class="row support-bottom text-center">
				<div class="col-md-4 support-grid">
					<i class="far fa-heart"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Made With Love</h5>
					
				</div>
				<div class="col-md-4 support-grid my-md-0 my-4">
					<i class="fas fa-birthday-cake"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Seasonal Pastries</h5>
					
				</div>
				<div class="col-md-4 support-grid">
					<i class="far fa-calendar"></i>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Event Catering</h5>
					
				</div>
			</div>
		</div>
	</div>
	<!-- //services -->

	
	<?php
    include("footer.php");
    ?>