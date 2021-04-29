@extends('layout.publiclayout', ['title' => 'Welcome'])
@section('content')
			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
						</div>

						<!-- Search -->
						<div class="search-box">
							<form action="{{route('search')}}">
								<div class="form-group search-location">
									<input type="text" class="form-control" placeholder="Search Location">
									<span class="form-text">Based on your Location</span>
								</div>
								<div class="form-group search-info">
									<input type="text" name="query" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
									<span class="form-text">Ex : Dental or Sugar Check up etc</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn mt-0"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->

					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<section class="section home-tile-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-9 m-auto">
							<div class="section-header text-center">
								<h2>What are you looking for?</h2>
							</div>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="{{asset('assets/img/clinics/clinic-banner.svg')}}" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Visit a Clinic</h3>
												<a href="{{route('public.clinics')}}" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="{{asset('assets/img/clinics/pharmcy-banner.svg')}}" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Find a Pharmacy</h3>
												<a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Coming Soon</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="{{asset('assets/img/clinics/pharmcy-banner.svg')}}" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
											<h3 class="card-title mb-0">Find a Lab</h3>
												<a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Coming Soon</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Clinic and Specialities</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Urology</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Neurology</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Orthopedic</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Cardiologist</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Dentist</p>
								</div>
								<!-- /Slider Item -->

							</div>
							<!-- /Slider -->

						</div>
					</div>
				</div>
			</section>
			<!-- Clinic and Specialities -->

			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book in a Clinic</h2>
								<p>Lorem Ipsum is simply dummy text </p>
							</div>
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>
								<a href="javascript:;">Read More..</a>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
								@foreach(\App\Clinic::all() as $clinic)
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="#">
											<img class="img-fluid" alt="User Image" src="{{Storage::disk('s3')->url(\App\Clinic::where('id', $clinic->id)->value('avatar'))}}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="#">{{\App\Clinic::where('id', $clinic->id)->value('name')}}</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> {{\App\Clinic::where('id', $clinic->id)->value('address')}}
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $300 - $1000
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-8">
												<a href="{{route('single.clinic', $clinic->id)}}" class="btn view-btn">View Profile & Book</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
								@endforeach

							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->

		   <!-- Availabe Features -->
		   <section class="section section-features">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-md-5 features-img">
							<img src="{{asset('assets/img/clinics/clinic-banner.svg')}}" class="img-fluid" alt="Feature">
						</div>
						<div class="col-md-7">
							<div class="section-header">
								<h2 class="mt-2">Availabe Features in Our Clinic</h2>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
							</div>
							<div class="features-slider slider">
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-1.jpg" class="img-fluid" alt="Feature">
									<p>Patient Ward</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-2.jpg" class="img-fluid" alt="Feature">
									<p>Test Room</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-3.jpg" class="img-fluid" alt="Feature">
									<p>ICU</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-5.jpg" class="img-fluid" alt="Feature">
									<p>Operation</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-6.jpg" class="img-fluid" alt="Feature">
									<p>Medical</p>
								</div>
								<!-- /Slider Item -->
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Availabe Features -->

			<!-- Blog Section -->
		   <section class="section section-blogs">
				<div class="container-fluid">

					<!-- Section Header -->
					<div class="section-header text-center">
						<h2>Blogs and News</h2>
						<small>Coming Soon!</small>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<!-- /Section Header -->

{{--					<div class="row blog-grid-row">--}}
{{--						<div class="col-md-6 col-lg-3 col-sm-12">--}}

