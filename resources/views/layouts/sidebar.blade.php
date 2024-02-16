<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('/images/logo.png') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

    <style>
        a {
            font-size: 14px;

            font-weight: 700;
        }

        .superNav {
            font-size: 13px;
        }

        .nav-item {
            transition: all 400ms ease;
            border-radius: 10px;
        }

        .nav-item:hover {
            background-color: #fff;
            border-radius: 10px;
            transition: all 400ms ease;
        }

        .nav-item>a,
        .nav-item-dropdown>a {
            color: #fff;
        }

        .nav-item:hover>a {
            color: black;
        }

        .nav-item-dropdown:hover>a {
            background-color: #fff;
            border-radius: 10px;
            color: black;
        }

        .nav-item-dropdown ul li:hover>a {
            background-color: initial;
            border-radius: initial;
            color: black;
        }

        .nav-item-top:hover {
            color: #007EA7;
        }

        .offcanvas-btn {
            border-radius: 5px;
            border-radius: 10px;
            transition: all 400ms ease;
        }

        .offcanvas-btn:hover {
            background-color: #fff;
            color: black;
            border-radius: 5px;
            transition: all 400ms ease;
        }

        .drop-profil {
            color: white;
        }

        .clicked {
            transition: all 400ms ease;
            border-radius: 10px;
        }

        .drop-profil:hover,
        .clicked.active {
            background-color: #fff;
            border-radius: 10px;
            color: black;
            transition: all 400ms ease;
        }

        /*
    .navbar-nav a{
        color: white;
    } */
        /* .form-control {
      outline:none !important;
      box-shadow: none !important;
    } */
        /* @media screen and (max-width:540px){
      .centerOnMobile {
        text-align:center
      }
    } */
    </style>

</head>

