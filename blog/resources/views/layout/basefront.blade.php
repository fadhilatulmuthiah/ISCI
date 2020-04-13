<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<!-- 	<link rel="shortcut icon" href="tkd isci.jpg"> -->

	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href='{{asset("css/animate.css")}}'>
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href='{{asset("css/icomoon.css")}}'>
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href=' {{asset("css/simple-line-icons.css")}}'>
	<!-- Bootstrap  -->
	<link rel="stylesheet" href='{{asset("css/bootstrap.css")}}'>
	<!-- Style -->
	<link rel="stylesheet" href='{{asset("css/style.css")}}'>


	<!-- Modernizr JS -->
	<script src='{{asset("js/modernizr-2.6.2.min.js")}}'></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src='{{asset("js/respond.min.js")}}'></script>
	<![endif]-->

</head>

<body>
	<header role="banner" id="fh5co-header">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<!-- Mobile Toggle Menu Button -->
						<a href="#dropdown" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
						<img src='{{asset("images/tkd isci.jpg")}}' height="40%" width="40%">
					</div>
					<div class="navbar-right" id="dropdown">
						<a href="/"><span>Home</span></a>
						<SHADOW>|</SHADOW>
						<a href="/coach"><span>Coach</span></a>
						<SHADOW>|</SHADOW>
						<a href="/login"><span>LogIn</span></a>
					</div>
					<!-- <div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
							<li><a href="#" data-nav-section="services"><span>Services</span></a></li>
							<li><a href="#" data-nav-section="explore"><span>Portfolio</span></a></li>
							<li><a href="#" data-nav-section="pricing"><span>Pricing</span></a></li>
						</ul>
					</div> -->

				</nav>
			</div>
		</div>
	</header>


	@yield('container')


	<div id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 animate-box">
					<h3 class="section-title">Solid.</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>

				</div>

				<div class="col-md-4 animate-box">
					<h3 class="section-title">Our Address</h3>
					<ul class="contact-info">
						<li><i class="icon-map"></i>Jl. Ciputat Raya No.2, Cireundeu, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15419</li>
						<li><i class="icon-phone"></i>+62</li>
						<li><i class="icon-envelope"></i><a href="#">info@yoursite.com</a></li>
						<!-- 						<li><i class="icon-globe"></i><a href="#">www.yoursite.com</a></li> -->
					</ul>
					<h3 class="section-title">Connect with Us</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="https://instagram.com/taekwondo_isci?igshid=1wp9p4wt6kjp7" class="instagram"><i class="icon-instagram"></i></a></li>
						<!-- <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li> -->
					</ul>
				</div>
				<div class="col-md-4 animate-box">
					<h3 class="section-title">Drop us a line</h3>
					<form class="contact-form">
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="name" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="message" class="sr-only">Message</label>
							<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="copy-right">&copy; 2015 Solid Free Template. All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
						Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a>
					</p>
				</div>
			</div>
		</div>
	</div>


	<!-- jQuery -->
	<script src='{{asset("js/jquery.min.js")}}'></script>
	<!-- jQuery Easing -->
	<script src='{{asset("js/jquery.easing.1.3.js")}}'></script>
	<!-- Bootstrap -->
	<script src='{{asset("js/bootstrap.min.js")}}'></script>
	<!-- Waypoints -->
	<script src='{{asset("js/jquery.waypoints.min.js")}}'></script>
	<!-- Stellar Parallax -->
	<script src='{{asset("js/jquery.stellar.min.js")}}'></script>
	<!-- Counters -->
	<script src='{{asset("js/jquery.countTo.js")}}'></script>
	<!-- Main JS (Do not remove) -->
	<script src='{{asset("js/main.js")}}'></script>

</body>

</html>