@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/bills.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <form action="{{ route('bill.result')}}" method="get" class="w-100">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="Input ID PLN ..." aria-label="Input ID PLN ..." value="" aria-describedby="basic-addon2">
                            </div>
                    </div>
                    <div class="col-sm-1 p-0 m-0">
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
                <div class="row text-center px-sm- align-items-center justify-content-center mb-sm-4">
                    <div class="col-sm active">
                        <a href="{{ url('bill-not') }}" class="not text-decoration-none">
                            <p class="p-0 m-0"><i class="fas fa-inbox"></i><br>
                                Unpaid bills
                            </p>
                        </a>
                    </div>
                    <div class="col-sm">
                        <a href="{{ url('bill-yes') }}" class="yes text-decoration-none">
                            <p class="p-0 m-0">
                                <i class="fas fa-check-circle"></i><br>
                                Bills paid
                            </p>
                        </a>
                    </div>
                </div>
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
                            <td>{{$count_bills}}</td>
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
                    <form action="/bills/postcreate" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm">
                                <label for="exampleFormControlInput1">First Name</label>
                                <input type="text" name="nama_depan" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Max" autofocus required>
                            </div>
                            <div class="form-group col-sm">
                                <label for="exampleFormControlInput2">Last Name</label>
                                <input type="text" name="nama_belakang" class="form-control form-control-sm" id="exampleFormControlInput2" placeholder="Alexander" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput7">ID PLN</label>
                            <input type="text" name="id_pln" class="form-control form-control-sm" id="exampleFormControlInput7" placeholder="01234567890" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput6">Phone Number</label>
                            <input type="text" name="no_telp" class="form-control form-control-sm" id="exampleFormControlInput6" placeholder="XXXX-XXXX-XXXX" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleFormControlInput3" placeholder="name@example.com" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="checked" value="0" hidden>
                        </div>
                        <div class="row">
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
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1">Month</label>
                                <select name="bulan" class="form-control form-control-sm" id="exampleFormControlSelect1">
                                    <option hidden>None</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
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
