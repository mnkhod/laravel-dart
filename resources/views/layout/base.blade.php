<!DOCTYPE html>
<html>
<head>
  <title>Dart</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg px-5 py-3 navbar-light bg-light">
    <a class="navbar-brand flex align-items-center" href="#"><span class="btn btn-outline-danger btn-lg mr-2">Dart</span> <span class="font-weight-bold text-primary">Admin Dashboard</span> </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
      <ul class="navbar-nav">
        <li class="nav-item active px-2">
          <a class="nav-link btn btn-outline-secondary px-4 href rounded-pill color-white-hover" href="#"><i class="pr-2" data-feather="tag"></i>Category</a>
        </li>
        <li class="nav-item active px-2">
          <a class="nav-link btn btn-outline-secondary px-4 href rounded-pill color-white-hover" href="#"><i class="pr-2" data-feather="shopping-bag"></i>Product</a>
        </li>
        <li class="nav-item active px-2">
          <a class="nav-link btn btn-outline-secondary px-4 href rounded-pill color-white-hover" href="#"><i class="pr-2" data-feather="shopping-cart"></i>Chart</a>
        </li>
        <li class="nav-item active px-2">
          <a class="nav-link btn btn-outline-secondary px-4 href rounded-pill color-white-hover active" href="#"><i class="pr-2" data-feather="user"></i>Profile</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- END Nav Bar -->


  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      @yield('content')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>
