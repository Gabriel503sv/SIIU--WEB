<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
<html dir="rtl" lang="ar">
@else
<html lang="en">
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
  <x-demo-metas></x-demo-metas>
  @endif
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/v45_145.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../img/v45_145.png">

  <title>
    SIIU
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}">
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @auth
  @yield('auth')
  @endauth
  @guest
  @yield('guest')
  @endguest

  @if(session()->has('success'))
  <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
    <p class="m-0">{{ session('success')}}</p>
  </div>
  @endif
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  @stack('rtl')
  @stack('dashboard')


  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>