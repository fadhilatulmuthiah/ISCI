

<?php 
	$conn = mysqli_connect("localhost", "root", "", "isci");
	$user = mysqli_query($conn, "SELECT * FROM user");
 ?>

	<!-- team -->
	<section class="team py-md-5">
		<div class="container py-4 mt-2">
			<h3 class="w3ls-title text-uppercase text-center">Our Tutors </h3>
			<div class="row inner-sec-w3layouts-agileinfo mt-md-5 pt-3">
				<!-- start -->
				<?php while ($u = mysqli_fetch_array($user)) : ?>
				<div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right" style="padding-top:15px; padding-bottom:15px;">
					<img src="<?= base_url('front_dashboard') ?>/images/t1.jpg" class="img-responsive" alt="">
					<div class="team-info">
						<div class="caption">
							<h4><?= $u["nama"] ?></h4>
						</div>
						<div class="social-icons-section">
							<a class="fac" href="#">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a class="twitter" href="#">
								<i class="fab fa-twitter"></i>
							</a>
							<a class="pinterest" href="#">
								<i class="fab fa-pinterest-p"></i>
							</a>

						</div>

					</div>
				</div>
				<?php endwhile; ?>

			</div>
		</div>
	</section>
	<!-- //team -->
