@extends('layout.adminlayout',  ['title' => 'Appointments'])
@section('content')
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Blank Page</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Dashboard</a></li>
									<li class="breadcrumb-item active">Blank Page</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
											<tr>
												<th>Clinic Name</th>
												<th>Speciality</th>
												<th>Patient Name</th>
												<th>Appointment Date & Time</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											@foreach($appointments as $appointment)
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{Storage::disk('s3')->url($appointment->clinic->avatar)}}" alt="User Image"></a>
														<a href="">{{$appointment->clinic->name}}</a>
													</h2>
												</td>
												<td>{{$appointment->clinic->speciality}}</td>
												<td>
													<h2 class="table-avatar">
														<a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{Storage::disk('s3')->url($appointment->user->avatar)}}" alt="User Image"></a>
														<a>{{$appointment->user->name}}</a>
													</h2>
												</td>
												<td>{{$appointment->date}} <span class="text-primary d-block">{{$appointment->time}}</span></td>
												<td class="text-right">
													<div class="actions">
														<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
															<i class="fe fe-pencil"></i> Edit
														</a>
														<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
															<i class="fe fe-trash"></i> Delete
														</a>
													</div>
												</td>
												<!-- Edit Details Modal -->
												<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit Specialities</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form>
																	<div class="row form-row">
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Specialities</label>
																				<input type="text" class="form-control" value="Cardiology">
																			</div>
																		</div>
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Image</label>
																				<input type="file"  class="form-control">
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
												<!-- Delete Modal -->
												<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-body">
																<div class="form-content p-2">
																	<h4 class="modal-title">Delete</h4>
																	<p class="mb-4">Are you sure want to delete?</p>
																	<a href="" class="btn btn-primary">Yes </a>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- /Delete Modal -->
											</tr>
											@endforeach
											</tbody>
										</table>
										<span>{{$appointments->links()}}</span>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->

@endsection
