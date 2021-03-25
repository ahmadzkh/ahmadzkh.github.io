@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/admin/admintab.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-sm-1">
                        <a href="{{ url('users') }}" class="text-decoration-none">Users</a>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{ url('admin') }}" class="text-decoration-none">Admin</a>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{ url('client') }}" class="text-decoration-none">Client</a>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{ url('pln') }}" class="text-decoration-none">PLN</a>
                    </div>
                    <div class="col-sm-1 active">
                        <a href="{{ url('bank') }}" class="text-decoration-none">Bank</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2 class="mb-3 font-weight-bold">Table of Staff Bank</h2>
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
                        <form action="/bank" method="get">
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
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($banks=='0')
                        <tr>
                            <td colspan="7" class="text-center py-sm-5">
                                <i class="fas fa-sad-tear"></i> {{$banks}} User | 404 NOT FOUND
                            </td>
                        </tr>
                        @endif
                        @foreach ( $data_bank as $bank )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bank->nama_depan}}</td>
                            <td>{{$bank->nama_belakang}}</td>
                            <td>{{$bank->no_telp}}</td>
                            <td>{{$bank->alamat}}</td>
                            <td>
                                <a href="/bank/{{ $bank->id }}/edit" class="badge badge-success py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="fas fa-edit mx-sm-2"></i>
                                </a>
                                <a href="/bank/{{ $bank->id }}/destroy" class="badge badge-danger py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this data ?')">
                                    <i class="fas fa-trash mx-sm-2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form New Bank User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/bank/create" method="POST">
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
                            <input type="text" name="levels" class="form-control" id="exampleFormControlInput4" value="Bank" hidden>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput5">Phone Number</label>
                            <input type="text" name="no_telp" class="form-control" id="exampleFormControlInput5" placeholder="name@example.com" required autofocus>
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
