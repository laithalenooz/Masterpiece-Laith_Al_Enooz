<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name') }}</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="account-page">
@include('cookieConsent::index')
@include('sweet::alert')

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
                </a>
                <a href="/" class="navbar-brand logo">
                    <img src="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_logo'))}}"
                         class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="/" class="menu-logo">
                        <img src="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_logo'))}}"
                             class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="has-submenu active">
                        <a href="/">Home</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{route('public.clinics')}}" target="_blank">Clinics</a>
                    </li>
                    @auth('web')
                        <li class="login-link">
                        <a class="dropdown-item" href="{{route('user.profile')}}">Profile Settings</a>
                        </li>
                        <li class="login-link">
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('user-logout-form').submit();">Logout</a>
                        </li>
                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    @else
                    <li class="login-link">
                        <a href="{{ route('login') }}">Login / Signup</a>
                    </li>
                    @endauth
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item contact-item">
                    <div class="header-contact-img">
                        <i class="far fa-hospital"></i>
                    </div>
                    <div class="header-contact-detail">
                        <p class="contact-header">Contact</p>
                        <p class="contact-info-header"> +962 77 777 7777</p>
                    </div>
                </li>
            @auth('web')
                <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle"
                                         src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}" width="31"
                                         alt="Darren Elder">
								</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}" alt="User Image"
                                         class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{auth()->user()->name}}</h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>

                            @auth('clinic')
                            <!-- Clinic Menu -->
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <img class="rounded-circle" src="{{Storage::disk('s3')->url(auth()->guard('clinic')->user()->avatar)}}" width="31" alt="Darren Elder">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="{{Storage::disk('s3')->url(auth()->guard('clinic')->user()->avatar)}}" alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6>{{auth()->user()->name}}</h6>
                                        <p class="text-muted mb-0">Patient</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{route('clinic.profile')}}">Profile Settings</a>
                                <a class="dropdown-item" href="{{ route('clinic.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('clinic-logout-form').submit();">Logout</a>

                                <form id="clinic-logout-form" action="{{ route('clinic.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- /Clinic Menu -->
                            @elseauth('web')
                            <a class="dropdown-item" href="{{route('user.profile')}}">Profile Settings</a>
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('user-logout-form').submit();">Logout</a>

                            <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                            @endauth
                        </div>
                    </li>
                    <!-- /User Menu -->
                @else
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('login') }}">login / Signup </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>
    <!-- /Header -->
