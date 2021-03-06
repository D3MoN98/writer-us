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

<body class="bg-default g-sidenav-show g-sidenav-pinned">

    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-5 py-lg-6 pt-lg-7">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Welcome!</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="{{route('admin.login-action')}}" method="POST">

                                @csrf

                                @if ($errors->first('login-error'))
                                <div class="alert alert-danger text-center">
                                    <strong>{{$errors->first('login-error')}}</strong>
                                </div>
                                @endif

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" name="email" value="{{old('email')}}"
                                            placeholder="Email" type="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" name="password" placeholder="Password"
                                            type="password">
                                    </div>
                                </div>

                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" name="remember" id=" customCheckLogin"
                                        type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Forgot password?</small></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <script src="http://127.0.0.1:8000/admin/assets/js/argon-dashboard.min.js"></script>
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>




</body>

</html>
