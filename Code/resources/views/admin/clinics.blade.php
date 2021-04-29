@extends('layout.adminlayout', ['title' => 'Clinics'])
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Clinics</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Clinics</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="#Add_Clinic_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Clinic Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clinics as $clinic)
                                        <tr>
                                            <td>#CL0{{$clinic->id}}</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img" src="{{Storage::disk('s3')->url(\App\Clinic::where('id', $clinic->id)->value('avatar'))}}" alt="Speciality">
                                                    </a>
                                                    <a href="">{{$clinic->name}}</a>
                                                </h2>
                                            </td>

                                            <td>{{$clinic->email}}</td>

                                            <td>{{$clinic->mobile}}</td>

                                            <td class="text-right">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_clinic_{{$clinic->id}}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-toggle="modal" href="#delete_{{$clinic->id}}" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete_{{$clinic->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <!--	<div class="modal-header">
                                                                    <h5 class="modal-title">Delete</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>-->
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Delete</h4>
                                                                    <p class="mb-4">Are you sure want to delete {{$clinic->name}}?</p>
                                                                    <a href="{{route('delete.clinic', $clinic->id)}}" type="button" class="btn btn-primary">Yes </a>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Delete Modal -->

{{--                                                <!-- Edit Details Modal -->--}}
{{--                                                <div class="modal fade" id="edit_clinic_{{$clinic->id}}" aria-hidden="true" role="dialog">--}}
{{--                                                    <div class="modal-dialog modal-dialog-centered" role="document" >--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <div class="modal-header">--}}
{{--                                                                <h5 class="modal-title">Edit Specialities</h5>--}}
{{--                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-body">--}}
{{--                                                                <form method="get" action="{{route('update.clinics', $clinic->id)}}" enctype="multipart/form-data">--}}
{{--                                                                    @csrf--}}
{{--                                                                    <div class="row form-row">--}}
{{--                                                                        <div class="col-12 col-sm-6">--}}
{{--                                                                            <div class="form-group">--}}
{{--                                                                                <label>Specialities</label>--}}
{{--                                                                                <input name="speciality" type="text" class="form-control" value="{{$speciality->speciality}}">--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-12 col-sm-6">--}}
{{--                                                                            <div class="form-group">--}}
{{--                                                                                <label>Image</label>--}}
{{--                                                                                <input name="avatar" type="file"  class="form-control">--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                    </div>--}}
{{--                                                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /Edit Details Modal -->--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <span>{{$clinics->links()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->


    <!-- Add Modal -->
    <div class="modal fade" id="Add_Clinic_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Clinic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.Clinics')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Clinic Name</label>
                                    <input name="name" type="text" class="form-control">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Clinic Email</label>
                                    <input name="email" type="email" class="form-control">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Speciality</label>
                                    <select name="speciality" class="form-control select">
                                        @foreach(\App\Speciality::all() as $speciality)
                                        <option value="{{$speciality->speciality}}">{{$speciality->speciality}}</option>
                                        @endforeach
                                    </select>
                                    @error('speciality')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Clinic Password</label>
                                    <input name="password" type="password" class="form-control">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Speciality</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->

@endsection