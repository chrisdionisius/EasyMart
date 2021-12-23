<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{URL::asset('user/img/logoeasy.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Easy Mart</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="{{URL::asset('user/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('user/css/ion.rangeSlider.skinFlat.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::asset('user/css/main.css')}}">
</head>

<body>

    <!-- Start Header Area -->
    @include('user.partials.header')
    <!-- End Header Area -->

    <!-- start features Area -->
    @yield('content')
    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('user.partials.footer')
    <!-- End footer Area -->

    <script src="{{ URL::asset('user/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('user/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.sticky.js') }}"></script>
    <script src="{{ URL::asset('user/js/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/countdown.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ URL::asset('user/js/gmaps.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/main.js') }}"></script>
    <script>
    $(".active-banner-slider").owlCarousel({
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        loop: true,
        nav: true,
        navText: [
            "<img src='{{URL::asset('user/img/banner/prev.png')}}'>",
            "<img src='{{URL::asset('user/img/banner/next.png')}}'>",
        ],
        dots: false,
    });

    /*=================================
    Javascript for product area carousel
    ==================================*/
    $(".active-product-area").owlCarousel({
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        loop: true,
        nav: true,
        navText: [
            "<img src='{{URL::asset('user/img/product/prev.png')}}'>",
            "<img src='{{URL::asset('user/img/product/next.png')}}'>",
        ],
        dots: false,
    });
    </script>
</body>

</html>