<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin_assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/font-awesome.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/feathericon.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">

<!--[if lt IE 9]>
    <script src="{{asset('admin_assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="error-page">

@yield('content')

<!-- jQuery -->
<script src="{{asset('admin_assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('admin_assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('admin_assets/js/script.js')}}"></script>

</body>
</html>