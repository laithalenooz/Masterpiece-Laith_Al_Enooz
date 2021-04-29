@extends('layout.publiclayout', ['title' => 'Profile Settings'])
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Profile Settings</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}" alt="{{Storage::disk('s3')->url(auth()->user()->avatar)}}">
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
                                    <li>
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
                                    <li>
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
                </div>
                <!-- /Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">

                            <!-- Profile Settings Form -->
                            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}" alt="User Image">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input name="avatar" type="file" class="upload">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input name="name" type="text" class="form-control" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input name="email" type="email" class="form-control" value="{{auth()->user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="cal-icon">
                                                <input name="dob" type="date" class="form-control datetimepicker" value="{{auth()->user()->dob}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select name="bloodType" class="form-control select">
                                                <option>{{auth()->user()->bloodType}}</option>
                                                <option value="A-">A-</option>
                                                <option value="A+">A+</option>
                                                <option value="B-">B-</option>
                                                <option value="B+">B+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input name="mobile" type="text" value="{{auth()->user()->mobile}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" type="text" class="form-control" value="{{auth()->user()->address}}">
                                        </div>
                                    </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                </div>
                                </div>
                            </form>
                            <!-- /Profile Settings Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

@endsection