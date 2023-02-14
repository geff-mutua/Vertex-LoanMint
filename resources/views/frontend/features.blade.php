@extends('layouts.frontend.main')
@section('content')


 <section class="breadcrumb-section bg-img-c" style="background-image: url(frontend/img/breadcrumb1.png);">
    <div class="container">
        <div class="breadcrumb-text">
            <h1 class="page-title">Our Features</h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li>Features</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-shapes">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</section>

<section class="working-process-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 order-lg-1 order-2">
                <div class="process-text">
                    <!-- Section Title -->
                    <div class="section-title left-border mb-30">
                        <span class="title-tag">Working Process</span>
                        <h2 class="title">Our Main Features</h2>
                    </div>
                    <p>
                        The following are our main system features.
                    </p>
                    <!-- process-loop -->
                    <div class="process-loop">
                        <div class="single-process wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                            <div class="icon">
                                <i class="fal fa-coffee"></i>
                                <span>01</span>
                            </div>
                            <div class="content">
                                <h4>Payment Integration</h4>
                                <p>We have a wide range of system integration to various companies like banks and Mpesa</p>
                            </div>
                        </div>
                        <div class="single-process wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                            <div class="icon">
                                <i class="fal fa-coffee"></i>
                                <span>02</span>
                            </div>
                            <div class="content">
                                <h4>Financial Reporting Tools</h4>
                                <p>We have a financial reporting system that enables you get reports easily and efficient.</p>
                            </div>
                        </div>
                        <div class="single-process wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="icon">
                                <i class="fal fa-coffee"></i>
                                <span>03</span>
                            </div>
                            <div class="content">
                                <h4>Clients Management</h4>
                                <p>Manage your clients and records and financial statements in one place.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 order-lg-2 order-1">
                <div class="process-video bg-img-c" style="background-image: url(frontend/img/video-bg/01.png);">
                    <div class="video bg-img-c wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="400ms"
                        style="background-image: url(frontend/img/video-bg/02.png);">
                        <a class="paly-icon popup-video" href="https://www.youtube.com/watch?v=acOOwqxASpM">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="working-circle"></div>
</section>

<section class="service-section grey-bg service-line-shape section-gap">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center both-border mb-50">
            <span class="title-tag">Inclusive Features</span>
            <h2 class="title">We Provide Most Exclusive <br> Service For Business</h2>
        </div>
        <!-- Services Boxes -->
        <div class="row service-boxes justify-content-center">
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/01.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Approval</a></h3>
                    <p>Easy Approval Process</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="500ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/02.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Origination</a></h3>
                    <p>Details Info.</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/03.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Disbursement</a></h3>
                    <p>Integrated with Other Payments</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="700ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Reminders</a></h3>
                    <p>SMS,Emails and Calls</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/01.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Reports</a></h3>
                    <p>Income and Statements</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="900ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/02.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Book</a></h3>
                    <p>Know what is owed</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/03.png" alt="Icon">
                    </div>
                    <h3><a href="#">CRM</a></h3>
                    <p>Collaborative Tools</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1.1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Productivity</a></h3>
                    <p>Business Evaluation</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1.1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">SMS and USSD</a></h3>
                    <p>customize SMS and USSD messages</p>
                    <a href="#" class="service-link">
 <!--    <i class="fal fa-long-arrow-right"></i> -->                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1.1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Top-up</a></h3>
                    <p>Allows Top-ups</p>
                    <a href="#" class="service-link">
                         <!--    <i class="fal fa-long-arrow-right"></i> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1.1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Rescheduling</a></h3>
                    <p>Set to sooner or later</p>
                    <a href="#" class="service-link">
                         <!--    <i class="fal fa-long-arrow-right"></i> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1.1s">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Data Security</a></h3>
                    <p>Integrated infrastructure</p>
                    <a href="#" class="service-link">
                    <!--    <i class="fal fa-long-arrow-right"></i> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="line-one">
        <img src="frontend/img/lines/12.png" alt="line-shape">
    </div>
    <div class="line-two">
        <img src="frontend/img/lines/11.png" alt="line-shape">
    </div>
</section>

@endsection