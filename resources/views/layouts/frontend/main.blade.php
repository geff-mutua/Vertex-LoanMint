<!DOCTYPE html>
<html lang="en">

<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-84HC7J3V8D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-84HC7J3V8D');
</script>

	<!--====== Required meta tags ======-->
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!--====== Title ======-->
	<title> @yield('title') </title>
	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="img/png" />
	<!--====== Animate Css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
	<!--====== Bootstrap css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
	<!--====== Fontawesome css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
	<!--====== Flaticon css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}" />
	<!--====== Magnific Popup css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" />
	<!--====== Slick  css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
	<!--====== Jquery ui ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}" />
	<!--====== Style css ======-->
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
</head>

<body>

	<!--====== Preloader ======-->
	<div id="preloader">
		<div class="loader-cubes">
			<div class="loader-cube1 loader-cube"></div>
			<div class="loader-cube2 loader-cube"></div>
			<div class="loader-cube4 loader-cube"></div>
			<div class="loader-cube3 loader-cube"></div>
		</div>
	</div>

	<!--====== Header part start ======-->
	<header class="sticky-header">
		<!-- Header Menu  -->
		<div class="header-nav">
			<div class="container-fluid container-1600">
				<div class="nav-container">
					<!-- Site Logo -->
					<div class="site-logo">
						<a href="/"><img src="frontend/img/logo-dark.png" alt="Logo" style="height:40px"></a>
					</div>

					<!-- Main Menu -->
					<div class="nav-menu d-lg-flex align-items-center">

						<!-- Navbar Close Icon -->
						<div class="navbar-close">
							<div class="cross-wrap"><span></span><span></span></div>
						</div>

						<!-- Mneu Items -->
						<div class="menu-items">
							<ul>
								<li>
									<a href="/">Home</a>
									
								</li>
								{{-- <li class="has-submemu">
									<a href="services.html">Resources</a>
									
								<!--	<ul class="submenu">
										<li><a href="/about">About Us</a></li>
										
									</ul>-->
								</li> --}}
								
								<li><a href="/about">About Us</a></li>
								
								<li>
									<a href="/features">Features</a>
								</li>
								
								
								
								<li><a href="/pricing">Pricing</a></li>
							</ul>
						</div>
						<!-- Pushed Item -->
						<div class="nav-pushed-item"></div>
					</div>

					<!-- Navbar Extra  -->
					<div class="navbar-extra d-lg-block d-flex align-items-center">
						<!-- Navbtn -->
						<div class="navbar-btn nav-push-item">
							<a class="main-btn main-btn-3" href="/login">Login </a>
						</div>
						<!-- Navbar Toggler -->
						<div class="navbar-toggler">
							<span></span><span></span><span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--====== Header part end ======-->
    @yield('content')

    	<!--====== Footer Part Start ======-->
	<footer>
		<div class="container">
			<div class="footer-widget">
				<div class="row">
					<div class="col-lg-4 col-sm-5 order-1">
						<div class="widget site-info-widget">
							<div class="footer-logo">
								<img src="fronten/img/dark-logo.jpeg" alt="LoanMint">
							</div>
							<p>Take you business to the next level with loan mint</p>
							<ul class="social-links">
								<li><a href="https://www.facebook.com/loanmintlms"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/loan_minttech/"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/@loanmint"><i class="fab fa-youtube"></i></a></li>
								<!--<li><a href="#"><i class="fab fa-behance"></i></a></li>
								<li><a href="#"><i class="fab fa-dribbble"></i></a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-lg-8 col-sm-7 order-2">
						<div class="widget newsletter-widget">
							<h4 class="widget-title">Subscribe Our Newsletters</h4>
							<div class="newsletter-form">
								<form action="info@loan-mint.com">
									<input type="email" placeholder="Enter Your Email">
									<button type="submit" class="main-btn">Subscribe Now</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 order-3">
						<div class="widget nav-widget">
							<h4 class="widget-title">Quick Links</h4>
							<ul>
								<li><a href="/about">Company History</a></li>
							
								<li><a href="/features">Popular Services</a></li>
								<li><a href="/contact">Business & Consulting</a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-lg-5 order-lg-4 order-5">
						<div class="row">
							<div class="col-lg-6 col-sm-6">
								<div class="widget nav-widget">
									<h4 class="widget-title">Company</h4>
									<ul>
										<li><a href="/about">About Comapny</a></li>
										<li><a href="/sign-in">My Account</a></li>
										<li><a href="/sign-up">Get Started</a></li>
										
									</ul>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="widget contact-widget">
									<h4 class="widget-title">Contact Us</h4>
									<p>Feel free to contact us</p>
									<ul class="contact-infos">
										<li>
											<a href="tel:+0123456789">
												<i class="far fa-phone"></i>
												+254 112651011
											</a>
										</li>
										<li>
											<a href="mailto:info@loan-mint.com">
												<i class="far fa-envelope-open"></i>
												info@loan-mint.com
											</a>
										</li>
										<li> <i class="far fa-map-marker-alt"></i> Nairobi Kenya</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 order-lg-5 order-4">
						<div class="widget insta-feed-widget">
							<h4 class="widget-title">Follow Instagram</h4>
							<div class="insta-images">
								<div class="insta-img" style="background-image: url(assets/img/instagram/01.jpg);">
									<a href="https://www.instagram.com/p/CoXiSTXIzuj/?utm_source=ig_web_copy_link">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
								<div class="insta-img" style="background-image: url(assets/img/instagram/02.jpg);">
									<a href="https://www.instagram.com/loan_minttech/">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
								<div class="insta-img" style="background-image: url(assets/img/instagram/03.jpg);">
									<a href="https://www.instagram.com/p/CoXiSTXIzuj/?utm_source=ig_web_copy_link">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
								<div class="insta-img" style="background-image: url(assets/img/instagram/04.jpg);">
									<a href="https://www.instagram.com/p/CoXiSTXIzuj/?utm_source=ig_web_copy_link">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
								<div class="insta-img" style="background-image: url(assets/img/instagram/05.jpg);">
									<a href="#">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
								<div class="insta-img" style="background-image: url(assets/img/instagram/06.jpg);">
									<a href="#">
										<i class="fab fa-instagram"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<p class="copyright-text">
					<span>Copy@ <a href="#">LoanMint</a>.com -{{date('Y')}}</span>
					<span>All Right Reserved Design By LoanMint</span>
				</p>

				<a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a>
			</div>
		</div>

		<!-- Lines -->
		<img src="frontend/img/lines/01.png" alt="line-shape" class="line-one">
		<img src="frontend/img/lines/02.png" alt="line-shape" class="line-two">
	</footer>
	<!--====== Footer Part end ======-->

	<!--====== jquery js ======-->
	<script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
	<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
	<!--====== Bootstrap js ======-->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!--====== Slick js ======-->
	<script src="{{asset('frontend/js/slick.min.js')}}"></script>
	<!--====== Isotope js ======-->
	<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
	<!--====== Magnific Popup js ======-->
	<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<!--====== inview js ======-->
	<script src="{{asset('frontend/js/jquery.inview.min.js')}}"></script>
	<!--====== counterup js ======-->
	<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>
	<!--====== easy PieChart js ======-->
	<script src="{{asset('frontend/js/jquery.easypiechart.min.js')}}"></script>
	<!--====== Jquery Ui ======-->
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!--====== Wow JS ======-->
	<script src="{{asset('frontend/js/wow.min.js')}}"></script>
	<!--====== Main js ======-->
	<script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>