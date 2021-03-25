@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/pegawai.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-sm-1 active">
                        <a href="{{ url('users') }}" class="usertab text-decoration-none">Users</a>
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
                    <div class="col-sm-1">
                        <a href="{{ url('bank') }}" class="text-decoration-none">Bank</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2 class="mb-3 font-weight-bold">Table of Users</h2>
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
                    <div class="col-sm-6 col-md-6">
                        <form action="/users" method="get">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Data Created</th>
                            <th scope="col">Data Update</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users=='0')
                        <tr>
                            <td colspan="7" class="text-center py-sm-5">
                                <i class="fas fa-sad-tear"></i> {{$users}} User | 404 NOT FOUND
                            </td>
                        </tr>
                        @endif
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->nama}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->levels}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                @if ($user->levels=="Admin")
                                <a href="/users" class="badge badge-danger py-sm-2" data-toggle="tooltip" data-placement="bottom" title="Change" onclick="return alert('Cant delete role admin')">
                                    <i class="fas fa-trash mx-sm-2"></i>
                                </a>
                                @else
                                <a href="/users/{{ $user->id }}/destroy" class="badge badge-danger py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this user account ?')">
                                    <i class="fas fa-trash mx-sm-2"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
