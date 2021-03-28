@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/admin/pytrans.css')}}">
<script src="{{asset ('assets/js/chart-bar.js')}}"></script>
<section class="page-section">
    <div class="container">
        <div class="row mb-sm-3">
            <div class="col-sm">
				<div class="card shadow">
					<div class="card-header bg-dark">
						<h5 class="text-white text-center m-0">All Transaction</h5>
					</div>
					<div class="card-body cont overflow-auto">
                        <div class="row">
                            @if ($count_bill_check=='0')
                                <div class="container justify-content-center align-items-center text-center">
                                    <p><i class="fas fa-sad-tear"></i> {{$count_bill_check}} Bill | 404 NOT FOUND</p>
                                </div>
                            @endif
                            @if ($count_bill_check!='0')
                            @foreach ( $bill_check as $check )
                            <div class="col-sm">
                                <div class="card shadow">
                                    <div class="card-header bg-success">
                                        <h6 class="text-white text-center m-0">Paid <i class="fas fa-bell"></i></h6>
                                    </div>
                                    <div class="card-body">
                                        <pre>ID Bill      : {{$check->id_bill}}</pre>
                                        <pre>ID PLN       : {{$check->id_pln}}</pre>
                                        <pre>Name         : {{$check->nama}}</pre>
                                        <pre>Group        : {{$check->golongan}}</pre>
                                        <pre>Group        : {{$check->bulan}} {{$check->tahun}}</pre>
                                        <pre>Stand Meter  : <?= str_pad($check->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($check->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                        <pre>Price        : Rp <?= number_format($check->price,2,',','.'); ?></pre>
                                        @if (auth()->user()->levels=="Bank")
                                        <a href="/trans/{{$check->id}}/confirm" class="btn btn-outline-primary mt-sm-3 w-100">Confirmation</a>
                                        @endif
                                    </div>  
                                    <div class="card-footer">
                                        <h6 class="text-center small m-0">waiting to be confirmed</h6>
                                    </div>  
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        <div class="small">Copyright © PyTricity 2020</div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</section>
@endsection
