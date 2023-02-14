@extends('layouts.frontend.main')
@section('content')

<section class="breadcrumb-section bg-img-c" style="background-image: url(frontend/img/breadcrumb2.jpg);">
    <div class="container">
        <div class="breadcrumb-text">
            <h1 class="page-title">About Us</h1>
            <ul>
                <li><a href="/features">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-shapes">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</section>

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
                        <h2 class="title">Professional Business <br> Loan Solutions </h2>
                    </div>
                    <p class="mb-25">
                    LoanMint is a loan management system designed for microfinance institutions and SACCOs. 
                    The software automates the loan origination process, from application to disbursement, 
                    streamlining the process and reducing time and resource expenditure. 
                    LoanMint also provides comprehensive real-time reporting and tracking of loans, 
                    making it the perfect solution for organizations that need to manage loans efficiently.
                        
                    </p>
                    <p>
                       We offer the best platform features that enables you evaluate your business performance in just few clicks.
                    </p>
                    <ul class="about-list">
                        <li> <i class="far fa-check"></i> Integrated Payment Systems</li>
                        <li> <i class="far fa-check"></i> Smart Financial Software.</li>
                        <li> <i class="far fa-check"></i> Quick and detailed reports.</li>
                    </ul>
                    <a href="/sign-up" class="main-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-section grey-bg service-line-shape section-gap">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center both-border mb-50">
            <span class="title-tag">Core Features</span>
            <h2 class="title">We Provide Most Exclusive <br> Service For Lenders</h2>
        </div>
        <!-- Services Boxes -->
        <div class="row service-boxes justify-content-center">
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="400ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/01.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Origination </a></h3>
                    <p>and Creation</p>
                    <a href="#" class="service-link">
                        <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="500ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/02.png" alt="Icon">
                    </div>
                    <h3><a href="#">Integrated Payments</a></h3>
                    <p>Mpesa and Banks</p>
                    <a href="#" class="service-link">
                        <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/03.png" alt="Icon">
                    </div>
                    <h3><a href="#">Loan Management</a></h3>
                    <p>Creation, Approval and Disbursement</p>
                    <a href="#" class="service-link">
                        <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-10 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="700ms">
                <div class="service-box-three border-0">
                    <div class="icon">
                        <img src="frontend/img/icons/04.png" alt="Icon">
                    </div>
                    <h3><a href="#">Rescheduling & Repayments</a></h3>
                    <p>Loan Calculation on repayments</p>
                    <a href="#" class="service-link">
                        <i class="fal fa-long-arrow-right"></i>
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
<!--====== Service Section End ======-->

<!--====== Advanced Tabs Section Start ======-->
<section class="advanced-tab section-gap">
    <div class="container">
        <!-- Tabs Buttons -->
        <div class="tab-buttons">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="active" id="nav-mission" data-toggle="tab" href="#tab-mission" role="tab">Our Mission &
                    Vision</a>
                <a id="nav-history" data-toggle="tab" href="#tab-history" role="tab">Company History</a>
                <a id="nav-business" data-toggle="tab" href="#tab-business" role="tab">Business Goals</a>
                {{-- <a id="nav-team" data-toggle="tab" href="#tab-team" role="tab">Team Members</a> --}}
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="tab-mission" role="tabpanel">
                    <div class="tab-text-block left-image with-left-circle">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="block-image">
                                    <img src="frontend/img/tab-block.png" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="block-text">
                                    <h2 class="title">Our Mission</h2>
                                    <p>
                                        We're on a mission to revolutionize the way loan origination process is handled 
                                        by micro finances and SACCOs and provide valuable insights for informed decision-making.
                                        Our team of experts has extensive experience in the microfinance and SACCO industry, 
                                        and we are dedicated to providing exceptional customer service and ensuring your success. 
                                        We understand the unique challenges faced by these organizations and have developed LoanMint to address these challenges head on.
                                        <br>


                                        </br>
                                        Join us on our mission to transform the way microfinance institutions and SACCOs operate. 
                                        Let LoanMint be the solution to all your loan management needs.

                                    </p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-history" role="tabpanel">
                    <div class="tab-text-block right-image with-right-circle">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-10 order-2 order-lg-1">
                                <div class="block-text">
                                    <h2 class="title">Why we Exist</h2>
                                    <p>
                                        Loan Mint exists to close the gap that exists between loan lenders and the borrowers.
                                    </p>
                                    <ul>
                                        <li>
                                            <i class="fas fa-check"></i>
                                         To generated a comprehensive report and summary of the business performance.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                           To keep track of the issued loans and their repayment history.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            To provide a detailed report on the loan book and other financial aspects of loan companied.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10 order-1 order-lg-2">
                                <div class="block-image">
                                    <img src="frontend/img/tab-block.jpg" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-business" role="tabpanel">
                    <div class="tab-text-block left-image with-left-circle">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="block-image">
                                    <img src="frontend/img/tab-block.jpg" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="block-text">
                                    <h2 class="title">Business Goals</h2>
                                    <p>
                                       We strive to create environment that works best for loaning companies.
                                      
                                    <ul>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Increase brand awareness by 50% within the next fiscal year
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Increase website traffic by 30% within the next quarter.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            ncrease the number of loan applications by 20% within the next fiscal year.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection