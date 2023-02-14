
@extends('layouts.frontend.main')
@section('content')

	<!--====== Header part end ======-->
	<!--====== Banner part start ======-->
	<section class="banner-section">
		<div class="banner-slider" id="bannerSlider">
			<div class="single-banner" style="background-image: url(frontend/img/banner/01.png);">
				<div class="container">
					<div class="row">
						<div class="col-lg-10">
							<div class="banner-content">
								<span class="promo-text" data-animation="fadeInDown" data-delay="0.8s">
									Your Freedom:
								</span>
								<h1 data-animation="fadeInUp" data-delay="1s">
									Unlocking Financial <br> Health <br> to Creditors
								</h1>
								<p style="color: white"> Leading Loan Management System specifically tailored for Microfinances, Saccos, Chamas and Individual lenders </p>
								<ul class="btn-wrap">
									<li data-animation="fadeInLeft" data-delay="1.2s">
										<a href="sign-up" class="main-btn main-btn-4">Get Started Now</a>
									</li>
									<li data-animation="fadeInRight" data-delay="1.4s">
										<a href="/features" class="main-btn main-btn-2">Our Services</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="banner-shapes">
					<div class="one"></div>
					<div class="two"></div>
					<div class="three"></div>
					<div class="four"></div>
				</div>
			</div>
			<div class="single-banner" style="background-image: url(frontend/img/banner/02.png);">
				<div class="container">
					<div class="row">
						<div class="col-lg-10">
							<div class="banner-content">
								<span class="promo-text" data-animation="fadeInDown" data-delay="0.8s">
									Your Choice:
								</span>
								<h1 data-animation="fadeInUp" data-delay="1s">
								Integrated Solution <br> for Loan Management
								</h1>
								<p style="color: white"> Eliminate the hassle and inefficiency of manual loan management with LoanMint. </p>
								<ul class="btn-wrap">
									<li data-animation="fadeInLeft" data-delay="1.2s">
										<a href="sign-up" class="main-btn main-btn-4">Get Started Now</a>
									</li>
									<li data-animation="fadeInRight" data-delay="1.4s">
										<a href="/features" class="main-btn main-btn-2">Our Services</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="banner-shapes">
					<div class="one"></div>
					<div class="two"></div>
					<div class="three"></div>
					<div class="four"></div>
				</div>
			</div>
			<div class="single-banner" style="background-image: url(frontend/img/banner/03.png);">
				<div class="container">
					<div class="row">
						<div class="col-lg-10">
							<div class="banner-content">
								<span class="promo-text" data-animation="fadeInDown" data-delay="0.8s">
									Our Passion:
								</span>
								<h1 data-animation="fadeInUp" data-delay="1s">
									Making a Difference <br> Grow Your Business <br> With Modern Ideas
								</h1>
								<p style="color:white"> Come work with us. Get started to unlock the door to exponencial growth. </p>
								<ul class="btn-wrap">
									<li data-animation="fadeInLeft" data-delay="1.2s">
										<a href="sign-up" class="main-btn main-btn-4">Get Started Now</a>
									</li>
									<li data-animation="fadeInRight" data-delay="1.4s">
										<a href="/features" class="main-btn main-btn-2">Our Services</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="banner-shapes">
					<div class="one"></div>
					<div class="two"></div>
					<div class="three"></div>
					<div class="four"></div>
				</div>
			</div>
		</div>

		<div class="search-wrap">
			<a href="#" class="search-icon"><i class="far fa-search"></i></a>
		</div>
	</section>
	<!--====== Banner part end ======-->

	<!--====== About Section start ======-->
	<section class="about-section about-illustration-img section-gap">
		<div class="container">
			<div class="illustration-img">
				<img src="frontend/img/illustration/1.png" alt="Image">
			</div>
			<div class="row no-gutters justify-content-lg-end justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="about-text">
						<div class="section-title left-border mb-40">
							<span class="title-tag">About Us</span>
							<h2 class="title">Loan Management <br> System </h2>
						</div>
						<p class="mb-25">
							Within our approach for developing timely solutions to the Microfinance market,
							Loan Mint found the need for web-based, affordable loan management software. 
							With the continued and fast-paced development of the Internet. We considered the future of the way 
							we do business, and this is where LoanMint&#8482; was conceptualised.
							<br>


							<br />

							Our state-of-the-art system streamlines the loan origination process by micro finances and SACCOs
							 from application to disbursement, optimizing your operations and reducing time and resource expenditure. 
							 In addition, it provides comprehensive real-time reporting and loan tracking, 
							 allowing you to make informed decisions and drive business growth with access to relevant information.
						</p>
						<ul class="about-list">
							<li> <i class="far fa-check"></i> Loan Origination</li>
							<li> <i class="far fa-check"></i> Loan Disbursment</li>
							<li> <i class="far fa-check"></i> Loan Repayment</li>
						</ul>
						<a href="/about" class="main-btn">Learn More</a>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!--====== About Section end ======-->

	<!--====== Service Part Start ======-->
	<section class="service-section shape-style-one section-gap grey-bg">
		<div class="container">
			<!-- Section Title -->
			<div class="section-title text-center both-border mb-30">
				<span class="title-tag">Our Features</span>
				<h2 class="title">We Provide Most Exclusive <br> features For Business</h2>
			</div>
			<!-- Services Boxes -->
			<div class="row service-boxes justify-content-center">
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInLeft" data-wow-duration="1500ms"
					data-wow-delay="400ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/icons/01.png" alt="Icon">
						</div>
						<h3><a href="#">Loan Management</a></h3>
						<p>Manage your loans easily in one place.</p><br>
						<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInUp" data-wow-duration="1500ms"
					data-wow-delay="600ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/icons/02.png" alt="Icon">
						</div>
						<h3><a href="#">CRM System</a></h3>
						<p>Experience great collaboration tools for your business evaluation</p>
						<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInRight" data-wow-duration="1500ms"
					data-wow-delay="800ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/icons/03.png" alt="Icon">
						</div>
						<h3><a href="#">Mpesa Integration</a></h3>
						<p>Experience wide range of integrated payments for loan colletions.</p>
						<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="dots-line">
			<img src="frontend/img/lines/07.png" alt="Image">
		</div>
	</section>
	<!--====== Service Part End ======-->

	<!--====== Video Start ======-->
	<section class="video-section bg-img-c section-gap" style="background-image: url(frontend/img/video-bg/Video.png);">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-xl-7 col-lg-8 col-md-10 order-2 order-md-1">
					<div class="video-text">
						<div class="section-title left-border mb-30">
							<span class="title-tag">Watch Videos</span>
							<h2 class="title">
								Exclusive Video Presentation <br> About How our System works
							</h2>
						</div>
						<p>
							Find the demo links for our sandbox working product to get the feeling of 
							how our system works in depth.
						</p>
						<a href="#" class="main-btn">View Demo</a>
					</div>
				</div>
				<div class="col-lg-3 col-lg-4 col-md-2 order-1 order-md-2">
					<div class="video-btn text-md-center wow fadeInUp" data-wow-duration="1500ms"
						data-wow-delay="400ms">
						<a href="https://www.youtube.com/watch?v=acOOwqxASpM" class="play-btn popup-video">
							<img src="frontend/img/icons/play.svg" alt="">
							<i class="fas fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="line-shape">
			<img src="frontend/img/lines/08.png" alt="Line">
		</div>
	</section>
	<!--====== Video end ======-->

	<!--====== Feature Part start ======-->
	<section class="feature-section section-gap">
		<div class="container">
			<div class="section-title text-center both-border mb-50">
				<span class="title-tag"> Our Core Features </span>
				<h2 class="title">We Are Specialists in <br> Loan management </h2>
			</div>
			<!-- Feature boxes -->
			<div class="feature-boxes row justify-content-center">
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/01.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Origination</h4>
							<p>& Registration</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/02.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Approval</h4>
							<p>Channeled Approval Process</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/03.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Disbursment</h4>
							<p>Integrated Fully.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/04.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Reminders</h4>
							<p>Sms, Mails and calls</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/05.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Repayment</h4>
							<p>Scheduled Repayments</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-10 col-tiny-12">
					<div class="feature-box">
						<div class="feature-bg bg-img-c" style="background-image: url(frontend/img/feature/06.jpg);">
						</div>
						<div class="feature-desc">
							<a href="#" class="feature-link"><i class="fal fa-long-arrow-right"></i></a>
							<h4>Loan Top-Up & Rescheduling</h4>
							<p>Join us for more</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== Feature Part end ======-->

	<!--====== Why Choose Us Part Start ======-->
	<section class="wcu-section box-style">
		<div class="container">
			<div class="wcu-inner">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6">
						<div class="wcu-image text-center text-lg-left wow fadeInUp" data-wow-duration="1500ms"
							data-wow-delay="400ms">
							<img src="frontend/img/illustration/2.png" alt="Image">
						</div>
					</div>
					<div class="col-lg-6 col-md-10">
						<div class="wcu-text">
							<div class="section-title left-border mb-40">
								<span class="title-tag">What We Do</span>
								<h2 class="title">Why Choose Loan Mint <br> LMS</h2>
							</div>
							<p>
							With LoanMint, you can create custom loan products, 
							evaluate loan applications using credit scoring and risk assessment tools, manage customer information, 
							and track repayments in real-time. The software also includes powerful reporting and analytics tools, 
							providing valuable insights into your loan portfolio and allowing you to make informed decisions.
							<br>

							</br>
							LoanMint uses the latest security measures to ensure the safety of your data, 
							and its robust infrastructure provides reliable and efficient performance. 
							The software is easy to use, and LoanMint offers comprehensive training and onboarding services to 
							ensure that you and your team are fully equipped to use the platform effectively.

							</p>
							<ul class="wcu-list">
								<li>
									<i class="far fa-check-circle"></i> Efficiency to the core
								</li>
								<li>
									<i class="far fa-check-circle"></i> Remote Integration and support

								</li>
								<li>
									<i class="far fa-check-circle"></i> Real Time Reports
								</li>
							</ul>

							<a href="#" class="main-btn main-btn-4">Join Us</a>
						</div>
					</div>
				</div>
				<img src="frontend/img/lines/03.png" alt="shape" class="line-shape-one">
				<img src="frontend/img/lines/04.png" alt="shape" class="line-shape-two">
			</div>
		</div>
	</section>
	<!--====== Why Choose Us Part End ======-->
