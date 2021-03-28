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
                    <div class="col-sm-2">
                        <a href="{{ route('admin.index') }}" class="text-decoration-none text-white">Admin</a>
                    </div>
                    <div class="col-sm-2 active">
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
                <h2 class="mb-3 font-weight-bold">Table of Client</h2>
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
                        <form action="/client" method="get">
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
                            <th scope="col">ID PLN</th>
                            <th scope="col">Address</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($clients=='0')
                        <tr>
                            <td colspan="7" class="text-center py-sm-5">
                                <i class="fas fa-sad-tear"></i> {{$clients}} User | 404 NOT FOUND
                            </td>
                        </tr>
                        @endif
                        @foreach ( $data_pelanggan as $client )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$client->nama_depan}}</td>
                            <td>{{$client->nama_belakang}}</td>
                            <td>{{$client->no_telp}}</td>
                            <td>{{$client->no_pln}}</td>
                            <td style="width: 300px;">{{$client->kelurahan}}, {{$client->kecamatan}},{{$client->kota_kab}}, {{$client->alamat}}, {{$client->kode_pos}}</td>
                            <td>
                                <a href="/client/{{ $client->id }}/edit" class="badge badge-success py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="fas fa-edit mx-sm-2"></i>
                                </a>
                                <a href="/client/{{ $client->id }}/destroy" class="badge badge-danger py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this data ?')">
                                    <i class="fas fa-trash mx-sm-2"></i>
                                </a>
                            </td>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Form New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/client/create" method="POST">
                        {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first">First Name</label>
                                        <input type="text" name="nama_depan" class="form-control form-control-sm" id="first" placeholder="Max" autofocus required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last">Last Name</label>
                                        <input type="text" name="nama_belakang" class="form-control form-control-sm" id="last" placeholder="Alexander" autofocus required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="name@example.com" required autofocus>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-sm" id="password" value="123456" hidden>
                                        <pre>Password default "123456"</pre>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Phone Number</label>
                                    <input type="text" name="no_telp" class="form-control form-control-sm" id="no_telp" placeholder="XXXX-XXXX-XXXX" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="id_pln">ID PLN</label>
                                    <input type="text" name="no_pln" class="form-control form-control-sm" id="id_pln" placeholder="01234567890" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="levels" class="form-control form-control-sm" value="Pelanggan" hidden>
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
