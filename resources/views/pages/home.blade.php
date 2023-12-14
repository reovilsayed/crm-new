@extends('layouts.front.app')
@section('content')
   
    <!--====== SERVICES PART1 START ======-->
    
    <section id="why" class="services-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Speed up your convertion rate for your clients and increase customer satisfaction</h3>
                        <p class="text">Our one-in-all solution makes it <b>easy</b> to manage all clients in one platform.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-1 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that <b>convert</b> them into paying clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-2 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.4s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">SoMe</a></h4>
                            <p class="text">Schedule all social media content and <b>target</b> each post against your leads spesific needs.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-3 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Newsletter</a></h4>
                            <p class="text">Target your new leads with the automation tool that <b>integrate</b> directly to mailchimp.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">AI Bot</a></h4>
                            <p class="text">Use our snippet AI bot in your own website, and get all the <b>data back</b> in to our CRM platform.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
				<div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-5 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Project tool</a></h4>
                            <p class="text">Keep track on the client projects and use time tracker for best <b>ROI</B>.</p>
                        </div>
                    </div> <!-- single services -->
				</div>
				<div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-6 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Contracts</a></h4>
                            <p class="text">Save your ready made <b>contracts</b> to speed up the process with your leads.</p>
                        </div>
                    </div> <!-- single services -->
				</div>
				<div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-7 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Chat & support </a></h4>
                            <p class="text">Interact thru different AI channels and provide best customer <b>experience</b>.</p>
                        </div>
                    </div> <!-- single services -->
				</div>
				<div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-8 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Analytics</a></h4>
                            <p class="text">Our platform give you all the data you <b>need</b> for follow up your leads.</p>
                        </div>
                    </div> <!-- single services -->
				</div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART1 ENDS ======-->
	
	
    
    <!--====== ABOUT PART START ======-->
    
    <section id="about" class="about-area pt-70 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="about-shape"></div>
                        <img class="app" src="{{asset('frontend-assets/images/about-app.png')}}" alt="app">
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h3 class="title"><span>Get started for free!</span><br> CRM, SoMe and newsletter in ONE Platform</h3>
                            <p class="text">Manage your leads, your social media and your newsletters from ONE Platform.</p>
                        </div> <!-- section title -->
                        <a href="/login" rel="nofollow" class="main-btn">Get started for free!</a>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->
    
    
    <!--====== DOWNLOAD PART START ======-->
    
    <section id="download" class="download-area pt-70 pb-40">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="download-image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <img class="image" src="{{asset('frontend-assets/images/download-app.png')}}" alt="download">
                        
                        <div class="download-shape-1"></div>
                        <div class="download-shape-2">
                            <img class="svg" src="{{asset('frontend-assets/images/download-shape.svg')}}" alt="shape">
                        </div>
                    </div> <!-- download image -->
                </div>
                <div class="col-lg-6">
                    <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <h3 class="download-title">What are you waiting for?</h3>
                        <p class="text">Test our free version that are full specked of functions. <b>No credit card required</b>.</p>
                        <ul>
                            <li><a class="app-store" href="#"><img src="{{asset('frontend-assets/images/app-store.png')}}" alt="store"></a></li>
                            <li><a class="play-store" href="#"><img src="{{asset('frontend-assets/images/play-store.png')}}" alt="store"></a></li>
							<a href="/login" rel="nofollow" class="main-btn">Get started for free!</a>
                        </ul>
                    </div> <!-- download image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== DOWNLOAD PART ENDS ======-->
    
    <!--====== PART START ======-->

@endsection