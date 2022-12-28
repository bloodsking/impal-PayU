
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="gambar/removebglogo.png">
  <title>Pay-U | @yield('title')</title>

  <link rel="stylesheet" href="{{asset('template/')}}https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css\logout.css">
  <link rel="stylesheet" href="css\home.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="{{request() -> is ('nabung') ? 'active' : ''}}">
        <a href="/about" class="nav-link">About</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-default btn-flat">Log out</button>
        </form>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/home" class="brand-link">
      <img src="/gambar/removebglogo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pay-U</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="/home" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      @include('layout.v_nav')
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      </div>
    </section>


    <section class="content">
        @yield('content')
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Telkom University</b> IF-44-11
    </div>
    <strong><a href="/home">Pay-U</a>.</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>



<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
