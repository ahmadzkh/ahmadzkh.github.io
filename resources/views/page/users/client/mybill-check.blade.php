@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mybill.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <h5 class="text-white text-center m-0">My Bills</h5>
            </div>
            <div class="card-body">
                @if ($count_bill_un=='0')
                <div class="container justify-content-center align-items-center text-center">
                <p><i class="fas fa-sad-tear"></i> {{$count_bill_un}} Bill | 404 NOT FOUND</p>
                </div>
                @endif
                @if ($count_bill_un!='1')
                @foreach ( $bill_un as $un )
                <div class="row mb-sm-3">
                    <div class="col-sm">
                        <div class="card shadow">
                            <div class="card-header bg-warning">
                                <h6 class="text-white text-center m-0"><i class="fas fa-inbox"></i> Unpaid</h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-sm-3 justify-content-center">
                                    <div class="col-sm-5">
                                        <pre>ID PLN    :    {{$un->id_pln}}</pre>
                                        <pre>Name      :    {{$un->nama}}</pre>
                                        <pre>Group     :    {{$un->golongan}}</pre>
                                        <pre>Price     :    Rp <?= number_format($un->price,2,',','.'); ?></pre>
                                    </div>
                                    <div class="col-sm-5">
                                        <pre>ID Bill        :   {{$un->id_bill}}</pre>
                                        <pre>Date           :   <?php $dateNow = date("d-m-Y h:i:s a", time()); echo $dateNow; ?></pre>
                                        <pre>Month/Years    :   {{$un->bulan}}/{{$un->tahun}}</pre>
                                        <pre>Stand Meter    :   <?= str_pad($un->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($un->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-6">
                                        <a href="/mybill/{{$un->id}}/pay" class="btn btn-outline-success w-100"><i class="fas   fa-dollar-sign"></i> Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="card-footer bg-dark text-white text-center">
                <div class="small">Copyright © PyTricity 2020</div>
            </div>
        </div>
    </div>
</section>
@endsection
