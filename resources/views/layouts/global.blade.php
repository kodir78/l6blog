<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blog &mdash; @yield("title")</title>
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stisla/assets/modules/fontawesome/css/all.min.css">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/stisla/assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="/stisla/assets/modules/summernote/summernote-bs4.css">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/stisla/assets/css/style.css">
    <link rel="stylesheet" href="/stisla/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>
    
    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        </ul>  
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            @if(\Auth::user())
                            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                    <form action="{{route("logout")}}" method="POST">
                                        @csrf
                                         <button class="dropdown-item" style="cursor:pointer">Logout</button>
                                    </form>
                                    {{-- <a href="#" class="dropdown-item has-icon text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a> --}}
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- Sidebar -->
                    @include('layouts.sidebar')
                    <!-- Main Content -->
                    <div class="main-content">
                        <section class="section">
                            <div class="section-header">
                                <h1>@yield("title")</h1>
                                <div class="section-header-breadcrumb">
                                    <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                                    <div class="breadcrumb-item">@yield("title")</div>
                                </div>
                            </div>
                            @yield('content')
                        </section>
                    </div>
                    {{-- @yield('content') --}}
                    <!-- Main Content -->
                </div>
                <!-- Footer -->
                @include('layouts.footer')