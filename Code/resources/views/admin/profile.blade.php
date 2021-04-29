@extends('layout.adminlayout',  ['title' => 'Profile'])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="{{Storage::disk('s3')->url(auth()->guard('admin')->user()->avatar)}}" src="{{Storage::disk('s3')->url(auth()->guard('admin')->user()->avatar)}}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{auth()->guard('admin')->user()->name}}</h4>
                            <h6 class="text-muted">{{auth()->guard('admin')->user()->email}}</h6>
                        </div>

                        <div class="col-auto profile-btn">
                            <form action="{{route('admin.image.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" name="avatar" class="upload">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                                <button type="submit" style="width: 10rem" class="btn btn-primary btn-block">Update Image</button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{auth()->guard('admin')->user()->name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{auth()->guard('admin')->user()->email}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.details.update')}}">
                                                    <div class="row form-row">
                                                        @csrf
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{auth()->guard('admin')->user()->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control" value="{{auth()->guard('admin')->user()->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{route('admin.password.change')}}" method="post">
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
                                                <input name="new-password" type="password" class="form-control">
                                                @error('new-password')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input name="new-password-confirmation" type="password" class="form-control">
                                                @error('new-password-confirmation')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->

@endsection