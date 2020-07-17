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
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/hover-css/hover-min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/animate-css/animate.min.css') }}">
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body  data-base-url="{{url('/')}}" class="bg-white">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <!-- Nav Bar -->
  <nav class="navbar  navbar-expand-lg px-5 py-3 navbar-light bg-white">
    <a class="navbar-brand flex align-items-center" href="#">
        <span class="btn btn-outline-danger btn-lg mr-2 animated bounceInLeft delay-1s "><i class="pr-2" data-feather="crosshair"></i>Dart</span> 
        <span class="font-weight-bold text-primary animated fadeIn delay-3s h5">Admin Dashboard</span> </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
      <ul class="navbar-nav">

      @if (Auth::user()->role->name == "Admin")
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navPlayers ? 'active' : '' }}" href="{{ route('admin.players') }}">
            <i class="pr-2 text-success hvr-icon" data-feather="users"></i>Players</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navBlogs ? 'active' : '' }}" href="{{ route('admin.blogs') }}">
            <i class="pr-2 text-warning hvr-icon" data-feather="paperclip"></i>Blogs</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navPages ?  'active' : '' }}" href="{{ route('admin.pages') }}">
            <i class="pr-2 text-info hvr-icon" data-feather="sliders"></i>Pages</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navCategory ?  'active' : '' }}" href="{{ route('admin.categories') }}">
            <i class="pr-2 text-danger hvr-icon" data-feather="tag"></i>Categories</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navProduct ?  'active' : '' }}" href="{{ route('admin.products') }}">
            <i class="pr-2 text-primary hvr-icon" data-feather="shopping-bag"></i>Products</a>
        </li>
      @endif
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navChart ?  'active' : '' }}" href="{{ route('admin.chart') }}">
            <i class="pr-2 text-success hvr-icon" data-feather="shopping-cart"></i>Chart</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navCompare ?  'active' : '' }}" href="{{ route('admin.compare') }}">
            <i class="pr-2 text-warning hvr-icon" data-feather="codepen"></i>Compare</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover {{ $navProfile ?  'active' : '' }}" href="{{ route('admin.profile') }}">
            <i class="pr-2 hvr-icon" data-feather="user"></i>Profile</a>
        </li>
        <li class="nav-item active px-2 animated bounceInDown delay-1s hvr-icon-pulse">
          <a class="nav-link btn btn-outline-secondary px-3 href rounded-pill color-white-hover" href="{{ route('logout') }}">
            <i class="pr-2 hvr-icon" data-feather="log-out"></i>Sign Out</a>
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
