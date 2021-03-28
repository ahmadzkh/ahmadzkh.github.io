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
    <link rel="stylesheet" href="{{asset ('/assets/css/landing/index.css')}}">
    <link rel="stylesheet" href="{{asset ('/assets/css/landing/about.css')}}">

    <script src="{{asset ('/assets/js/fullscreen.js')}}"></script>

    <title>Pytricity</title>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg text-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home"><img src="{{asset ('/assets/logo/recLogo.png')}}" alt="" class="logo"><span id="site-title">PyTricity</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse pl-5" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a href="{{ url('/login') }}" class="btn btn-outline-success login">Sign in</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    
    <!-- Section Banner Start -->
    <section class="page-section" id="home">
        <img src="{{asset ('assets/img/Banner.png')}}" alt="home">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#17a2b8" fill-opacity="1" d="M0,256L0,32L288,32L288,192L576,192L576,32L864,32L864,256L1152,256L1152,192L1440,192L1440,320L1152,320L1152,320L864,320L864,320L576,320L576,320L288,320L288,320L0,320L0,320Z"></path></svg>
    </section>
    <!-- Section Banner End -->
    
    <!-- Section About Start -->
    <section class="page-section" id="about">
        <div class="content py-sm-5 text-white">
            <div class="row">
                <div class="col-sm">
                    <h2 class="text-center mb-sm-3 section-heading text-uppercase font-weight-bold">About</h2>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-6 overflow-hidden">
                    <img src="{{asset ('/assets/img/tower.jpg')}}" alt="">
                </div>
                <div class="col-sm-6 justify-content-center py-sm-5">
                    <center>
                        <h3 class="text-center my-3">Vision</h3>
                        <p>Always be the one who can benefit all.</p>
                    </center>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-6">
                    <div class="d-block px-5">
                        <h3 class="text-center mb-sm-3 mt-sm-5">Mission</h3>
                        <ul>
                            <li>
                                <p align="justify">Running an electricity business, oriented to customer satisfaction.</p>
                            </li>
                            <li>
                                <p align="justify">Making electricity resources a primary need in people's lives.</p>
                            </li>
                            <li>
                                <p align="justify">Trying to create electric resources that can encourage national economic activity.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 overflow-hidden">
                    <img src="{{asset ('/assets/img/posko.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#ffffff" fill-opacity="1" d="M0,96L0,0L205.7,0L205.7,224L411.4,224L411.4,192L617.1,192L617.1,32L822.9,32L822.9,160L1028.6,160L1028.6,288L1234.3,288L1234.3,192L1440,192L1440,320L1234.3,320L1234.3,320L1028.6,320L1028.6,320L822.9,320L822.9,320L617.1,320L617.1,320L411.4,320L411.4,320L205.7,320L205.7,320L0,320L0,320Z"></path></svg>
    </section>
    
    <!-- Section About End -->

    <!-- Section Sevice Start -->
    <section class="page-section" id="service">
        <div class="container py-sm-5">
            <h2 class="section-heading text-uppercase font-weight-bold text-center">Service</h2>
            <h4 class="section-subheading text-muted text-center">Our service provide for you</h4>
            <div class="row text-center mt-5">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x service"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">E-Commerce</h4>
                    <p class="text-muted pr-4 pl-4">An application that makes it easy for you to pay postpaid electricity bills through Online Banking Payment Point (PPOB).</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x service"></i>
                        <i class="fas fa-charging-station fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Electricity</h4>
                    <p class="text-muted pr-4 pl-4">Stay active with your family without worrying about power outages.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x service"></i>
                        <i class="fas fa-file-invoice-dollar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Transaction Security</h4>
                    <p class="text-muted pr-4 pl-4">All data on electricity bills that have been paid can be viewed again to protect your account information leakage.</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#17a2b8" fill-opacity="1" d="M0,256L0,32L288,32L288,192L576,192L576,32L864,32L864,256L1152,256L1152,192L1440,192L1440,320L1152,320L1152,320L864,320L864,320L576,320L576,320L288,320L288,320L0,320L0,320Z"></path></svg>
    </section>
    <!-- Section Sevice End -->

    <!-- Section Contact Start -->
    <section class="page-section" id="contact">
        <div class="container py-sm-5 mt-sm-5 text-white">
            <div class="row">
                <div class="col-sm">
                    <h2 class="section-heading text-uppercase font-weight-bold text-white mb-sm-3 text-center">Contact Author</h2>
                    <form class="">
                        <div class="form-group">
                            <label for="name" class="text-center">Name</label>
                            <input type="text" class="form-control form-control-sm" id="name" aria-describedby="name" placeholder="Your name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-center">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" aria-describedby="name" placeholder="Your email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-center">Message</label>
                            <textarea type="message" class="form-control form-control-sm" id="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">Send</button>
                    </form>
                </div>
                <div class="col-sm text-center">
                    <h2 class="section-heading text-uppercase font-weight-bold mb-sm-3 ">Author Profile</h2>
                    <img src="{{asset ('assets/img/1.jpg')}}" alt="_ahmadzkh" width="200" class="rounded-circle img-thumbnail">
                    <h3 class="my-sm-3">Ahmad Zaky Humami</h3>
                    <p>XI RPL A | SMKN 1 Kota Bekasi</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#ffffff" fill-opacity="1" d="M0,96L0,0L205.7,0L205.7,224L411.4,224L411.4,192L617.1,192L617.1,32L822.9,32L822.9,160L1028.6,160L1028.6,288L1234.3,288L1234.3,192L1440,192L1440,320L1234.3,320L1234.3,320L1028.6,320L1028.6,320L822.9,320L822.9,320L617.1,320L617.1,320L411.4,320L411.4,320L205.7,320L205.7,320L0,320L0,320Z"></path></svg>
    </section>
    <!-- Section Contact End -->

    <footer class="footer py-3 mt-sm-3 text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col text-lg-left">Copyright © PyTricity 2020</div>
                <div class="col my-3 my-lg-0">
                    <a class="btn btn-social mx-2 fticons" href="https://www.facebook.com/zaky.humami"><i class="fab fa-facebook"></i></a>
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
