@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mytrans.css')}}">
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
                                <div class="col-sm-5 text-center active">
                                    <a href="/mytrans" class=" text-decoration-none">Checkout</a>
                                </div>
                                <div class="col-sm-5 text-center else">
                                    <a href="{{ route('mytrans.confirm') }}" class=" text-decoration-none">Confirmed</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
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
                            <div class="row justify-content-between">
                                @if ($count_bill_check=='0')
                                <div class="col-sm text-center">
                                    <i class="fas fa-sad-tear"></i> {{$count_bill_check}} | 404 NOT FOUND
                                </div>
                                @endif
                                @if ($count_bill_check=='1')
                                @foreach ( $bill_check->reverse() as $check )
                                <div class="col-sm">
                                    <div class="card shadow">
                                        <div class="card-header bg-success">
                                            <h6 class="text-white text-center m-0"><i class="fas fa-check-circle"></i> Checked</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center my-sm-2">
                                                <div class="col-sm-5">
                                                    <pre>ID PLN    :    {{$check->id_pln}}</pre>
                                                    <pre>Name      :    {{$check->nama}}</pre>
                                                    <pre>Group     :    {{$check->golongan}}</pre>
                                                    <pre>Price     :    Rp <?= number_format($check->price,2,',','.'); ?></pre>
                                                    <pre>REF       :    {{$check->refer}}</pre>
                                                </div>
                                                <div class="col-sm-5">
                                                    <pre>ID Bill        :   {{$check->id_bill}}</pre>
                                                    <pre>Date           :   {{$check->updated_at}}</pre>
                                                    <pre>Month/Years    :   {{$check->bulan}}/{{$check->tahun}}</pre>
                                                    <pre>Stand Meter    :   <?= str_pad($check->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($check->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                                    <pre>Bank Payment   :   {{$check->bank}}</pre>
                                                </div>
                                            </div>
                                            <pre class="text-center py-sm-3">Thank you for your transaction at PyTricity.</pre>
                                            <div class="row">
                                                <div class="col-sm text-center">
                                                    <a href="/mytrans/download/file/{{$check->bulan}}{{$check->tahun}}" class="btn btn-info w-50"><i class="fas fa-download"></i> Download Bill</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if ($count_bill_check!='1')
                                @foreach ( $bill_check as $check )
                                <div class="col-sm">
                                    <div class="card shadow">
                                        <div class="card-header bg-success">
                                            <h6 class="text-white text-center m-0"><i class="fas fa-check-circle"></i> Checked</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <pre>ID PLN         :   {{$check->id_pln}}</pre>
                                                    <pre>Name           :   {{$check->nama}}</pre>
                                                    <pre>Group          :   {{$check->golongan}}</pre>
                                                    <pre>Price          :   Rp <?= number_format($check->price,2,',','.'); ?></pre>
                                                    <pre>REF            :   {{$check->refer}}</pre>
                                                    <pre>ID Bill        :   {{$check->id_bill}}</pre>
                                                    <pre>Date           :   {{$check->updated_at}}</pre>
                                                    <pre>Month/Years    :   {{$check->bulan}}/{{$check->tahun}}</pre>
                                                    <pre>Stand Meter    :   <?= str_pad($check->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($check->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                                </div>
                                            </div>
                                            <pre class="text-center py-sm-3">Thank you for your transaction at PyTricity.</pre>
                                            <div class="row">
                                                <div class="col-sm text-center">
                                                    <a href="/mytrans/download/file/{{$check->bulan}}{{$check->tahun}}" class="btn btn-info"><i class="fas fa-download"></i> Download Bill</a>
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
