@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mybill.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('bill.result') }}" method="get" class="w-100">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="Input ID PLN ..." aria-label="Input ID PLN ..." value="" aria-describedby="basic-addon2">
                            </div>
                    </div>
                    <div class="col-sm-1 p-0 m-0">
                        <button class="btn btn-outline-primary" type="submit" name="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-sm-4 d-none">
                    @foreach ( $bill as $b )
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <pre class="pbill px-5">ID PLN      : {{$b->id_pln}}</pre>
                                        <pre class="pbill px-5">Name        : {{$b->nama}}</pre>
                                        <pre class="pbill px-5">Group       : {{$b->golongan}}</pre>
                                        <pre class="pbill px-5">Price Bill  : <?php  ?></pre>
                                    </div>
                                    <div class="col-sm">
                                        <pre class="pbill px-5">ID Bill      : {{$b->id_bill}}</pre>
                                        <pre class="pbill px-5">Month/Year   : {{$b->bulan}}</pre>
                                        <pre class="pbill px-5">Stand Meter  : {{$b->first_meter}} - {{$b->last_meter}}</pre>
                                    </div>
                                </div>
                                <p class="text-center pt-3">Electricity Bill</p>
                                <pre class="pbill px-5">Admin Fee   : Rp 2.500,00</pre>
                                <pre class="pbill px-5">Total Price : Rp 102.500,00</pre>
                                <a href="/bill/{{ $b->id }}/edit" class="btn btn-warning text-white mt-3 float-right">Pay Now</a>
                            </div>
                            <div class="card-footer">
                                <div class="small text-center">Copyright © PyTricity 2020</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