<body>
    <div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false"
        style="background-color: #003459; color:white;">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center" style="vertical-align: middle">
                <div class="rounded p-1" style="background-color: white">
                    <img src="{{ asset('images/logo.svg') }}" alt="logo" style="width: 36px;">
                </div>

                <h6 class="offcanvas-title d-none d-sm-block fs-4 ms-2" id="offcanvas">Menu</h6>
            </div>
            {{-- <button type="button" class="text-white" data-bs-dismiss="offcanvas" aria-label="Close"> --}}
            <div class="offcanvas-btn px-1">
                <i type="button" class="bi bi-x-lg " data-bs-dismiss="offcanvas" aria-label="Close"></i>
            </div>
            {{-- </button> --}}

        </div>

        <hr class="divider mt-0">

        <div class="offcanvas-body px-0 py-0" style="position: relative;">
            <div style="max-height: 70vh; overflow-x: hidden; overflow-y: auto;">
                <ul class="nav nav-pills flex-column mb-sm-auto ps-2 pe-2 mb-0 align-items-start" id="menu">
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li class="nav-item w-100 ">
                            <a href="{{ url('dashboard', []) }}" class="nav-link text-truncate "
                                style="font-size: 18px;">
                                <i class="fs-5 bi bi-speedometer"></i>
                                <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item w-100 ">
                            <a href="{{ url('', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                                <i class="fs-5 bi bi-house-door-fill"></i>
                                <span class="ms-2 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item w-100 ">
                        <a href="{{ url('berita', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                            <i class="fs-5 bi bi-newspaper"></i>
                            <span class="ms-2 d-none d-sm-inline">Berita</span>
                        </a>
                    </li>

                    <li class="nav-item w-100 ">
                        <a href="{{ url('galeri', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                            <i class="fs-5 bi bi-images"></i>
                            <span class="ms-2 d-none d-sm-inline">Galeri</span>
                        </a>
                    </li>

                    <li class="nav-item-dropdown w-100 ">
                        <a href="#usermenu" data-bs-toggle="collapse" class="nav-link text-truncate "
                            style="font-size: 18px;">
                            <i class="fs-5 bi bi-person-fill"></i>
                            <span class="ms-2 d-none d-sm-inline">User</span>
                        </a>
                        <ul class="collapse nav flex-column ms-3 mt-1" id="usermenu" data-bs-parent="#menu">
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <li class="nav-item w-100 ">
                                    <a href="{{ url('admin', []) }}" class="nav-link text-truncate "
                                        style="font-size: 18px;">
                                        <i class="fs-5 bi bi-person-fill"></i>
                                        <span class="ms-2 d-none d-sm-inline">Admin</span>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item w-100 ">
                                <a href="{{ url('pelatih', []) }}" class="nav-link text-truncate "
                                    style="font-size: 18px;">
                                    <i class="fs-5 bi bi-person-fill"></i>
                                    <span class="ms-2 d-none d-sm-inline">Pelatih</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 ">
                                <a href="{{ url('pemain', []) }}" class="nav-link text-truncate "
                                    style="font-size: 18px;">
                                    <i class="fs-5 bi bi-person-fill"></i>
                                    <span class="ms-2 d-none d-sm-inline">Pemain</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item w-100 ">
                        <a href="{{ url('tim', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                            <i class="fs-5 bi bi-people"></i>
                            <span class="ms-2 d-none d-sm-inline">Tim</span>
                        </a>
                    </li>

                    <li class="nav-item w-100 ">
                        <a href="{{ url('jadwal', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                            <i class="fs-5 bi bi-calendar-week-fill"></i>
                            <span class="ms-2 d-none d-sm-inline">Jadwal</span>
                        </a>
                    </li>

                    @if (Auth::check() && Auth::user()->role != 'pemain')
                    <li class="nav-item w-100 ">
                        <a href="{{ url('presensi', []) }}" class="nav-link text-truncate "
                            style="font-size: 18px;">
                            <i class="fs-5 bi bi-person-raised-hand"></i>
                            <span class="ms-2 d-none d-sm-inline">Presensi</span>
                        </a>
                    </li>
                    @endif

                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li class="nav-item w-100 ">
                            <a href="{{ url('log', []) }}" class="nav-link text-truncate " style="font-size: 18px;">
                                <i class="fs-5 bi bi-activity"></i>
                                <span class="ms-2 d-none d-sm-inline">Log Aktivitas</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>

            <div id="bottomDropdown" class="position-absolute bottom-0 w-100 p-2">
                <div class="dropdown dropup ">
                    <a href="#"
                        class="drop-profil clicked d-flex align-items-center text-decoration-none dropdown-toggle ps-2 pe-2 pt-2 pb-2"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::check())
                            @if (!Auth::user()->foto_profil)
                                <i class="bi bi-person-circle" style="font-size: 30px; vertical-align: middle;"></i>
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" class="rounded-circle object-fit-cover "
                                    style="width: 40px; height: 40px;" />
                            @endif
                        @endif
                        <span class="d-none d-sm-inline ms-3 text-capitalize overflow-hidden w-75 "
                            style="font-size: 18px; white-space: nowrap; text-overflow: ellipsis">
                            @if (Auth::check())
                                {{ Auth::user()->username }}
                            @endif
                        </span>
                    </a>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var dropProfil = document.querySelector('.drop-profil');

                            document.addEventListener('click', function(event) {
                                var isClickInside = dropProfil.contains(event.target);

                                if (!isClickInside) {
                                    dropProfil.classList.remove('active');
                                }
                            });

                            dropProfil.addEventListener('click', function(event) {
                                event.stopPropagation(); // Menghentikan peristiwa klik agar tidak mencapai dokumen
                                this.classList.toggle('active');
                            });
                        });
                    </script>

                    <div class="dropdown-menu dropdown-menu text-small shadow mb-2 w-100" style=" "
                        aria-labelledby="dropdownUser1">
                        <div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    @if (Auth::check())
                                        @if (!Auth::user()->foto_profil)
                                            <i class="bi bi-person-circle ms-3"
                                                style="font-size: 40px; vertical-align: middle;"></i>
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
                                                class="rounded-circle ms-3 object-fit-cover " style="width: 60px; height: 60px;" />
                                        @endif
                                        <div class="ms-0 row">

                                            <span class="text-capitalize"><strong> {{ Auth::user()->username }}
                                                </strong></span>
                                            <span style=""
                                                class="text-capitalize">{{ Auth::user()->role }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="dropdown-divider">

                    @if (Auth::check() && Auth::user()->role != 'admin')
                        <a class="dropdown-item text-black " href="{{ url('profil', ['']) }}">
                            <i class="bi bi-person-circle" style="font-size: 20px; vertical-align: middle; "></i>
                            <strong class="ms-1">Profil Anda</strong>
                        </a>
                    @endif

                    <a class="dropdown-item " style="border-radius: 10px;" href="{{ url('logout', []) }}">
                        <i class="bi bi-box-arrow-right"
                            style="font-size: 20px; vertical-align: middle; color: #DC3545;"></i>
                        <strong class="ms-1" style="color: #DC3545;">Log Out</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>



    <div class="superNav p-0 bg-light ">
        <div class="shadow-sm p-2 mb-5 bg-body">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="60px">
                        <span class="" style="color: #003459; font-size: 28px; vertical-align: middle;">
                            <strong><i>ONE SOCCER</i></strong>
                        </span>
                    </div>

                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-flex d-md-flex-d-sm-flex d-xs-none justify-content-end ">

                        <div class="d-flex align-items-center " style="background-color: ; font-size: 16px; ">
                            <div class="nav-item-top">
                                @if (Auth::check() && Auth::user()->role == 'admin')
                                    <a class="nav-link mx-2 text-uppercase " aria-current="page"
                                        href="{{ url('dashboard', []) }}">Dashboard</a>
                                @else
                                    <a class="nav-link mx-2 text-uppercase " aria-current="page"
                                        href="{{ url('/', []) }}">Home</a>
                                @endif

                            </div>

                            <div class="nav-item-top">
                                <a class="nav-link mx-2 text-uppercase " aria-current="page"
                                    href="{{ url('berita', []) }}">Berita</a>
                            </div>

                            <div class="nav-item-top">
                                <a class="nav-link mx-2 text-uppercase " aria-current="page"
                                    href="{{ url('galeri', []) }}">Galeri</a>
                            </div>
                        </div>

                        @if (!Auth::check())
                            <div class="d-flex align-items-center pe-0 ms-3">
                                <a href="{{ url('login', []) }}"
                                    class="btn btn-primary  d-flex align-items-center mt-1 ">
                                    Login
                                </a>
                            </div>
                        @else
                            <button class="btn py-0 mt-1 ms-3"
                                style=" background-color:#003459; width:50px; height:50px;" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas" role="button">
                                {{-- <span class="text-white fs-4 " style="vertical-align: middle;" >Menu</span> --}}
                                <i class="bi bi-list fs-3" style="color:white; vertical-align: middle;"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
                            </button>
                        @endif

                        {{-- @if (Auth::check())
                <div class="dropdown" style="display: inline-block; vertical-align: middle;">
                    <i  class="bi bi-person-circle" 
                        id="navbarDropdownMenuLink" data-bs-toggle='dropdown'
                        style="font-size: 40px; vertical-align: middle; cursor: pointer;">
                    </i>
                    <div class="dropdown-menu" style="width: 200px;" aria-labelledby="navbarDropdownMenuLink">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle ms-3" style="font-size: 40px; vertical-align: middle;"></i>
                                <img src="" alt="">
                                <div class="ms-0 row">
                                    <span class="text-capitalize"><strong> {{Auth::user()->username}} </strong></span>
                                    <span style="" class="text-capitalize">{{Auth::user()->role}}</span>
                                </div>
                            </div>
                        </div>
                    <hr style="margin-top: -1px">

                    @if (Auth::user()->role != 'admin')
                    <a class="dropdown-item" href="{{ url('profil', ['']) }}"> 
                    <i class="bi bi-person-circle"  style="font-size: 20px; vertical-align: middle; "></i> 
                    <strong class="ms-1">Profil Anda</strong> 
                    </a>
                    @endif

                    <a class="dropdown-item" href="{{ url('logout', []) }}"> 
                        <i class="bi bi-box-arrow-right"  style="font-size: 20px; vertical-align: middle; color: #DC3545;"></i> 
                        <strong class="ms-1" style="color: #DC3545;">Log Out</strong> 
                    </a>
                    </div>
                    </div>
                </div>
            @endif  --}}


                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @include('layouts.flashMessage')
            @yield('content')
        </div>


</body>

<footer>
    @yield('footer')
</footer>

</html>
