<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{asset ('/assets/css/login.css')}}">
    <link rel="shortcut icon" href="{{asset ('/assets/logo/crcLogo.png')}}" type="image/x-icon">
    <script src="{{asset ('/assets/js/fullscreen.js')}}"></script>

    <title>Auth</title>

</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide fixed-bottom" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                <span>Sign in</span>
            </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">
                <span>Sign up</span>
            </li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <section class="page-section d-flex">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <a href=" {{ url('/') }}" class="text-center">
                                <img src="{{asset ('/assets/logo/recLongLogo.png')}}" class="w-50 h-50" alt="">
                            </a>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <form action="{{route('postlogin')}}" method="post" class="needs-validation small w-100 px-sm-5">
                                <h2 class="text-center mb-3 font-weight-bold">SIGN IN</h2>
                                @csrf
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="email"><i class="fas fa-user"></i></label>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="password"><i class="fas fa-lock"></i></label>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                </div>
                                @if(session('message'))
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <a href="" class="text-decoration-none">&times;</a>
                                        </button>
                                    </div>
                                    {{session('message')}}
                                </div>
                                @endif
                                <button type="submit" class="btn btn-outline-success w-100" name="submit"><i class="fas fa-sign-in-alt mr-1"></i>Sign in</button>
                                <p class="my-5 text-center text-dark font-weight-bold">Don't have an account ? <a href="" data-target="#carouselExampleIndicators" data-slide-to="1">Sign up Here</a></p>
                            </form>
                        </div>
                    </div>
                    <img src="{{asset ('/assets/img/1.jpg')}}" alt="" class="img-01">
                </section>
            </div>
            <div class="carousel-item">
                <section class="page-section d-flex">
                    <img src="{{asset ('/assets/img/1-flip-x.jpg')}}" class="img-02" alt="...">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <a href=" {{ url('/') }}" class="text-center">
                                <img src="{{asset ('/assets/logo/recLongLogo.png')}}" class="w-25 h-25" alt="">
                            </a>
                        </div>
                        <div class="card-body py-sm-4 px-sm-4 overflow-auto">
                            <form action="/postregist" method="POST" class="small w-100">
                                <h2 class="text-center font-weight-bold text-dark">SIGN UP</h2>
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="exampleFormControlInput1">First Name</label>
                                        <input type="text" name="nama_depan" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Max" autofocus required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleFormControlInput2">Last Name</label>
                                        <input type="text" name="nama_belakang" class="form-control form-control-sm" id="exampleFormControlInput2" placeholder="Alexander" autofocus required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm">
                                        <label for="exampleFormControlInput3">Email address</label>
                                        <input type="email" name="email" class="form-control form-control-sm" id="exampleFormControlInput3" placeholder="name@example.com" required autofocus>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="exampleFormControlInput4">Password</label>
                                        <input type="password" name="password" class="form-control form-control-sm" id="exampleFormControlInput4" placeholder="will be in bcrypt" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput6">Phone Number</label>
                                    <input type="text" name="no_telp" class="form-control form-control-sm" id="exampleFormControlInput6" placeholder="XXXX-XXXX-XXXX" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput7">ID PLN</label>
                                    <input type="text" name="no_pln" class="form-control form-control-sm" id="exampleFormControlInput7" placeholder="01234567890" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="levels" class="form-control form-control-sm" value="Pelanggan" hidden>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="exampleFormControlInput8">Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control form-control-sm" id="exampleFormControlInput8" placeholder="Max" autofocus required>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="kec">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control form-control-sm" id="kec" placeholder="Bekasi Barat" required autofocus>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="kab">Kabupaten/Kota</label>
                                        <input type="text" name="kota_kab" class="form-control form-control-sm" id="kab" placeholder="Bekasi" required autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm">
                                        <label for="alamat">Address</label>
                                        <textarea name="alamat" class="form-control form-control-sm" id="alamat" placeholder="Jl.Soedirman 3" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="pos">Kode Pos</label>
                                        <input type="text" name="kode_pos" class="form-control form-control-sm" id="pos" placeholder="Bekasi">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="golongan">Power Volt</label>
                                        <select name="golongan" id="golongan" class="form-control form-control-sm">
                                            <option hidden>VA</option>
                                            <option value="R1/450">R1/450</option>
                                            <option value="R1/900">R1/900</option>
                                            <option value="R1/1300">R1/1300</option>
                                            <option value="R1/2200">R1/2200</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex p-0">
                                    <div class="col-sm-1">
                                        <input class="form-control-sm" type="checkbox" name="" id="agree" required>
                                    </div>
                                    <div class="col-sm">
                                        <p class="mt-sm-2">I <label class="text-primary" for="agree">Agree</label> to confirm my personal data.</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-outline-primary w-100 h-75 align-top" name="submit"><i class="fas fa-upload mr-1"></i>Confirm</button>
                                    </div>
                                </div>
                                <p class="text-center text-dark font-weight-bold">Have an account ? <a href="" data-target="#carouselExampleIndicators" data-slide-to="0" class="text-success">Sign in Here</a></p>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @if (session('success'))
    <script>
        alert("{{session('success')}}")
    </script>
    @endif
</body>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->

</html>
