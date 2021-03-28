@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mybill.css')}}">
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
                            <div class="card-header bg-warning">
                                <h6 class="text-white text-center m-0"><i class="fas fa-inbox"></i> Unpaid</h6>
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
                                        <pre>Date           :   <?php $dateNow = date("d-m-Y h:i:s a", time()); echo $dateNow; ?></pre>
                                        <pre>Month/Years    :   {{$bill->bulan}}/{{$bill->tahun}}</pre>
                                        <pre>Stand Meter    :   <?= str_pad($bill->first_meter, 8, '0', STR_PAD_LEFT); ?> - <?= str_pad($bill->last_meter, 8, '0', STR_PAD_LEFT); ?></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Chat</th>
                                    @if (auth()->user()->levels=="PLN")
                                    <th scope="col">Tools</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($count_bank=='0')
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <i class="fas fa-sad-tear"></i> {{$count_bank}} User | 404 NOT FOUND
                                    </td>
                                </tr>
                                @endif
                                @foreach ( $users_bank as $d )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>
                                        <a href="/chat-bank" class="badge badge-success py-sm-2 px-sm-2"
                                            data-toggle="tooltip" data-placement="bottom" title="Send a Message">
                                            <i class="fas fa-comment"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if ($count_bank!='0')
                                <tr>
                                    <td colspan="5" class="text-center h-100">
                                        <i class="fas fa-laugh-wink"></i> {{$count_bank}} Bank Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm text-center">
                        <form action="/mybill/{{$bill->id}}/paynow" method="POST" class="py-sm-3">
                        {{csrf_field()}}
                        <label for="bank">Choose Payments</label>
                        <select name="bank" id="bank" class="form-control form-control-sm" required>
                            @foreach ( $users_bank as $b )
                            <option value="" hidden></option>
                            <option value="{{$b->nama}}">{{$b->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{$bill->nama}}" hidden>
                    <input type="text" name="id_pln" class="form-control" id="id_pln" value="{{$bill->id_pln}}" hidden>
                    <input type="text" name="id_bill" class="form-control" id="id_bill" value="{{$bill->id_bill}}" hidden>
                    <input type="text" name="golongan" class="form-control" id="golongan" value="{{$bill->golongan}}" hidden>
                    <input type="text" name="updated_at" class="form-control" id="updated_at" value="<?= $dateNow; ?>" hidden>
                    <input type="text" name="bulan" class="form-control" id="bulan" value="{{$bill->bulan}}" hidden>
                    <input type="text" name="tahun" class="form-control" id="tahun" value="{{$bill->tahun}}" hidden>
                    <input type="text" name="first_meter" class="form-control" id="first_meter" value="{{$bill->first_meter}}" hidden>
                    <input type="text" name="last_meter" class="form-control" id="last_meter" value="{{$bill->last_meter}}" hidden>
                    <input type="text" name="price" class="form-control" id="price" value="{{$bill->price}}" hidden>
                    <input type="text" name="refer" class="form-control" id="refer" value="<?= $ref_new; ?>" hidden>
                    <input type="text" name="checked" class="form-control" id="refer" value="1" hidden>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-dollar-sign"></i> Checkout</button>
                    <a href="{{ url('/mybill') }}" class="btn btn-secondary float-right mr-sm-2">Back</a>
                </form>
            </div>
            <div class="card-footer bg-dark text-white text-center">
                <div class="small">Copyright © PyTricity 2020</div>
            </div>
        </div>
    </div>
</section>
@endsection