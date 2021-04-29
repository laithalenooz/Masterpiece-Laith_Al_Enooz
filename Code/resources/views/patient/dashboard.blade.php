@extends('layout.publiclayout', ['title' => 'Profile Dashboard'])
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
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
                                    <img src="{{Storage::disk('s3')->url(auth()->user()->avatar)}}"
                                         alt="{{Storage::disk('s3')->url(auth()->user()->avatar)}}">
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
                </div>
                <!-- /Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body pt-0">

                            <!-- Tab Menu -->
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab">Appointments</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /Tab Menu -->

                            <!-- Tab Content -->
                            <div class="tab-content pt-0">

                                <!-- Appointment Tab -->
                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Clinic Name</th>
                                                        <th>Appt Date</th>
                                                        <th>Clinic Address</th>
                                                        <th>Clinic Mobile</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(\App\Appointment::where('user_id', auth()->id())->with('clinic')->paginate(10) as $appointment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="{{route('single.clinic', $appointment->id)}}"
                                                                   class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                         src="{{Storage::disk('s3')->url($appointment->clinic->avatar)}}"
                                                                         alt="User Image">
                                                                </a>
                                                                <a href="{{route('single.clinic', $appointment->id)}}">{{$appointment->clinic->name}} <span>{{$appointment->clinic->speciality}}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$appointment->date}} <span class="d-block text-info">{{$appointment->time}}</span>
                                                        </td>
                                                        <td>{{$appointment->clinic->address}}</td>
                                                        <td>{{$appointment->clinic->mobile}}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Appointment Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection