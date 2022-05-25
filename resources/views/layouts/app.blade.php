<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    <!-- favicon -->
    <link rel=icon href="{{asset('nextpage-lite/assets/img/favicon.png" sizes="20x20" type="image/png')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('nextpage-lite/assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('nextpage-lite/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('nextpage-lite/assets/css/responsive.css')}}">
    @yield('custom_css')
</head>
<body>


<!-- header start -->
<div class="navbar-area">
    <!-- topbar end-->
    @include('partials.topbar')
    <!-- topbar end-->

    <!-- adbar end-->
    <!-- adbar end-->
    @include('partials.navbar')
    <!-- navbar start -->

</div>
<!-- navbar end -->


@yield('content')

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- all plugins here -->
<script src="{{asset('nextpage-lite/assets/js/vendor.js')}}"></script>
<!-- main js  -->
<script src="{{asset('nextpage-lite/assets/js/main.js')}}"></script>
@yield('custom_js')
</body>
</html>
