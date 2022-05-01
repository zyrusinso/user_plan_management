<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>User Plan Management</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/animate-css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/jquery-ui/jquery-ui.css') }}"> 
       
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    </head>
    <body>
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<a href="mailto:support@company.com">support@company.com</a>
						<a href="#">Welcome to Company name</a>
					</div>
					<div class="float-right">
						<ul class="header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
           		</div>	
           	</div>	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light main_box">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<!-- <a class="navbar-brand logo_h" href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a> -->
						<h2>Company Name</h2>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							@if (!auth()->user())
                                <ul class="nav navbar-nav menu_nav ml-auto">
                                    <li class="nav-item {{ (request()->routeIs('/') || request()->routeIs('/home'))? 'active' : ''}}"><a class="nav-link" href="/">Home</a></li> 
                                    <li class="nav-item {{ request()->routeIs('login')? 'active' : ''}}"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li> 
                                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                </ul>
                            @else
                                <ul class="nav navbar-nav menu_nav ml-auto">
                                    <li class="nav-item {{ (request()->routeIs('/') || request()->routeIs('home'))? 'active' : ''}}"><a class="nav-link" href="/">Home</a></li> 
                                    @if (auth()->user()->is_admin == 1)
                                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                    <li class="nav-item {{ request()->routeIs('settings')? 'active' : '' }}"><a class="nav-link " href="{{ route('settings') }}">Settings</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                        >Logout</a></li>
                                </ul>
                            @endif
						</div> 
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
					</div>
            	</nav>
            </div>
        </header>
        
        <!-- here's the content -->
        {{ $slot }}


        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget f_social_wd">
                            <h6 class="footer_title">Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="f_social">
                            	<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>						
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/popper.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/stellar.js') }}"></script>
        <script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{ asset('frontend/js/mail-script.js') }}"></script>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>