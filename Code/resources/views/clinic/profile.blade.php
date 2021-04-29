@extends('layout.cliniclayout', ['title', 'Profile Settings'])
@section('content')
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8,
            });
        }
    </script>

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
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    @include('layout.partials.clinic_sidebar')

                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{Storage::disk('s3')->url(auth()->guard('clinic')->user()->avatar)}}"
                                                     alt="{{Storage::disk('s3')->url(auth()->guard('clinic')->user()->avatar)}}">
                                            </div>
                                            <form action="{{route('clinic.updateAvatar')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                @error('avatar')
                                                <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                                @enderror
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">

                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input name="avatar" type="file" class="upload">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                                        size of 2MB</small>
                                                </div>
                                                <button type="submit" class="btn btn-primary submit-btn float-right">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <form action="{{route('clinic.updateInformation', auth()->guard('clinic')->user())}}"
                                                  method="post" class="row">
                                                @csrf
                                                @method('PUT')
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Clinic Name <span class="text-danger">*</span></label>
                                                        <input name="name" value="{{auth('clinic')->user()->name}}"
                                                               type="text"
                                                               class="form-control">
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input name="email" value="{{auth('clinic')->user()->email}}"
                                                               type="email"
                                                               class="form-control">
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input name="mobile" value="{{auth('clinic')->user()->mobile}}"
                                                               type="text"
                                                               class="form-control">
                                                    </div>
                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input name="address"
                                                               value="{{auth('clinic')->user()->address}}"
                                                               type="text" class="form-control">
                                                    </div>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-1 ml-3">
                                                    <button type="submit"
                                                            class="btn btn-primary submit-btn float-right">Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <!-- About Me -->
                    <div class="card">
                        <div class="card-body">
                            @if(!auth('clinic')->user()->about)
                                <form action="{{route('clinic.updateAbout')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="card-title">About Me</h4>
                                    <div class="form-group mb-0">
                                        <label>About</label>
                                        <textarea name="about" class="form-control" rows="5"></textarea>
                                    </div>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                    <div class="col-md-1 mt-3">
                                        <button type="submit" class="btn btn-primary submit-btn float-right">Update
                                        </button>
                                    </div>
                                </form>
                            @else
                                <form action="{{route('clinic.deleteAbout')}}" method="post">
                                    @csrf
                                    {!! auth('clinic')->user()->about !!}
                                    <input type="submit" class="btn btn-danger submit-btn float-right" value="Delete">
                                </form>
                            @endif
                        </div>
                    </div>
                    <!-- /About Me -->

                    <!-- Clinic Location -->
                    <form action="{{route('update_location')}}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Clinic Location</h4>
                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lat</label>
                                            <input name="lat" value="{{auth('clinic')->user()->lat}}"
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                        @error('lat')
                                        <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lng</label>
                                            <input name="lng"
                                                   value="{{auth('clinic')->user()->lng}}"
                                                   type="text" class="form-control">
                                        </div>
                                        @error('lng')
                                        <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="submit-section submit-btn-bottom">
                                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /Clinic Location -->
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->

    <script>
        CKEDITOR.replace('about');
    </script>

@endsection