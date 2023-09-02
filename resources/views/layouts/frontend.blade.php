<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('newFrontEnd/fonts.googleapis.com/css2.css') }}" rel="stylesheet">
    <title>Company Name</title>

    @if (request()->routeIs('register') || request()->routeIS('login') || request()->routeIs('home') || request()->routeIs('chat') || request()->routeIs('game'))
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif
    
    <link rel="stylesheet" href="{{ asset('newFrontEnd/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('newFrontEnd/assets/css/animate.css') }}">

    <!-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('newFrontEnd/') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('newFrontEnd/') }}"> -->
    <link rel="stylesheet" href="{{ asset('newFrontEnd/assets/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('newFrontEnd/assets/owlcarousel/owl.theme.default.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="{{ asset('newFrontEnd/assets/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('newFrontEnd/assets/js/wow.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('newFrontEnd/assets/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('newFrontEnd/assets/slick/slick-theme.css') }}" />
    <script type="text/javascript" src="{{ asset('newFrontEnd/assets/slick/slick.min.js') }}"></script>
</head>

<body>
    <div class="header">
        <div class="content">
            <div class="header_flex">

                <div class="flex_left">
                    <div class="logo">
                        <!-- <a href="coinrost_default.html"><img src="{{ asset('newFrontEnd/') }}assets/img/logo.png" alt=""></a> -->
                        Company Name
                    </div>
                    <div class="h_btn_mob">
                        <img src="{{ asset('newFrontEnd/assets/img/cab_mob_btn.png') }}" alt="">
                    </div>
                </div>

                <div class="flex_right">

                    @if (!auth()->user())
                        <div class="header_links">
                            @if (!request()->routeIs('/'))
                                <a href="{{ route('/') }}">Home</a>
                            @endif
                            <a href="{{ route('about-us') }}">About</a>
                            <a href="#">Contacts</a>
                        </div>

                        <div class="btn_login">
                            <a href="{{ route('login') }}" class="">Login</a>
                            <a href="{{ route('register') }}" class="a_register">Sign up</a>
                        </div>
                    @else
                        <div class="header_links">
                            @if (auth()->user()->is_admin == 1)
                                <a href="{{ route('dashboard') }}">Dashhboard</a>
                            @endif
                            @if (!request()->routeIs('home'))
                                <a href="{{ route('/') }}">Home</a>
                            @endif
                            <a href="{{ route('chat') }}">Chat</a>
                            <a href="{{ route('game') }}">Game</a>
                            <a href="{{ route('about-us') }}">About</a>
                            <a href="#">Contacts</a>
                            <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    >Logout</a>
                        </div>
                    @endif
                </div>
            </div>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
    </div>

    @if (request()->routeIs('/'))
        <div class="home_banner" style="background-color: #2C2F33; ">

            <div class="bg_animation">
                <span class="bg_anim_ring"></span>
                <span class="bg_anim_ring"></span>
                <span class="bg_anim_ring"></span>
                <span class="bg_anim_ring"></span>
                <span class="bg_anim_ring"></span>
            </div>

            <div class="content">
                <div class="home_banner_flex">
                    <div class="flex_left">
                        <h2>Revolutionary betting investment algorithm</h2>
                        <span>Invest in betting bonds today for a high reward with a minimal risk.</span><br/>
                        <span>Investment made easy for everyone.</span><br/>
                        
                        <span>Sign up bonus 15 USDT</span>
                        <a href="{{ route('register') }}" class="btn_blue">Start Earn</a>
                    </div>

                    <div class="flex_right">
                        <div class="bg">
                            <img src="{{ asset('newFrontEnd/assets/img/home_banner_curr.png') }}" alt="">
                        </div>
                        <img src="{{ asset('newFrontEnd/assets/img/MainLogo.png') }}" class="h_tablet" alt="">
                    </div>
                </div>
            </div>
        </div>

    {{ $slot }}

    @else

        {{ $slot }}

    @endif

    @if (request()->routeIs('register') || request()->routeIS('login') || request()->routeIs('home') || request()->routeIs('chat') || request()->routeIs('game'))
        @livewireScripts
    @endif

    <script src="{{ asset('newFrontEnd/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('newFrontEnd/assets/js/script.js') }}"></script>
</body>

</html>