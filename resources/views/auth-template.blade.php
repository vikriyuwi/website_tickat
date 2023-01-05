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

  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <section>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          @yield('main-content')
        </div>
      </div>
    </div>
  </section>
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