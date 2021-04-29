@extends('layout.adminlayout',  ['title' => 'Dashboard'])
@section('content')
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Dashboard</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3>{{\App\Clinic::all()->count()}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Clinics</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3>{{\App\User::all()->count()}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">

										<h6 class="text-muted">Patients</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3>{{\App\Appointment::all()->count()}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">

										<h6 class="text-muted">Appointment</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>{{\App\Appointment::all()->count() + \App\User::all()->count() + \App\Clinic::all()->count()}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">

										<h6 class="text-muted">Total Records</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">

							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Appointments</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->

						</div>
						<div class="col-md-12 col-lg-6">

							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->

						</div>
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">

							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Clinics List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
											<tr>
												<th>Clinic Name</th>
												<th>Address</th>
												<th>Email</th>
												<th>Total Appointments</th>
											</tr>
											</thead>
											<tbody>
											@foreach(\App\Clinic::with('appointments')->orderByDesc('created_at')->paginate(5) as $clinic)
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{Storage::disk('s3')->url($clinic->avatar)}}" alt="User Image"></a>
														<a href="profile">{{$clinic->name}}</a>
													</h2>
												</td>
												<td>{{$clinic->address}}</td>
												<td>{{$clinic->email}}</td>
												<td>{{\App\Appointment::where('clinic_id', $clinic->id)->get()->count()}}</td>
											</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->

						</div>
						<div class="col-md-6 d-flex">

							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
											<tr>
												<th>Patient Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Total Visits</th>
											</tr>
											</thead>
											<tbody>
											@foreach(\App\User::orderByDesc('created_at')->paginate(5) as $user)
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{Storage::disk('s3')->url($user->avatar)}}" alt="User Image"></a>
														<a href="profile">{{$user->name}} </a>
													</h2>
												</td>
												<td>{{$user->phone}}</td>
												<td>{{$user->email}}</td>
												<td class="text-right">{{\App\Appointment::where('user_id', $user->id)->get()->count()}}</td>
											</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->

						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->


@endsection
