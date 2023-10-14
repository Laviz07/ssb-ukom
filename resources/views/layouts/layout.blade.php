<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

    <style>
    a{
        font-size:14px;
        
        font-weight:700;
    }
    .superNav {
      font-size:13px;
    }
    .form-control {
      outline:none !important;
      box-shadow: none !important;
    }
    @media screen and (max-width:540px){
      .centerOnMobile {
        text-align:center
      }
    }
    </style>

</head>

<body>
   <div class="superNav border-bottom py-2 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="80px">
            <span class="h4"><strong>Sekolah  Sepak Bola</strong></span>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none  text-end">
            <a href="#" class="btn btn-success btn-lg">Login</a>
            <div class="dropdown" style="display: inline-block; vertical-align: middle;">
                <i  class="bi bi-person-circle ms-4" 
                    id="navbarDropdownMenuLink" data-bs-toggle='dropdown'
                    style="font-size: 40px; vertical-align: middle; ">
                </i>
                <div class="dropdown-menu" style="width: 200px" aria-labelledby="navbarDropdownMenuLink">
                    <div class="col">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle ms-2" style="font-size: 40px; vertical-align: middle;"></i>
                            <div class="ms-2">
                                <h6><strong> Username</strong></h6>
                                <span style="">Role</span>
                            </div>
                        </div>
                    </div>
                <hr style="margin-top: -1px">

                   <a class="dropdown-item" href="#"> 
                    <i class="bi bi-person-circle"  style="font-size: 20px; vertical-align: middle; "></i> 
                    <strong class="ms-1">Profil Anda</strong> 
                   </a>
                   <a class="dropdown-item" href="#"> 
                    <i class="bi bi-box-arrow-right"  style="font-size: 20px; vertical-align: middle; color: #DC3545;"></i> 
                    <strong class="ms-1" style="color: #DC3545;">Log Out</strong> 
                   </a>
                  </div>
                </div>
        </div>

      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-white navbar-light p-2 shadow-sm">
    <div class="container">
    
        <ul class="navbar-nav  ">
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Pelatih</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Pemain</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Tim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase" href="#">Jadwal</a>
          </li>

        </ul>
        
      </div>
    </div>
  </nav>

  <div class="container">
    @include('layouts.flashMessage')
    @yield('content')
</div>


</body>

<footer>
    @yield('footer')
</footer>

</html>