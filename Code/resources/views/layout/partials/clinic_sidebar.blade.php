<!-- Profile Sidebar -->
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{Storage::disk('s3')->url(auth()->guard('clinic')->user()->avatar)}}"
                     alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>{{auth()->guard('clinic')->user()->name}}</h3>

                <div class="patient-details">
                    <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ Request::is('clinic') ? 'active' : '' }}">
                    <a href="{{route('clinic.dashboard')}}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('clinic/profile') ? 'active' : '' }}">
                    <a href="{{route('clinic.profile')}}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
{{--                <li class="{{ Request::is('clinic/change_password') ? 'active' : '' }}">--}}
{{--                    <a href="{{route('clinic.profile')}}">--}}
{{--                        <i class="fas fa-lock"></i>--}}
{{--                        <span>Change Password</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{route('clinic.logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('clinic-logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>

                    <form id="clinic-logout-form" action="{{ route('clinic.logout') }}" method="POST"
                          class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Profile Sidebar -->