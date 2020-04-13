<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" href="{{URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="{{URL::asset('css/style (2).css')}}" rel='stylesheet' type='text/css' />
	<link href="{{URL::asset('css/font-awesome.css')}}" rel="stylesheet">
	<script src="{{URL::asset('js/jquery.min.js')}}"> </script>
	<script src="{{URL::asset('js/bootstrap.min.js')}}"> </script>

	<!-- Mainly scripts -->
	<script src="{{URL::asset('js/jquery.metisMenu.js')}}"></script>
	<script src="{{URL::asset('js/jquery.slimscroll.min.js')}}"></script>
	<!-- Custom and plugin javascript -->
	<link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
	<script src="{{URL::asset('js/custom.js')}}"></script>
	<script src="{{URL::asset('js/screenfull.js')}}"></script>
	<script>
		$(function() {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function() {
				screenfull.toggle($('#container')[0]);
			});



		});
	</script>

	<script src="{{URL::asset('https://code.jquery.com/jquery-3.4.1.slim.min.js')}}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="{{URL::asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="{{URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="{{URL::asset('//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}" crossorigin="anonymous"></script>
	<script src="{{URL::asset('//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>


</head>


<body>
	<div id="wrapper">

		<nav class="navbar-default navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<center>
					<h1 class="navbar-brand">{{ Session::get('auth')}}</h1>
				</center>

			</div>
			<div class=" border-bottom">

				<div class="drop-men">
					<ul class=" nav_1">

						<li class="dropdown">
							loged as : <i>{{ (Session::get('loggedas'))}}</i> ,
							<a href="/logout">
								<font color="red">LOG OUT</font>
							</a>
							<img src="images/whitespace.jpg">
						</li>

					</ul>
				</div><!-- /.navbar-collapse -->
				<div class="clearfix">
				</div>

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">

							<li>
								<a href="/panel" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i><span class="nav-label"> Dashboards</span> </a>
							</li>

							<li>
								<a href="/achiev" class=" hvr-bounce-to-right"><i class="fa fa-star nav_icon"></i> <span class="nav-label"> Achievements </span> </a>
							</li>
							@if (Session::get('auth')!='student')
							<li>
								<a href="/regis" class=" hvr-bounce-to-right"><i class="fa fa-edit nav_icon"></i> <span class="nav-label">Registration</span> </a>
							</li>
							<li>
								<a href="/table" class=" hvr-bounce-to-right"><i class="fa fa-users nav_icon"></i> <span class="nav-label"> User Tables </span> </a>
							</li>
							@endif
							@if (Session::get('auth')=='super_admin')
							<li>
								<a href="/system" class=" hvr-bounce-to-right"><i class="fa fa-edit nav_icon"></i> <span class="nav-label"> System Setting </span> </a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</nav>

		@yield('panel')

		<footer>
			<div class="copy">
				<p><?php echo 'PHP version: ' . phpversion(); ?></p>
				<!-- <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p> -->
			</div>
		</footer>
		<!---->
		<!--scrolling js-->
		<script src="{{URL::asset('js/jquery.nicescroll.js')}}"></script>
		<script src="{{URL::asset('js/scripts.js')}}"></script>
		<!--//scrolling js-->
</body>

</html>