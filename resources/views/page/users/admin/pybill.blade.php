@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/admin/pybill.css')}}">
<section class="page-section">
    <div class="container">
        <div class="row mb-sm-3">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h5 class="text-center text-white m-0">Bill User</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-sm-3">
                            <div class="col-sm">
                                <div class="card all">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <h6 class="text-danger">All Bills</h6>
												<p class="p">{{$count_bill}} Bills</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <i class="fas fa-copy i"></i>
                                            </div>
                                        </div>
                                        <div class="pb-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card un">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <h6 class="text-warning">Unpaid</h6>
												<p class="p">{{$count_bill_un}} Bills</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <i class="fas fa-inbox i"></i>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card check">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <h6 class="text-success">Paid</h6>
                                                <p class="p">{{$count_bill_check}} Bills</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <i class="fas fa-bell i"></i>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card confirm">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-sm-8">
                                                <h6 class="text-primary">Confirm</h6>
                                                <p class="p">{{$count_bill_confirm}} Bills</p>
                                            </div>
                                            <div class="col-sm d-flex justify-content-center align-items-center">
                                                <i class="fas fa-check-circle i"></i>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-sm-3">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-header bg-warning">
                                        <h5 class="text-white text-center m-0">Unpaid <i class="fas fa-inbox"></i></h5>
                                    </div>
                                    <div class="card-body cont overflow-auto">
                                        <div class="row">
                                            @if ($count_bill_un=='0')
                                                <div class="container justify-content-center align-items-center text-center">
                                                    <p><i class="fas fa-sad-tear"></i> {{$count_bill_un}} Bill | 404 NOT FOUND</p>
                                                </div>
                                            @endif
                                            @if ($count_bill_un!='0')
                                            @foreach ( $bill_un as $un )
                                            <div class="col-sm">
                                                <section>
                                                    <div class="card-body shadow mb-sm-3">
                                                        <pre>ID Bill      : {{$un->id_bill}}</pre>
                                                        <pre>ID PLN       : {{$un->id_pln}}</pre>
                                                        <pre>Name         : {{$un->nama}}</pre>
                                                        <pre>Group        : {{$un->golongan}}</pre>
                                                        <pre>Group        : {{$un->bulan}} {{$un->tahun}}</pre>
                                                        <pre>Stand Meter  : {{$un->first_meter}} - {{$un->last_meter}}</pre>
                                                        <pre>Price        : Rp <?= number_format($un->price,2,',','.'); ?></pre>
                                                    </div>    
                                                </section>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-header bg-success">
                                        <h5 class="text-white text-center m-0">Paid <i class="fas fa-bell"></i></h5>
                                    </div>
                                    <div class="card-body cont overflow-auto">
                                        <div class="row mb-sm-3">
                                            @if ($count_bill_check=='0')
                                                <div class="container justify-content-center align-items-center text-center">
                                                    <p><i class="fas fa-sad-tear"></i> {{$count_bill_check}} Bill | 404 NOT FOUND</p>
                                                </div>
                                            @endif
                                            @if ($count_bill_check!='0')
                                            @foreach ( $bill_check as $check )
                                            <div class="col-sm">
                                                <section>
                                                    <div class="card-body shadow mb-sm-3">
                                                        <pre>ID Bill      : {{$check->id_bill}}</pre>
                                                        <pre>ID PLN       : {{$check->id_pln}}</pre>
                                                        <pre>Name         : {{$check->nama}}</pre>
                                                        <pre>Group        : {{$check->golongan}}</pre>
                                                        <pre>Group        : {{$check->bulan}} {{$check->tahun}}</pre>
                                                        <pre>Stand Meter  : {{$check->first_meter}} - {{$check->last_meter}}</pre>
                                                        <pre>Price        : Rp <?= number_format($check->price,2,',','.'); ?></pre>
                                                    </div>    
                                                </section>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        @if (auth()->user()->levels=="Bank")
                                        <div class="row">
                                            <div class="col-sm">
                                                <a href="/trans/{{$check->id}}/confirm" class="btn btn-outline-primary mt-sm-3 w-100"><i class="fas fa-check-circle" ></i> Confirmation</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="card shadow">
                                    <div class="card-header bg-primary">
                                        <h5 class="text-white text-center m-0">Confirmed <i class="fas fa-check-circle"></i></h5>
                                    </div>
                                    <div class="card-body cont overflow-auto">
                                        <div class="row">
                                            @if ($count_bill_confirm=='0')
                                                <div class="container justify-content-center align-items-center text-center">
                                                    <p><i class="fas fa-sad-tear"></i> {{$count_bill_confirm}} Bill | 404 NOT FOUND</p>
                                                </div>
                                            @endif
                                            @if ($count_bill_confirm!='0')
                                            @foreach ( $bill_confirm as $confirm )
                                            <div class="col-sm">
                                                <section>
                                                    <div class="card-body shadow mb-sm-3">
                                                        <pre>ID Bill      : {{$confirm->id_bill}}</pre>
                                                        <pre>ID PLN       : {{$confirm->id_pln}}</pre>
                                                        <pre>Name         : {{$confirm->nama}}</pre>
                                                        <pre>Group        : {{$confirm->golongan}}</pre>
                                                        <pre>Group        : {{$confirm->bulan}} {{$confirm->tahun}}</pre>
                                                        <pre>Stand Meter  : {{$confirm->first_meter}} - {{$confirm->last_meter}}</pre>
                                                        <pre>Price        : Rp <?= number_format($check->price,2,',','.'); ?></pre>
                                                    </div>    
                                                </section>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        <div class="small">Copyright © PyTricity 2020</div>
                    </div>
                </div>
            </div>
		</div>
        <!-- {{$count_bill_un}}
        {{$count_bill_check}}
        {{$bill_un}}
        {{$bill_check}}
        {{$bill}} -->
    </div>
</section>
@endsection
