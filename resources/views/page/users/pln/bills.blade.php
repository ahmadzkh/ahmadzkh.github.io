@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/pln/bills.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="{{ route('bill.result')}}" method="get" class="w-100">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="Input ID PLN ..." aria-label="Input ID PLN ..." value="" aria-describedby="basic-addon2">
                            </div>
                    </div>
                    <div class="col-sm-2 p-0 m-0">
                        <button class="btn btn-outline-primary" type="submit" name="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-sm">
                        @if (auth()->user()->levels=="PLN")
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                            Create Bill
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row text-center px-sm- align-items-center justify-content-around mb-sm-4">
                    <div class="col-sm-4 active">
                        <a href="{{ route('bills.unpaid') }}" class="not text-decoration-none">
                            <p class="p-0 m-0"><i class="fas fa-inbox"></i><br>
                                Unpaid
                            </p>
                        </a>
                    </div>
                    <div class="col-sm-4 else">
                        <a href="{{ route('bills.paid') }}" class="yes text-decoration-none">
                            <p class="p-0 m-0">
                                <i class="fas fa-bell"></i><br>
                                Paid
                            </p>
                        </a>
                    </div>
                    <div class="col-sm-4 elses">
                        <a href="{{ route('bills.confirmed') }}" class="yes text-decoration-none">
                            <p class="p-0 m-0">
                                <i class="fas fa-check-circle"></i><br>
                                Confirmed
                            </p>
                        </a>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <a href="" class="text-decoration-none">&times;</a>
                        </button>
                    </div>
                    {{session('success')}}
                </div>
                @endif
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">ID PLN</th>
                            <th scope="col">Group</th>
                            <th scope="col">Address</th>
                            <th scope="col"><i class="fas fa-inbox"></i></th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($count_client=='0')
                        <tr>
                            <td colspan="7" class="text-center py-sm-5">
                                <i class="fas fa-sad-tear"></i> {{$count_client}} User | 404 NOT FOUND
                            </td>
                        </tr>
                        @endif
                        @foreach ( $clients as $client )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$client->nama_depan}}</td>
                            <td>{{$client->nama_belakang}}</td>
                            <td>{{$client->no_pln}}</td>
                            <td>{{$client->golongan}}</td>
                            <td class="w-25 text-justify">
                                {{$client->kelurahan}}, {{$client->kecamatan}}, {{$client->kota_kab}}, {{$client->alamat}}.
                            </td>
                            <td>{{$count_bills_un}}</td>
                            <td>
                                <a href="/bills/{{ $client->id }}/create" class="badge badge-success py-2 px-1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="fas fa-edit mx-sm-2"></i>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Create New Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bills.post') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama">Client Name</label>
                            <select name="nama" id="nama" class="form-control form-control-sm">
                                <option value="" hidden></option>
                                @foreach ($clients as $client)
                                <option value="{{$client->nama_depan}} {{$client->nama_belakang}}">{{$client->nama_depan}} {{$client->nama_belakang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pln">Client PLN ID</label>
                            <select name="id_pln" id="id_pln" class="form-control form-control-sm">
                                <option value="" hidden></option>
                                @foreach ($clients as $client)
                                <option value="{{$client->no_pln}}">{{$client->no_pln}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Client Phone Number</label>
                            <select name="no_telp" id="no_telp" class="form-control form-control-sm">
                                <option value="" hidden></option>
                                @foreach ($clients as $client)
                                <option value="{{$client->no_telp}}">{{$client->no_telp}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="checked" value="0" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" name="id_bill" value="<?= mt_rand(); ?>" hidden>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="golongan">Power Volt</label>
                                <select name="golongan" id="golongan" class="form-control form-control-sm">
                                    <option hidden>VA</option>
                                    <option value="{{$client->golongan}}" class="bg-primary text-white">{{$client->golongan}}</option>
                                    <option value="R1/450">R1/450</option>
                                    <option value="R1/900">R1/900</option>
                                    <option value="R1/1300">R1/1300</option>
                                    <option value="R1/2200">R1/2200</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1">Month</label>
                                <select name="bulan" class="form-control form-control-sm" id="exampleFormControlSelect1">
                                    <option hidden>None</option>
                                    <option value="JANUARY">January</option>
                                    <option value="FEBRUARY">February</option>
                                    <option value="MARCH">March</option>
                                    <option value="APRIL">April</option>
                                    <option value="MAY">May</option>
                                    <option value="JUNE">June</option>
                                    <option value="JULY">July</option>
                                    <option value="AUGUST">August</option>
                                    <option value="SEPTEMBER">September</option>
                                    <option value="OCTOBER">October</option>
                                    <option value="NOVEMBER">November</option>
                                    <option value="DECEMBER">December</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label for="tahun">Years</label>
                                <input type="text" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="2000" required autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="first">First Stand Meter</label>
                                <input type="text" class="form-control form-control-sm" id="first" placeholder="0" name="first_meter" required autofocus>
                            </div>
                            <div class="form-group col-sm">
                                <label for="last">Last Stand Meter</label>
                                <input type="text" class="form-control form-control-sm" id="last" placeholder="0" name="last_meter" required autofocus>
                            </div>
                            <div class="form-group col-sm">
                                <label for="price">Price</label>
                                <input type="text" class="form-control form-control-sm" id="price" placeholder="0" name="price" required autofocus>
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