{{--							<!-- Blog Post -->--}}
{{--							<div class="blog grid-blog">--}}
{{--								<div class="blog-image">--}}
{{--									<a href="#"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image"></a>--}}
{{--								</div>--}}
{{--								<div class="blog-content">--}}
{{--									<ul class="entry-meta meta-item">--}}
{{--										<li>--}}
{{--											<div class="post-author">--}}
{{--												<a href="#"><img src="assets/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>Dr. Ruby Perrin</span></a>--}}
{{--											</div>--}}
{{--										</li>--}}
{{--										<li><i class="far fa-clock"></i> 4 Dec 2019</li>--}}
{{--									</ul>--}}
{{--									<h3 class="blog-title"><a href="#">Doccure – Making your clinic painless visit?</a></h3>--}}
{{--									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<!-- /Blog Post -->--}}

{{--						</div>--}}
{{--						<div class="col-md-6 col-lg-3 col-sm-12">--}}

{{--							<!-- Blog Post -->--}}
{{--							<div class="blog grid-blog">--}}
{{--								<div class="blog-image">--}}
{{--									<a href="#"><img class="img-fluid" src="assets/img/blog/blog-02.jpg" alt="Post Image"></a>--}}
{{--								</div>--}}
{{--								<div class="blog-content">--}}
{{--									<ul class="entry-meta meta-item">--}}
{{--										<li>--}}
{{--											<div class="post-author">--}}
{{--												<a href="#"><img src="assets/img/doctors/doctor-thumb-02.jpg" alt="Post Author"> <span>Dr. Darren Elder</span></a>--}}
{{--											</div>--}}
{{--										</li>--}}
{{--										<li><i class="far fa-clock"></i> 3 Dec 2019</li>--}}
{{--									</ul>--}}
{{--									<h3 class="blog-title"><a href="#">What are the benefits of Online Doctor Booking?</a></h3>--}}
{{--									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<!-- /Blog Post -->--}}

{{--						</div>--}}
{{--						<div class="col-md-6 col-lg-3 col-sm-12">--}}

{{--							<!-- Blog Post -->--}}
{{--							<div class="blog grid-blog">--}}
{{--								<div class="blog-image">--}}
{{--									<a href="#"><img class="img-fluid" src="assets/img/blog/blog-03.jpg" alt="Post Image"></a>--}}
{{--								</div>--}}
{{--								<div class="blog-content">--}}
{{--									<ul class="entry-meta meta-item">--}}
{{--										<li>--}}
{{--											<div class="post-author">--}}
{{--												<a href="#"><img src="assets/img/doctors/doctor-thumb-03.jpg" alt="Post Author"> <span>Dr. Deborah Angel</span></a>--}}
{{--											</div>--}}
{{--										</li>--}}
{{--										<li><i class="far fa-clock"></i> 3 Dec 2019</li>--}}
{{--									</ul>--}}
{{--									<h3 class="blog-title"><a href="#">Benefits of consulting with an Online Doctor</a></h3>--}}
{{--									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<!-- /Blog Post -->--}}

{{--						</div>--}}
{{--						<div class="col-md-6 col-lg-3 col-sm-12">--}}

{{--							<!-- Blog Post -->--}}
{{--							<div class="blog grid-blog">--}}
{{--								<div class="blog-image">--}}
{{--									<a href="#"><img class="img-fluid" src="assets/img/blog/blog-04.jpg" alt="Post Image"></a>--}}
{{--								</div>--}}
{{--								<div class="blog-content">--}}
{{--									<ul class="entry-meta meta-item">--}}
{{--										<li>--}}
{{--											<div class="post-author">--}}
{{--												<a href="#"><img src="assets/img/doctors/doctor-thumb-04.jpg" alt="Post Author"> <span>Dr. Sofia Brient</span></a>--}}
{{--											</div>--}}
{{--										</li>--}}
{{--										<li><i class="far fa-clock"></i> 2 Dec 2019</li>--}}
{{--									</ul>--}}
{{--									<h3 class="blog-title"><a href="#">5 Great reasons to use an Online Doctor</a></h3>--}}
{{--									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<!-- /Blog Post -->--}}

{{--						</div>--}}
{{--					</div>--}}
{{--					<div class="view-all text-center">--}}
{{--						<a href="#" class="btn btn-primary">View All</a>--}}
{{--					</div>--}}
				</div>
			</section>
			<!-- /Blog Section -->


@endsection
