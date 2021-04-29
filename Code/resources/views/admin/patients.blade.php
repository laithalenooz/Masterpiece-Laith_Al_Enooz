@extends('layout.adminlayout',  ['title' => 'Patients'])
@section('content')
	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">List of Patient</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
							<li class="breadcrumb-item active">Patient</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
										<tr>
											<th>Patient ID</th>
											<th>Patient Name</th>
											<th>Age</th>
											<th>Phone</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										@foreach($users as $user)
										<tr>
											<td>{{$user->id}}</td>
											<td>
												<h2 class="table-avatar">
													<a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{Storage::disk('s3')->url($user->avatar)}}" alt="User Image"></a>
													<a>{{$user->name}} </a>
												</h2>
											</td>
											<td>{{$user->age}}</td>
											<td>{{$user->mobile}}</td>
											<td>{{$user->created_at}}</td>
											<td>
												<div class="actions">
													<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_user{{$user->id}}">
														<i class="fe fe-trash"></i> Delete
													</a>
												</div>
												<!-- Delete Modal -->
												<div class="modal fade" id="delete_user{{$user->id}}" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-body">
																<div class="form-content p-2">
																	<h4 class="modal-title">Delete</h4>
																	<p class="mb-4">Are you sure want to {{$user->name}}?</p>
																	<a href="{{route('delete.patient', $user->id)}}" class="btn btn-primary">Yes </a>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- /Delete Modal -->
											</td>
										</tr>
										@endforeach
										</tbody>
									</table>
									<span>{{$users->links()}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /Page Wrapper -->
@endsection
