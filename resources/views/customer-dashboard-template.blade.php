    <!--
    =========================================================
    * Soft UI Dashboard - v1.0.7
    =========================================================

    * Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
    * Copyright 2022 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    * Coded by Creative Tim

    =========================================================

    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}">
    <title>
        @yield('page-title')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <style>
        body{
        height: 100%;
        width: 100%;
        }
        
        #screen {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        -moz-backdrop-filter: blur(20px);
        -ms-backdrop-filter: blur(20px);
        transform: translate3d(0, 0, 0);
        display: none;
        overflow: scroll;
        transition: all 1s !important;
        -webkit-transition: all 1s !important;
        -moz-transition: all 1s !important;
        -o-transition: all 1s !important;
        }

        #screen.show {
        display: block;
        }

        .nav-link {
            color: #111111 !important;
        }
    </style>
    </head>

    <body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="">
            <img src="{{ url('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">TickAt</span>
        </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('my-ticket') ? 'active' : '' }}" href="{{ url('/my-ticket') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-receipt"></i>
                </div>
                <span class="nav-link-text ms-1">My Ticket</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('my-ticket/book*') ? 'active' : '' }}" href="{{ url('/my-ticket/book') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-credit-card"></i>
                </div>
                <span class="nav-link-text ms-1">Book</span>
            </a>
            </li>
            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
            <a class="nav-link  " href="{{ url('/auth/logout') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>customer-support</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(1.000000, 0.000000)">
                            <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                            <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                            <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                        </g>
                        </g>
                    </g>
                    </g>
                </svg>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
            </li>
        </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center me-3">
                <a href="javascript:;" class="nav-link p-0 text-body" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            </ul>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @yield('breadcrumb')
            </ol>
            <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto d-flex align-items-center d-none d-xl-block">
                <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            </div>
        </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
        @yield('main-content')
        <footer class="footer pt-3">
            <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © 2022,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://fikriyuwi.com" class="font-weight-bold" target="_blank">Kelompok 5 Database</a>
                    for a better web.
                </div>
                </div>
            </div>
            </div>
        </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/core/jquery.js') }}"></script>
    <script src="{{ url('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    @if(isset($ticket))
    <script>
        var selectedColor = 'bg-<?php echo $ticket->TicketColor ?>';
    </script>
    @else
    <script>
        var selectedColor = 'bg';
    </script>
    @endif
    <script>
        
        $('#inputChange').change(function(){
        $('.myInput').innerHTML = $(this).val();
        });

        $('#colorOption').change(function(){
            $('.color-theme').removeClass(selectedColor).addClass('bg-'+$(this).val());
            selectedColor = 'bg-'+$(this).val();
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function showCreateModal() {
        document.getElementById("screen").classList.add("show");
        }

        function closeCreateModal() {
        document.getElementById("screen").classList.remove("show");
        }

        
    </script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            showCreateModal();
        </script>
    @endif
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/5c65d8dae4.js" crossorigin="anonymous"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    </body>

    </html>