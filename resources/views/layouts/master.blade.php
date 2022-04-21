<!DOCTYPE html>
<html lang="en" id="demo">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="../../assets/img/brand/favicon.ico" type="image/x-icon"/>
  <title>{{ $config['page_title'] ?? "NULL" }} | {{ config('app.name') }}</title>

  @include('layouts.head-css')
</head>

<body class="main-body leftmenu hover-submenu">
@include('layouts.switcher')

@include('layouts.preloader')

<!-- Page -->
<div class="page">
@include('layouts.sidebar')

@include('layouts.topbar')


<!-- Main Content-->
  <div class="main-content side-content pt-0">
    <div class="container-fluid">
      <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
          <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{ $config['page_title'] ?? "NULL" }}</h2>
            @component('components.breadcrumb', ['page_breadcrumbs' => $page_breadcrumbs])
              @slot('title'){{ $config['page_title'] }} @endslot
            @endcomponent
          </div>
          <div class="d-flex">
            <div class="justify-content-center">
              @yield('content_corner')
            </div>
          </div>
        </div>
        <!-- End Page Header -->

        <!--Row-->
        @yield('content')
      </div>
    </div>
  </div>
  <!-- End Main Content-->

  @include('layouts.footer')

 @include('layouts.corner-right-siderbar')

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

@include('layouts.vendor-scripts')

</body>
</html>
