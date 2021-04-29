@extends('layout.publiclayout')
@section('content')


    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-lg-12 order-md-last order-sm-last order-last map-left">

                    <div class="row align-items-center mb-4">
                        <div class="col-md-6 col">
                            <h4>{{count(\App\Clinic::all())}} Clinics found</h4>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($clinics as $clinic)
                        <div class="col-sm-3 col-md-3 col-xl-3">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="#">
                                        <img class="img-fluid" alt="User Image" src="{{Storage::disk('s3')->url($clinic->avatar)}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="#">{{$clinic->name}}</a>
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
                                            <i class="fas fa-map-marker-alt"></i> Florida, USA
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                        </li>
                                        <li>
                                            <i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-8">
                                            <a href="{{route('single.clinic', $clinic->id)}}" class="btn view-btn">View Profile & Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="load-more text-center">
                        <span>{{$clinics->links()}}</span>
                    </div>
                </div>
            </div>
            <!-- /row-->

        </div>

    </div>
    <!-- /Page Content -->


@endsection