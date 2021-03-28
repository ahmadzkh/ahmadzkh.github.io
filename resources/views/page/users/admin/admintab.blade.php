@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/admin/admintab.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header bg-dark">
                <div class="row text-center justify-content-around">
                    <div class="col-sm-2">
                        <a href="{{ url('users') }}" class="usertab text-decoration-none text-white">Users</a>
                    </div>
                    <div class="col-sm-2 active">
                        <a href="{{ route('admin.index') }}" class="text-decoration-none text-white">Admin</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('client.index') }}" class="text-decoration-none text-white">Client</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('pln.index') }}" class="text-decoration-none text-white">PLN</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('bank.index') }}" class="text-decoration-none text-white">Bank</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2 class="mb-3 font-weight-bold">Table of Admin</h2>
                <div class="row mb-sm-2">
                    <div class="col-sm-6 col-md-6">
                        <div class="dataTable_length" id="dataTable_length">
                            <label for="select">
                                <span>Show </span>
                                <select name="dataTable_length" id="select" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="default" hidden>. . .</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <form action="/admin" method="get">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-user-plus mr-sm-2"></i>Add User
                        </button>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success mb-sm-2" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <a href="" class="text-decoration-none">&times;</a>
                        </button>
                    </div>
                    {{session('success')}}
                </div>
                @endif
                @if(session('deleted'))
                <div class="alert alert-danger mb-sm-2" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <a href="" class="text-decoration-none">&times;</a>
                        </button>
                    </div>
                    {{session('deleted')}}
                </div>
                @endif
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            @if (auth()->user()->levels=="Admin")
                            <th scope="col">Tools</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($admins=='0')
                        <tr>
                            <td colspan="7" class="text-center py-sm-5">
                                <i class="fas fa-sad-tear"></i> {{$admins}} User | 404 NOT FOUND
                            </td>
                        </tr>
                        @endif
                        @foreach ( $data_admin as $admin )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$admin->nama_depan}}</td>
                            <td>{{$admin->nama_belakang}}</td>
                            <td>{{$admin->no_telp}}</td>
                            <td style="width: 300px;">{{$admin->kelurahan}}, {{$admin->kecamatan}}, {{$admin->kota_kab}}, {{$admin->alamat}}, {{$admin->kode_pos}}</td>
                            @if (auth()->user()->levels=="Admin")
                            <td>
                                <a href="/admin/{{ $admin->id }}/edit" class="badge badge-success py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="fas fa-edit mx-sm-2"></i>
                                </a>
                                <a href="/admin/{{ $admin->id }}/destroy" class="badge badge-danger py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this data ?')">
                                    <i class="fas fa-trash mx-sm-2"></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-dark text-white text-center">
                <div class="small">Copyright © PyTricity 2020</div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/create" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">First Name</label>
                                    <input type="text" name="nama_depan" class="form-control" id="exampleFormControlInput1" placeholder="Max" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Last Name</label>
                                    <input type="text" name="nama_belakang" class="form-control" id="exampleFormControlInput2" placeholder="Alexander" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="levels" class="form-control" id="exampleFormControlInput4" value="Admin" hidden>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput5">Phone Number</label>
                            <input type="text" name="no_telp" class="form-control" id="exampleFormControlInput5" placeholder="name@example.com" required autofocus>
                        </div>
                        <div class="row">
                                    <div class="form-group col-sm">
                                        <label for="kel">Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control form-control-sm" id="kel" placeholder="Bintara" autofocus required>
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
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
