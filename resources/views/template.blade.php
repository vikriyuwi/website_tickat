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
    :root {
        --theme: #5800FF;
        --bg-theme:rgba(248,249,250);
        --bg-theme-trans:rgba(248,249,250,.65);
        --c1: #F5EBE0;
        --c2: #DEF5E5;
        --c3: #EEF1FF;
    }

    body{
      height: 100%;
      width: 100%;
    }

    .navbar {
        z-index: 350;
        background: var(--bg-theme-trans);
    }

    .navbar .container {
        z-index: 352;
    }

    .navbar::before {
        z-index:351;
        content:'';
        position: absolute;
        left:0;
        right:0;
        top:0;
        bottom:0;
        box-shadow:inset 0 0 2000px var(--bg-theme-trans);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        -moz-backdrop-filter: blur(30px);
        -ms-backdrop-filter: blur(30px);
        transform: translate3d(0, 0, 0);
    }

    #header {
        background: url('/assets/img/curved-images/curved7.jpg');
        background-size: cover;
        background-attachment: fixed;
    }

    .overlaybox {
        position: relative;
    }

    #header .row {
        height: 80vh;
    }

    .overlaybox div {
        z-index: 3;
    }

<<<<<<< HEAD
    .widget-maps {
=======
    .widget-maps .card-header {
>>>>>>> newbranch
      background: url('/assets/img/maps.png');
      background-size: cover;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  @yield('main-content')
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