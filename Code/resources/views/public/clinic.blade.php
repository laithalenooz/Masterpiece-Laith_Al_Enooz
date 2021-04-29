@extends('layout.publiclayout', ['title' => $clinic->name])
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$clinic->name}}</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{$clinic->name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{Storage::disk('s3')->url($clinic->avatar)}}" class="img-fluid"
                                     alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">Clinic Name</h4>
                                <p class="doc-speciality">Clinic Speciality</p>
                                <p class="doc-department"><img
                                            src="{{asset('assets/img/specialities/specialities-05.png')}}"
                                            class="img-fluid" alt="Speciality">Clinic Speciality</p>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$clinic->address}} -
                                        <a href="javascript:void(0);">Get Directions</a></p>
                                    <ul class="clinic-gallery">
                                        <li>
                                            <a href="{{asset('assets/img/features/feature-01.jpg')}}"
                                               data-fancybox="gallery">
                                                <img src="{{asset('assets/img/features/feature-01.jpg')}}"
                                                     alt="Feature">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{asset('assets/img/features/feature-02.jpg')}}"
                                               data-fancybox="gallery">
                                                <img src="{{asset('assets/img/features/feature-02.jpg')}}"
                                                     alt="Feature Image">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{asset('assets/img/features/feature-03.jpg')}}"
                                               data-fancybox="gallery">
                                                <img src="{{asset('assets/img/features/feature-03.jpg')}}"
                                                     alt="Feature">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{asset('assets/img/features/feature-04.jpg')}}"
                                               data-fancybox="gallery">
                                                <img src="{{asset('assets/img/features/feature-04.jpg')}}"
                                                     alt="Feature">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clinic-services">
                                    @foreach(App\Services::all() as $service)
                                        <span>{{$service->service}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <h4>Book Appointment </h4> <p><strong>Today is</strong> {{\Carbon\Carbon::now()->format('l d F Y')}}</p>

                            <form class="needs-validation" novalidate="" action="{{route('public.book', $clinic->id)}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom01">Pick a Date</label>
                                        <input type="date" class="form-control" id="validationCustom01" name="date" required="">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please pick a date.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12 mt-2">
                                        <label for="validationCustom01">Pick a Time</label>
                                        <input type="time" class="form-control" id="validationCustom01" name="time" required="">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please pick a time.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-2 btn-block" type="submit">Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Us</h4>
                                        {!! \App\Clinic::where('id', $clinic->id)->first()->about !!}
                                    </div>
                                    <!-- /About Details -->

                                    <!-- Services List -->
                                    <div class="service-list">
                                        <h4>Services</h4>
                                        <ul class="clearfix">
                                            @foreach(App\Services::all() as $service)
                                                <li>{{$service->service}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /Services List -->

                                    <!-- Specializations List -->
                                    <div class="service-list">
                                        <h4>Specializations</h4>
                                        <ul class="clearfix">
                                            @foreach(App\Specialization::all() as $specialization)
                                                <li>{{$specialization->specialization}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /Specializations List -->

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            @comments(['model' => $clinic])

                        </div>
                        <!-- /Reviews Content -->

                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>
    <!-- /Page Content -->

@endsection