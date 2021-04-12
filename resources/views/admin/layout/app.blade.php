<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Write Us Admin</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('admin/assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('admin/assets/js/plugins/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/argon-dashboard.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
</head>

<body class="g-sidenav-show g-sidenav-pinned">
    <!-- Sidenav -->
    @include('admin.include.navbar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('admin.include.header')

        @yield('content')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->

    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/argon-dashboard.min.js"></script>
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @stack('scripts')

    @if (session('success'))
    <script>
        Swal.fire(
            'Good job!',
            '{{session("success")}}',
            'success'
        );
    </script>
    @endif

</body>

</html>
