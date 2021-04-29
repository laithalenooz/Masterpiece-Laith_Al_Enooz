@extends('layout.publiclayout', ['title' => 'Change Password'])
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Change Password</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{auth()->user()->name}}</h3>
                                    <div class="patient-details">
                                        <h5><i class="fas fa-birthday-cake"></i> {{auth()->user()->dob}}, {{auth()->user()->age}} years</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{auth()->user()->address}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="{{ Request::is('profile/dashboard') ? 'active' : '' }}">
                                        <a href="{{route('user.dashboard')}}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('profile') ? 'active' : '' }}">
                                        <a href="{{route('user.profile')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('profile/change_password') ? 'active' : '' }}">
                                        <a href="{{route('changePassword.page')}}">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('profile-logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="profile-logout-form" action="{{ route('user.logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">

                                    <!-- Change Password Form -->
                                    <form method="post" action="{{route('updatePatientPassword')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input name="password" type="password" class="form-control">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input name="new_password" type="password" class="form-control">
                                            @error('new_password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input name="confirm_new_password" type="password" class="form-control">
                                            @error('confirm_new_password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="submit-section">
                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- /Change Password Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

@endsection