<br />
	<!--====== Fact Part Start ======-->
	{{-- <section class="fact-section grey-bg">
		<div class="container">
			<div class="fact-boxes row justify-content-between align-items-center">
				<div class="col-lg-3 col-6">
					<div class="fact-box text-center mb-40">
						<div class="icon">
							<i class="flaticon-graphic"></i>
						</div>
						<h2 class="counter">3568</h2>
						<p class="title">Loans Released</p>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="fact-box text-center mb-40">
						<div class="icon">
							<i class="flaticon-plan"></i>
						</div>
						<h2 class="counter">7859</h2>
						<p class="title">Loans Collected</p>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="fact-box text-center mb-40">
						<div class="icon">
							<i class="flaticon-target-1"></i>
						</div>
						<h2 class="counter">6352</h2>
						<p class="title">Open Loans</p>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="fact-box text-center mb-40">
						<div class="icon">
							<i class="flaticon-teamwork"></i>
						</div>
						<h2 class="counter">7856</h2>
						<p class="title">Team Members</p>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--====== Fact Part End ======-->
<br />
	<!--====== Skill Section Start ======-->
	<section class="skill-section">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6 col-md-10">
					<!-- Skill Text Block -->
					<div class="skill-text">
						<div class="section-title mb-40 left-border">
							<span class="title-tag">Company Skills</span>
							<h2 class="title">We Have Experience <br> in exceptional Loan Management System</h2>
						</div>
						<p>
							Our state-of-the-art system streamlines the loan origination process by 
							micro finances and SACCOs from application to disbursement, optimizing your operations 
							and reducing time and resource expenditure. In addition, it provides comprehensive real-time reporting and loan tracking, 
							allowing you to make informed decisions and drive business growth with access to relevant information.
						</p>
						<p>
							With LoanMint, you can streamline the loan management process, 
							reduce time and resource expenditure, and grow your business with confidence. 
						</p>

						<a href="#" class="main-btn">Get A Demo</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-10">
					<div class="piechart-boxes">
						<div class="chart-box">
							<div class="chart" data-percent="75">
								<i class="flaticon-presentation"></i>
							</div>
							<h4 class="title">Business Growth</h4>
						</div>
						<div class="chart-box">
							<div class="chart" data-percent="80">
								<i class="flaticon-money-bags"></i>
							</div>
							<h4 class="title">Customer Retention</h4>
						</div>
						<div class="chart-box">
							<div class="chart" data-percent="75">
								<i class="flaticon-invest"></i>
							</div>
							<h4 class="title">Efficient</h4>
						</div>
						<div class="chart-box">
							<div class="chart" data-percent="80" color="purple">
								<i class="flaticon-connector"></i>
							</div>
							<h4 class="title">Relationship Buildup</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== Skill Section End ======-->

@endsection