<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    {{--    <title>{{\App\Settings::where('id', 1)->value('website_name')}} - Dashboard</title>--}}
    <title> @isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
          href="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_favicon'))}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/font-awesome.min.css')}}">
{{--    @if(Route::is(['blog','blog-details','add-blog','edit-blog','pending-blog']))--}}
{{--        <link rel="stylesheet" href="{{asset('admin_assets/plugins/fontawesome/css/all.min.css')}}">--}}
{{--@endif--}}
<!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/morris/morris.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/select2.min.css')}}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/datatables/datatables.min.css')}}">

    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

@include('sweet::alert')

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{route('admin.dashboard')}}" class="logo">
                <img src="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_logo'))}}"
                     alt="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_logo'))}}">
            </a>
            <a href="{{route('admin.dashboard')}}" class="logo logo-small">
                <img src="{{asset('admin_assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">

            <!-- Notifications -->
            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="assets/img/doctors/doctor-thumb-01.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span>
                                                Schedule <span class="noti-title">her appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="assets/img/patients/patient1.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Charlene Reed</span> has
                                                booked her appointment to <span
                                                        class="noti-title">Dr. Ruby Perrin</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="assets/img/patients/patient2.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent
                                                a amount of $210 for his <span class="noti-title">appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="assets/img/patients/patient3.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a
                                                message <span class="noti-title"> to his doctor</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <!-- User Menu -->
            @auth('admin')

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"
                                                    src="{{Storage::disk('s3')->url(Auth::guard('admin')->user()->avatar)}}"
                                                    alt="Profile Image"
                                                    width="31"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{Storage::disk('s3')->url(Auth::guard('admin')->user()->avatar)}}"
                                     alt="{{Storage::disk('s3')->url(Auth::guard('admin')->user()->avatar)}}"
                                     class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{Auth::guard('admin')->user()->name}}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('admin.profile')}}">My Profile</a>
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('admin-logout-form').submit();">Logout</a>

                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
        @endauth
        <!-- /User Menu -->

        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="{{ Request::is('admin/') ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{ Request::is('admin/appointments') ? 'active' : '' }}">
                        <a href="{{route('admin.appointment')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                    </li>
                    <li class="{{ Request::is('admin/specialities') ? 'active' : '' }}">
                        <a href="{{route('admin.specialities')}}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                    </li>
                    <li class="{{ Request::is('admin/clinics') ? 'active' : '' }}">
                        <a href="{{route('admin.clinics')}}"><i class="fe fe-user-plus"></i> <span>Clinics</span></a>
                    </li>
                    <li class="{{ Request::is('admin/patients') ? 'active' : '' }}">
                        <a href="{{route('admin.patients')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
                    </li>
                    <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                        <a href="{{route('admin.profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                    </li>
                    <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                        <a href="{{route('admin.settings')}}"><i class="fe fe-vector"></i> <span>Website Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
