<!-- footer -->
<footer>
<section class="footer footer_w3layouts_section_1its py-md-5">
	<div class="container py-5">
		<div class="row footer-top">
			<div class="col-lg-6 footer-grid_section_1its_w3 map-section">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7010105668433!2d106.75830061476951!3d-6.302959395438304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef7bc38fb7a7%3A0x5bd5f9f50df802f1!2sTaekwondo%20ISCI!5e0!3m2!1sid!2sid!4v1619164354845!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-lg-3 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>About Us</h3>
				</div>
				<div class="footer-text">
					<p>Curabitur non nulla sit amet nislinit tempus convallis quis ac lectus. lac inia eget consectetur sed, convallis at tellus.
						Nulla porttitor accumsana tincidunt. Vestibulum ante ipsum primis tempus convallis.</p>
					<ul class="social_section_1info">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-google-plus-g"></i></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>Contact Info</h3>
				</div>
				<div class="contact-info">
					<h4>Location :</h4>
					<p>Jl. Ciputat Raya No.2, Cireundeu, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15419</p>
					<div class="phone">
						<h4>Phone :</h4>
						<p>Phone : </p>
						<p>Email : <a href="mailto:"></a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<!-- <p>© 2018 Tutorage. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p> -->
		</div>
	</div>
</section>
</footer>
<!-- //footer -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="<?= base_url('front_dashboard') ?>/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?= base_url('front_dashboard') ?>/js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->
<!--menu script-->
<script type="text/javascript" src="<?= base_url('front_dashboard') ?>/js/modernizr-2.6.2.min.js"></script>
		<script src="<?= base_url('front_dashboard') ?>/js/jquery.fatNav.js"></script>
		<script>
		(function() {
			
			$.fatNav();
			
		}());
		</script>
<!--Start-slider-script-->
	<script defer src="<?= base_url('front_dashboard') ?>/js/jquery.flexslider.js"></script>
		<script type="text/javascript">
		
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
<!--End-slider-script-->
</body>
<!-- //Body -->
</html>