<section class="w3l-banner">
<!-- Start Carousel -->
<div class="container">
	<div class="flexslider-info">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<!-- Start Eachfor -->
					<li>
						<div class="w3l-info">
							<h1>Start Learning For successful future</h1>
							<p>We have the perfect accommodation for you.</p>
						</div>
					</li>
					<!-- End Eachfor -->
					<li>
						<div class="w3l-info">
							<h1>Start Learning For successful future</h1>
							<p>We have the perfect accommodation for you.</p>
						</div>
					</li>
					<li>
						<div class="w3l-info">
							<h1>Start Learning For successful future</h1>
							<p>We have the perfect accommodation for you.</p>
						</div>
					</li>
					<li>
						<div class="w3l-info">
							<h1>Start Learning For successful future</h1>
							<p>We have the perfect accommodation for you.</p>
						</div>
					</li>
				</ul>
			</div>
		</section>
	</div>
</div>
</section>
<!-- Start Carousel -->

<!-- Locations -->
<section class="banner_form py-5">
	<div class="container py-md-4 mt-md-3">
		<h3 class="w3ls-title text-uppercase text-center">our locations</h3>
		<div class="row ban_form mt-3 pt-md-5">
			<div class="bg-white">
				<div class="tr.collapse.show">
					<?php if (isset($location)){ ?>
						<div class="col-md-6 categories_sub cats">
							<!-- Start Eachfor -->
							<?php foreach ($location as $key) { ?>
								<div class="categories_sub1">
									<h3 class="mt-3"><?= esc($key['nama_lokasi']) ?></h3>
									<p class="mt-3 mb-5"><?= esc($key['alamat']) ?></p>
								</div>
							<?php } ?>
							<!-- End Eachfor -->
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Locations -->
	
	<!-- class -->
	<section class="agileits-services text-center py-5" style="background-color: #3b5b7d1f"> <!-- buat style baru buat bg dibawah .slide-bg [perhatikan height] -->
		<div class="container py-md-4 mt-md-3">
			<h3 class="w3ls-title text-uppercase">Our Class</h3>
			<!-- service grid row-->
			<div class="agileits-services-row row mt-md-3 pt-5">
				<div class="col-lg-4 col-md-6 mb-5 agileits-services-grids  order-md-1 order-1">
					<span class="fas fa-book"></span>
					<h4 class="mt-2 mb-2">Kyorugi</h4>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores</p>
				</div>
				<div class="col-lg-4 col-md-6 mb-5 agileits-services-grids order-md-2 order-2">
					<span class="fas fa-graduation-cap"></span>
					<h4 class="mt-2 mb-2">Poomsae</h4>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores</p>
				</div>
				<div class="col-lg-4 col-md-6 mb-5 agileits-services-grids order-md-3 order-3">
					<span class="fas fa-id-card"></span>
					<h4 class="mt-2 mb-2">Tournament</h4>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores</p>
				</div>
			</div>
			<!-- // service grid row-->
		</div>
	</section>
<!-- class -->

<!-- daftar -->
<section class="slide-bg py-5">
	<div class="container py-md-4 mt-md-3">
		<div class="bg-pricemain">
			<div class="reg-fom">
				<?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
				<h4 class="text-white text-center">Registration</h4>
				<form action="<?php echo base_url('home/add') ?>" method="post">
					<div class="reg-fom-btm mt-3">
						<div class="fields">
							<span class="text-white mb-2">Name</span>
							<div>
								<input type="text" name="name" placeholder="Full Name">
							</div>
						</div>
					</div>
					<div class="reg-fom-btm mt-3">
						<div class="fields">
							<span class="text-white mb-2">Contact</span>
							<div>
								<input type="text" name="kontak" placeholder="Contact Number">
							</div>
						</div>
					</div>
					<div class="reg-fom-btm mt-3">
						<div class="fields">
							<span class="text-white mb-2">Locations</span>
							<select class="form-control" name="location">
							<?php if (isset($location)){ ?>
								<!-- Start Eachfor -->
								<?php foreach ($location as $key) { ?>
									<option value="<?= esc($key['id']) ?>"><?= esc($key['nama_lokasi']) ?></option>
								<?php } ?>
								<!-- End Eachfor -->
							<?php } ?>
							</select>
						</div>
					</div>
					<div class="reg-fom-btm mt-3">
						<div class="fields">
							<span class="text-white mb-2">Belt Level</span>
							<select class="form-control" name="belt">
							<?php if (isset($belt)){ ?>
								<!-- Start Eachfor -->
								<?php foreach ($belt as $key) { ?>
									<option value="<?= esc($key['id']) ?>"><?= esc($key['warna']) ?></option>
								<?php } ?>
								<!-- End Eachfor -->
							<?php } ?>
							</select>
						</div>
					</div>
					<div class="reg-fom-btm mt-5">
						<input type="submit" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- end daftar -->

<!-- promotions -->
<section class="wthree-row w3-about  py-5">
	<div class="container py-md-4 mt-md-3">
		<h3 class="w3ls-title text-uppercase text-center">Lates Post</h3>
		<div class="card-deck mt-md-3 pt-5">
			<div class="card">
				<img src=<?= base_url('front_dashboard/images/g1.jpg') ?> class="img-fluid" alt="Card image cap">
				<div class="card-body w3ls-card">
					<h5 class="card-title">Learn Photoshop.</h5>
					<p class="card-text mb-3 ">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
				</div>
			</div>
			<div class="card">
				<img src=<?= base_url('front_dashboard/images/g1.jpg') ?> class="img-fluid" alt="Card image cap">
				<div class="card-body w3ls-card">
					<h5 class="card-title">Learn Photoshop.</h5>
					<p class="card-text mb-3 ">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
				</div>
			</div>
			<div class="card">
				<img src=<?= base_url('front_dashboard/images/g1.jpg') ?> class="img-fluid" alt="Card image cap">
				<div class="card-body w3ls-card">
					<h5 class="card-title">Learn Photoshop.</h5>
					<p class="card-text mb-3 ">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //promotions