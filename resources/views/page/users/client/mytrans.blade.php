@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mytrans.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <form action="" method="get" class="w-100">
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
                <div class="row mb-sm-4">
                    @foreach ( $bill as $b )
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5 class="p-0 m-0 text-center"><i class="fas fa-check mr-2"></i>Checked</h5>
                            </div>
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
                                        <pre class="pbill px-5">Month/Year   : {{$b->bulan}}/21</pre>
                                        <pre class="pbill px-5">Stand Meter  : {{$b->first_meter}} - {{$b->last_meter}}</pre>
                                    </div>
                                </div>
                                <p class="text-center pt-3">Electricity Bill</p>
                                <div class="row">
                                    <div class="col-sm">
                                        <pre class="pbill px-5">Admin Fee   : Rp 2.500,00</pre>
                                        <pre class="pbill px-5">Total Price : <?php  ?></pre>
                                    </div>
                                </div>
                                <p class="text-center pt-3">Thank you for making a transaction at PyTricity</p>
                                <div class="row pt-3">
                                    <div class="col-sm">
                                        <pre class="pbill px-5 float-right">Checked : {{$b->updated_at}}</pre>
                                    </div>
                                </div>
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
</section>
@endsection
