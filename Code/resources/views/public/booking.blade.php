@extends('layout.publiclayout', ['title' => 'Booking appointment'])
@section('content')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="#">{{$clinic->name}}</a></h4>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$clinic->address}}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-4 col-md-6">
									<h4 class="mb-1">{{\Carbon\Carbon::now()->format('l d F Y')}}</h4>
									<p class="text-muted">Monday</p>
								</div>
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div class="day-slot">
												<ul>
													<li value="{{\Carbon\Carbon::tomorrow()->format('l d F Y')}}">
														<span>{{\Carbon\Carbon::tomorrow()->format('l')}}</span>
														<span class="slot-date">{{\Carbon\Carbon::tomorrow()->format('d F')}} <small class="slot-year">{{\Carbon\Carbon::tomorrow()->format('Y')}}</small></span>
													</li>
													<li value="{{\Carbon\Carbon::tomorrow()->addDays(1)->format('l d F Y')}}">
														<span>{{\Carbon\Carbon::tomorrow()->addDays(1)->format('l')}}</span>
														<span class="slot-date">{{\Carbon\Carbon::tomorrow()->addDays(1)->format('d F')}} <small class="slot-year">{{\Carbon\Carbon::tomorrow()->addDays(1)->format('Y')}}</small></span>
													</li>
													<li value="{{\Carbon\Carbon::tomorrow()->addDays(2)->format('l d F Y')}}">
														<span>{{\Carbon\Carbon::tomorrow()->addDays(2)->format('l')}}</span>
														<span class="slot-date">{{\Carbon\Carbon::tomorrow()->addDays(2)->format('d F')}} <small class="slot-year">{{\Carbon\Carbon::tomorrow()->addDays(2)->format('Y')}}</small></span>
													</li>
												</ul>
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<a href="#" class="btn btn-primary submit-btn">Proceed to Pay</a>
							</div>
							<!-- /Submit Section -->
							
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->

@endsection