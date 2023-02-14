@extends('layouts.frontend.main')
@section('content')

<section class="service-section shape-style-one section-gap grey-bg">
		<div class="container">
			<!-- Section Title -->
			<div class="section-title text-center both-border mb-30">
				<span class="title-tag">Pricing</span>
				<h2 class="title">Our Plans</h2>
			</div>
			<!-- Services Boxes -->
			<div class="row service-boxes justify-content-center">
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInLeft" data-wow-duration="1500ms"
					data-wow-delay="400ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/pricing/basic.png" alt="Icon">
						</div>
						<h3 class="title">Basic Package</h3>
                        <p>Ideal for Individual Lenders</p>
                                <p class="price-figure"><span class="price-figure-inner"><br/>
                                    <span class="currency">KSh</span><h4 class="number">5,000</h4>
                                    <span class="unit"> per month</span></span></p><br>
                            
                                <ul class="list-unstyled feature-list">
                                    <li><i class="fa fa-user"></i>1 Staff</li><br/><hr>
                                    <li><i class="fa fa-check"></i>All plans have unlimited features</li>
                                </ul>
						<!--<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInUp" data-wow-duration="1500ms"
					data-wow-delay="600ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/pricing/premium.png" alt="Icon">
						</div>
						<h3><a href="#">Premium Package</a></h3>
						<p>Offers additional features.</p>
                        <p class="price-figure"><span class="price-figure-inner"><br/>
                                    <span class="currency">KSh</span><h4 class="number">20,000</h4>
                                    <span class="unit"> per month</span></span></p><br>
                            
                                <ul class="list-unstyled feature-list">
                                <li><i class="fa fa-user"></i> 10 Staff</li><br/><hr>
                                    <li><i class="fa fa-check"></i>All plans have unlimited features</li>
                                </ul>
						<!--<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-8 col-10 col-tiny-12 wow fadeInRight" data-wow-duration="1500ms"
					data-wow-delay="800ms">
					<div class="service-box text-center">
						<div class="icon">
							<img src="frontend/img/pricing/executive.png" alt="Icon">
						</div>
						<h3><a href="#">Enterprise Package</a></h3>
						<p>Customizable as per user's needs</p>
                        <p class="price-figure"><span class="price-figure-inner">
                                    <span class="currency"></span><h4 class="number"><i>Custom</i></h4>
                                    <span class="unit"> </span></span></p><br>

</br>
                            
                                <ul class="list-unstyled feature-list">
                                <li><i class="fa fa-group"></i>Unlimited Staff</li><br/><hr>
                                    <li><i class="fa fa-check"></i>All plans have unlimited features</li>
                                </ul>
						<!--<a href="#" class="service-link">
							<i class="fal fa-long-arrow-right"></i>
						</a> -->
					</div>
                    <div class="price-cols row">
                 
                    
                </div><!--//items-wrapper-->  
                                 
            </div>
				</div>
			</div>
		</div>
		<div class="dots-line">
			<img src="frontend/img/lines/07.png" alt="Image">
		</div>
	</section>
    
@endsection