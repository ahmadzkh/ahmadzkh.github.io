@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/dashboard.css')}}">
@if (session('success'))
<script>
    alert( "{{session('success')}} '{{auth()->user()->nama}}' Role as '{{auth()->user()->levels}}'" )

</script>
@endif
<section class="page-section">
    <div class="container">
        <div class="row mb-sm-4">
            <div class="col-sm">
                <div class="card shadow user">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-8">
                                <h6 class="text-primary">All Users</h6>
                                <p class="p">{{$count_users}} Users</p>
                            </div>
                            <div class="col-sm d-flex justify-content-center align-items-center">
                                <i class="fas fa-users i"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow admins">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-8">
                                <h6 class="text-danger">Admins</h6>
                                <p class="p">{{$count_admin}} Users</p>
                            </div>
                            <div class="col-sm d-flex justify-content-center align-items-center">
                                <i class="fas fa-users i"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow clients">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-8">
                                <h6 class="text-success">Clients</h6>
                                <p class="p">{{$count_client}} Users</p>
                            </div>
                            <div class="col-sm d-flex justify-content-center align-items-center">
                                <i class="fas fa-users i"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow plns">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-8">
                                <h6 class="text-warning">PLN</h6>
                                <p class="p">{{$count_pln}} Users</p>
                            </div>
                            <div class="col-sm d-flex justify-content-center align-items-center">
                                <i class="fas fa-users i"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow banks">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-8">
                                <h6 class="text-info">Banks</h6>
                                <p class="p">{{$count_bank}} Users</p>
                            </div>
                            <div class="col-sm d-flex justify-content-center align-items-center">
                                <i class="fas fa-users i"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->levels=="Pelanggan")
        <div class="row mb-sm-4">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h5 class="text-white text-center m-0">My Bills</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-sm-2">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-header">
                                    <p class="text-center p-0 m-0"><i class="fas fa-inbox"></i><br>
                                        Unpaid bills
                                    </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <p class="pb">{{$count_bill_un}} Bill</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <a href="{{ url('mybill') }}"><i class="fas fa-file-invoice ib"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="text-center p-0 m-0">
                                            <i class="fas fa-check-circle"></i><br>
                                            Bills paid
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <p class="pb">{{$count_bill_check}} Bill</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <a href="{{ url('mybill-check') }}"><i class="fas fa-file-invoice ib"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (auth()->user()->levels=="Admin" || auth()->user()->levels=="PLN" || auth()->user()->levels=="Bank")
        <div class="row mb-sm-4">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h5 class="text-white text-center m-0">Clients</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-sm-2">
                            <div class="col-sm col-md">
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
                            <div class="col-sm">
                                <form action="/client" method="get">
                                    <div class=" input-group">
                                        <input name="search" type="search" class="form-control" placeholder="Search Name ..." aria-label="Search Name ..." aria-describedby="basic-addon2">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Group</th>
                                    @if (auth()->user()->levels=="PLN")
                                    <th scope="col">Tools</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($daya=='0')
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <i class="fas fa-sad-tear"></i> {{$daya}} User | 404 NOT FOUND
                                    </td>
                                </tr>
                                @endif
                                @foreach ( $data_pelanggan as $d )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->nama_depan}} {{$d->nama_belakang}}</td>
                                    <td>{{$d->golongan}} VA</td>
                                    @if (auth()->user()->levels=="PLN")
                                    <td>
                                        <a href="/daya/{{ $d->id }}/edit" class="badge badge-success py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Edit">Change</a>
                                        <a href="/daya/{{ $d->id }}/destroy" class="badge badge-danger py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this data ?')">Delete</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row mb-sm-4">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h5 class="text-white text-center m-0">List of rates for each group</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm col-md">
                                <div class="dataTable_length" id="dataTable_length">
                                    <label for="select">
                                        <span>Show </span>
                                        <select name="dataTable_length" id="select" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="default" hidden>. . .</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm col-md">
                                @if (auth()->user()->levels=="PLN")
                                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Add User
                                </button>
                                @endif
                            </div>
                        </div>
                        <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Price/KWH</th>
                                    @if (auth()->user()->levels=="PLN")
                                    <th scope="col">Tools</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $daya as $d )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->golongan}} VA</td>
                                    <td>
                                        <p class="float-right m-0 p-0">Rp {{$d->tarif}}</p>
                                    </td>
                                    @if (auth()->user()->levels=="PLN")
                                    <td>
                                        <a href="/daya/{{ $d->id }}/edit"
                                            class="badge badge-success py-2 px-1">Change</a>
                                        <a href="/daya/{{ $d->id }}/destroy"
                                            class="badge badge-danger py-2 px-1">Delete</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-center">Coba Total</td>
                                    <td>
                                        <p class="float-right m-0 p-0">Rp {{$sum_daya}}</p>
                                    </td>
                                    @if (auth()->user()->levels=="PLN")
                                    <td>
                                        <a href="#" class="badge badge-info py-sm-2 px-sm-2 w-100">
                                            Details
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow h-100">
                    <div class="card-header bg-dark">
                        <h5 class="text-white text-center m-0">Payment available</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm col-md">
                                <div class="dataTable_length" id="dataTable_length">
                                    <label for="select">
                                        <span>Show </span>
                                        <select name="dataTable_length" id="select" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="default" hidden>. . .</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm col-md">
                                @if (auth()->user()->levels=="PLN")
                                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Add User
                                </button>
                                @endif
                            </div>
                        </div>
                        <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Chat</th>
                                    @if (auth()->user()->levels=="PLN")
                                    <th scope="col">Tools</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($count_bank=='0')
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <i class="fas fa-sad-tear"></i> {{$count_bank}} User | 404 NOT FOUND
                                    </td>
                                </tr>
                                @endif
                                @foreach ( $users_bank as $d )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>
                                        <a href="/chat-bank" class="badge badge-success py-sm-2 px-sm-2"
                                            data-toggle="tooltip" data-placement="bottom" title="Send a Message">
                                            <i class="fas fa-comment"></i>
                                        </a>
                                    </td>
                                    @if (auth()->user()->levels=="PLN")
                                    <td>
                                        <a href="/user/{{ $d->id }}/edit" class="badge badge-success py-sm-2 px-sm-2"
                                            data-toggle="tooltip" data-placement="bottom" title="Delete">Change</a>
                                        <a href="/user/{{ $d->id }}/destroy" class="badge badge-danger py-sm-2 px-sm-2"
                                            data-toggle="tooltip" data-placement="bottom" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this user account ?')">Delete</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @if ($count_bank=='1' || $count_bank=='2' || $count_bank=='3')
                                <tr>
                                    <td colspan="5" class="text-center h-100 py-sm-5">
                                        <i class="fas fa-laugh-wink"></i> {{$count_bank}} Bank Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-sm-4">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-body">
                        <iframe class="svg" border="0" marginwidth="0" marginheight="0" src="https://www.mapquest.com/embed/indonesia-282934964?center=-0.7365999999999959,113.48500099999998&zoom=5&maptype=map"></iframe>
                    </div>
                    <div class="card-footer border-dark bg-dark">
                        <p class="text-center text-white font-weight-bold m-0 p-0">Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
