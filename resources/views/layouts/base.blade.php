<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('img/favicon.png') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="hold-transition" >
    <div class="wrapper">

        <!-- Preloader -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav nav_hide_xs">
                <li class="nav-item burger_btn">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-md-none">
                <li class="nav-item burger_btn">
                    <h2>Company Name</h2>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto d-block d-md-none">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-2x"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
            <a href="/" class="d-flex justify-content-center" style="text-decoration: none !important">
                <h2 class="m-2">Company name</h2>
                <hr/>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">Main</li>

                        <li class="nav-item">
                            <a href="{{ route('/') }}" class="nav-link">
                                <i class="fa fa-arrow-left nav-icon"></i>
                                <p>Go to Homepage</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard')? 'active': '' }}">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">Users</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.user') }}" class="nav-link {{ request()->routeIs('dashboard.user')? 'active': '' }}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>

                        <li class="nav-header">Settings</li>
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}" class="nav-link {{ request()->routeIs('profile.show')? 'active': '' }}">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>User Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                                >
                                                <i class="fas fa-sign-out-alt nav-icon"></i>Logout</a>
                        </li>
                    </ul>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App-->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    @stack('modals')

    @livewireScripts

    @stack('scripts')
</body>
</html>