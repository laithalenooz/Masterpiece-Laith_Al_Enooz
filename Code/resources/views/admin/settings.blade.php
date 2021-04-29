@extends('layout.adminlayout',  ['title' => 'Settings'])
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">General Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-12">

                    <!-- General -->

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Website Name</label>
                                    <input type="text" name="website_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Website Logo</label>
                                    <input type="file" name="website_logo" class="form-control">
                                    <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                                </div>
                                <div class="form-group">
                                    <label>Website Footer Logo</label>
                                    <input type="file" name="website_logo_footer" class="form-control">
                                    <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Favicon</label>
                                    <input type="file" name="website_favicon" class="form-control">
                                    <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                                    <small class="text-secondary">Accepted formats : only png and ico</small>
                                </div>

                                <button type="submit" style="width: 10rem" class="btn btn-rounded btn-primary btn-block">Update</button>

                            </form>
                        </div>
                    </div>

                    <!-- /General -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection