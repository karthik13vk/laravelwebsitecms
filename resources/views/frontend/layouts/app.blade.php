<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Style CSS -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet" />

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet" />

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/frontend/css/flipclock.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/fontawesome6.min.css') }}" rel="stylesheet" />

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Animate CSS -->
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet" />



    <!-- fancyBox helpers -->
    <link href="{{ asset('assets/frontend/css/fancybox.css') }}" rel="stylesheet" />

    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

</head>

<body>

    @include('frontend.layouts.header')
    @include('frontend.layouts.navbar')

    <main>
        <div class=" wrapper">
            @yield('content')
        </div>
    </main>

    @include('frontend.layouts.footer')
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/flipclock.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/waypoints-min.js') }}"></script>
<!-- <script src="assets/js/fontawesome6.min.js"></script> -->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script>
AOS.init({
    duration: 2000,
});
</script>
</body>

</html>
