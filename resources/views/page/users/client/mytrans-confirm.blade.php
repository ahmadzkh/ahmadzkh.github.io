@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mytrans-c.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <h5 class="text-white text-center m-0">My Transaction</h5>
            </div>
            <div class="card-body">
                <div class="card">
                        <div class="card-header pb-sm-0">
                            <div class="row justify-content-between">
                                <div class="col-sm-5 text-center else">
                                    <a href="/mytrans" class="text-decoration-none">Checkout</a>
                                </div>
                                <div class="col-sm-5 text-center active">
                                    <a href="{{ route('mytrans.confirm') }}" class="text-decoration-none">Confirmed</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                            <div class="row justify-content-between">
                                @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <a href="" class="text-decoration-none">&times;</a>
                                        </button>
                                    </div>
                                    {{session('success')}}
                                </div>
                                @endif
                                @if ($count_bill_confirm=='0')
                                <div class="col-sm text-center">
                                    <i class="fas fa-sad-tear"></i> {{$count_bill_confirm}} | 404 NOT FOUND
                                </div>
                                @endif
                                @if ($count_bill_confirm=='1')
                                @foreach ( $bill_confirm as $confirm )
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h6 class="text-white text-center m-0"><i class="fas fa-check-circle"></i> Confirmed</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <pre>ID PLN    :    {{$confirm->id_pln}}</pre>
                                                    <pre>Name      :    {{$confirm->nama}}</pre>
                                                    <pre>Group     :    {{$confirm->golongan}}</pre>
                                                    <pre>Price     :    Rp <?= number_format($confirm->price,2,',','.'); ?></pre>
                                                    <pre>REF       :    {{$confirm->refer}}</pre>
                                                </div>
                                                <div class="col-sm">
                                                    <pre>ID Bill        :   {{$confirm->id_bill}}</pre>
                                                    <pre>Date           :   {{$confirm->updated_at}}</pre>
                                                    <pre>Month/Years    :   {{$confirm->bulan}}/{{$confirm->tahun}}</pre>
                                                    <pre>Stand Meter    :   <?= str_pad($confirm->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($confirm->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                                </div>
                                            </div>
                                            <pre class="text-center py-sm-3">Thank you for your transaction at PyTricity.</pre>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if ($count_bill_confirm!='1')
                                    @foreach ( $bill_confirm as $confirm )
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h6 class="text-white text-center m-0"><i class="fas fa-check-circle"></i> Confirmed</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <pre>ID PLN         :   {{$confirm->id_pln}}</pre>
                                                    <pre>Name           :   {{$confirm->nama}}</pre>
                                                    <pre>Group          :   {{$confirm->golongan}}</pre>
                                                    <pre>Price          :   Rp <?= number_format($confirm->price,2,',','.'); ?></pre>
                                                    <pre>REF            :   {{$confirm->refer}}</pre>
                                                    <pre>ID Bill        :   {{$confirm->id_bill}}</pre>
                                                    <pre>Date           :   {{$confirm->updated_at}}</pre>
                                                    <pre>Month/Years    :   {{$confirm->bulan}}/{{$confirm->tahun}}</pre>
                                                    <pre>Stand Meter    :   <?= str_pad($confirm->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($confirm->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="card-footer bg-dark text-white">
                <div class="small text-center">Copyright © PyTricity 2020</div>
            </div>
        </div>
    </div>
</section>
@endsection
