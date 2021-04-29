@extends('layout.publiclayout', ['title' => 'Patient Login'])
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Login <span>Doccure</span></h3>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label class="focus-label">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-focus">
                                        <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control floating @error('password') is-invalid @enderror">
                                        <label class="focus-label">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                        @enderror
                                    </div>

                                    @if (Route::has('password.request'))
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="row form-row social-login">
                                        <div class="col-6">
                                            <a href="{{route('login.facebook')}}" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('login.google')}}" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                        </div>
                                    </div>
                                    <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
