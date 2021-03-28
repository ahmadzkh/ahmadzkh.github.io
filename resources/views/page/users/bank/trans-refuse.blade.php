@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/bank/trans.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <h5 class="text-white text-center m-0">Payments</h5>
            </div>
            <div class="card-body">
                <div class="row mb-sm-4">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h6 class="text-white text-center m-0">Paid <i class="fas fa-bell"></i></h6>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-sm-5 pl-sm-5">
                                        <pre>ID PLN    :    {{$bill->id_pln}}</pre>
                                        <pre>Name      :    {{$bill->nama}}</pre>
                                        <pre>Group     :    {{$bill->golongan}}</pre>
                                        <pre>Price     :    Rp <?= number_format($bill->price,2,',','.'); ?></pre>
                                        <pre>REF       :    <?php $ref_new = strtoupper(Str::random(30)); echo $ref_new; ?></pre>
                                    </div>
                                    <div class="col-sm-5">
                                        <pre>ID Bill        :   {{$bill->id_bill}}</pre>
                                        <pre>Date           :   {{$bill->updated_at}}</pre>
                                        <pre>Month/Years    :   {{$bill->bulan}}/{{$bill->tahun}}</pre>
                                        <pre>Stand Meter    :   <?= str_pad($bill->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($bill->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                        <pre>Bank           :   {{$bill->bank}}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/trans/{{$bill->id}}/refusenow" method="POST" class="py-sm-3">
                    {{csrf_field()}}
                    <input type="text" name="nama" class="form-control" id="nama" value="{{$bill->nama}}" hidden>
                    <input type="text" name="id_pln" class="form-control" id="id_pln" value="{{$bill->id_pln}}" hidden>
                    <input type="text" name="id_bill" class="form-control" id="id_bill" value="{{$bill->id_bill}}" hidden>
                    <input type="text" name="golongan" class="form-control" id="golongan" value="{{$bill->golongan}}" hidden>
                    <input type="text" name="updated_at" class="form-control" id="updated_at" value="{{$bill->updated_at}}" hidden>
                    <input type="text" name="bulan" class="form-control" id="bulan" value="{{$bill->bulan}}" hidden>
                    <input type="text" name="tahun" class="form-control" id="tahun" value="{{$bill->tahun}}" hidden>
                    <input type="text" name="first_meter" class="form-control" id="first_meter" value="{{$bill->first_meter}}" hidden>
                    <input type="text" name="last_meter" class="form-control" id="last_meter" value="{{$bill->last_meter}}" hidden>
                    <input type="text" name="price" class="form-control" id="price" value="{{$bill->price}}" hidden>
                    <input type="text" name="bank" class="form-control" id="bank" value="" hidden>
                    <input type="text" name="checked" class="form-control" id="checked" value="0" hidden>
                    <button type="submit" class="btn btn-danger float-right" onclick="return confirm('Are you sure you want to rejected this transaction ?')"><i class="fas fa-check-circle" ></i> Refuse</button>
                    <a href="{{ url('/trans') }}" class="btn btn-secondary float-right mr-sm-2">Back</a>
                </form>
            </div>
            <div class="card-footer bg-dark text-white text-center">
                <div class="small">Copyright © PyTricity 2020</div>
            </div>
        </div>
    </div>
</section>
@endsection