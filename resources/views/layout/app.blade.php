<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>writers us.org</title>
    <meta name="description" content="" />
    <meta name="author" content="admin" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="images/favicon.png" alt=""/> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
    @stack('styles')
</head>

<body>

    @include('include.header')

    @yield('content')

    @include('include.footer')

    @guest
    @include('include.login-modal')
    @include('include.register-modal')
    @include('include.forget-password-modal')
    @include('include.reset-password-modal')
    @endguest


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/swiper.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
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

    @error('error')
    <script>
        Swal.fire(
            'Oops!',
            '{{$message}}',
            'error'
        );
    </script>
    @enderror

</body>

</html>
