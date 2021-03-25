<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- My Custom -->
    <link rel="stylesheet" href="{{asset ('/assets/css/navbar.css')}}">
    <link rel="shortcut icon" href="{{asset ('/assets/logo/crcLogo.png')}}" type="image/x-icon">
    <script src="{{asset ('/assets/js/fullscreen.js')}}"></script>


    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg text-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/')}}"><img src="{{asset ('/assets/logo/recLogo.png')}}" alt="" class="logo"><span id="site-title">PyTricity</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse pl-5" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/service')}}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/trial')}}">Try it</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a href="{{ url('/login') }}" class="btn btn-outline-success login">Login</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('container')

    <footer class="footer py-3 text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col text-lg-left">Copyright © PyTricity 2020</div>
                <div class="col my-3 my-lg-0">
                    <a class="btn btn-social mx-2 fticons" href="#!"><i class="fab fa-facebook"></i></a>
                    <a class="btn btn-social mx-2 fticons" href="#!"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-social mx-2 fticons" href="#!"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="col text-lg-right">
                    <a class="mr-3 att" href="#!">Privacy Policy</a>
                    <a class="att" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
