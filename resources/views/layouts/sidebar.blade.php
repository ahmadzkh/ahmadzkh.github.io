<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- My Custom -->
    <link rel="stylesheet" href="{{asset ('/assets/css/sidebar.css')}}">
    <link rel="shortcut icon" href="{{asset ('/assets/logo/crcLogo.png')}}" type="image/x-icon">
    <script src="{{asset ('/assets/js/fullscreen.js')}}"></script>

    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <input type="checkbox" name="" id="bars">
        <!--header menu start-->
        <div class="header">
            <div class="header-menu">
                <label for="bars">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label>
                <div class="title">
                    <a href="{{ url('dashboard') }}" class="text-decoration-none text-white">Dashboard <span>{{auth()->user()->levels}}</span></a>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning">
                        <i class="fas fa-bell mx-sm-2"></i>
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split pt-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu mt-4 mr-2 px-1 fade">
                        <a href="" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="Profile Setting">
                            <i class="fas fa-user-edit mr-2"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="{{ route('account.edit', Auth::user()->id) }}" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="Account Setting">
                            <i class="fas fa-user-lock mr-2"></i>
                            <span>Account</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item logout" data-toggle="tooltip" data-placement="bottom" title="Logout" onclick="return confirm('Are you sure you want to logout ?')">
                            <i class="fas fa-power-off"></i><span class="ml-2">Logout</span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--header menu end-->

        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">
                <center class="profile">
                    <img src="{{asset ('/assets/logo/crcLogo.png')}}" alt="">
                    <p>{{auth()->user()->nama}}</p>
                    <span>{{auth()->user()->levels}}</span>
                </center>
                <ul>
                    <li class="item dashboard">
                        <a href="{{ url('dashboard') }}" class="menu-btn">
                            <i class="fas fa-desktop"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if (auth()->user()->levels=="Admin")
                    <li class="item users">
                        <a href="{{ url('users') }}" class="menu-btn">
                            <i class="fas fa-users-cog"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="item pybill">
                        <a href="{{ url('pybill') }}" class="menu-btn">
                            <i class="fas fa-file-invoice"></i>
                            <span>Bill Users</span>
                        </a>
                    </li>
                    <li class="item pytrans">
                        <a href="{{ url('pytrans') }}" class="menu-btn">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>All Transaction</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->levels=="Pelanggan")
                    <li class="item mybill">
                        <a href="{{ url('mybill') }}" class="menu-btn">
                            <i class="fas fa-file-invoice mr-1"></i>
                            <span>My Bills</span>
                        </a>
                    </li>
                    <li class="item mytrans">
                        <a href="{{ url('mytrans') }}" class="menu-btn">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>My Transactions</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->levels=="PLN")
                    <li class="item pybill">
                        <a href="{{ url('pybill') }}" class="menu-btn">
                            <i class="fas fa-file-invoice"></i>
                            <span>Bill Users</span>
                        </a>
                    </li>
                    <li class="item bills">
                        <a href="{{ route('bills.unpaid') }}" class="menu-btn">
                            <i class="fas fa-file-contract"></i>
                            <span>Bills Control</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->levels=="Bank")
                    <li class="item pybill">
                        <a href="{{ url('pybill') }}" class="menu-btn">
                            <i class="fas fa-file-invoice"></i>
                            <span>Bill Users</span>
                        </a>
                    </li>
                    <li class="item trans">
                        <a href="{{ url('trans') }}" class="menu-btn">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Transaction</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--sidebar end-->

        <!--content start-->
        <div class="content">
            @yield('container')
        </div>
        <!--content end-->
        
    </div>
    <!--wrapper end-->
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
