<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/sotare/sotare/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Apr 2022 07:21:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Buku Tamu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    @include('layouts_front.head_front')
</head>

<body>

<div class="fakeloader"></div>
<div class="main-wrapper">
   @include('layouts_front.head_view')
    <!-- Header-area end -->
    
    @yield('content')


    <!-- Hero Slider Start -->

    @include('layouts_front.foot_view')
</div>

@include('layouts_front.foot_front')
</body>


<!-- Mirrored from htmldemo.net/sotare/sotare/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Apr 2022 07:21:27 GMT -->
</html>