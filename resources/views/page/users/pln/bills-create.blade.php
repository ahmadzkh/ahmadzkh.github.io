@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/clienttab.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h2 class="font-weight-bold m-sm-0">Bill for '{{$client->nama_depan}} {{$client->nama_belakang}}'</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('bills.post') }}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$client->nama_depan}} {{$client->nama_belakang}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput5">Phone Number</label>
                        <input type="text" name="no_telp" class="form-control" id="exampleFormControlInput5" value="{{$client->no_telp}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput6">ID PLN</label>
                        <input type="text" name="id_pln" class="form-control" id="exampleFormControlInput6" value="{{$client->no_pln}}" >
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="golongan">Power Volt</label>
                            <select name="golongan" id="golongan" class="form-control form-control-sm">
                                <option value="R1/450" @if($client->golongan == 'R1/450') selected @endif>R1/450</option>
                                <option value="R1/900" @if($client->golongan == 'R1/900') selected @endif>R1/900</option>
                                <option value="R1/1300" @if($client->golongan == 'R1/1300') selected @endif>R1/1300</option>
                                <option value="R1/2200" @if($client->golongan == 'R1/2200') selected @endif>R1/2200</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="bulan">Month</label>
                            <select name="bulan" class="form-control form-control-sm" id="bulan">
                                <option hidden>None</option>
                                <option value="JANUARY">January</option>
                                <option value="FEBRUARY">February</option>
                                <option value="MARCH">March</option>
                                <option value="APRIL">April</option>
                                <option value="MAY">May</option>
                                <option value="JUNE">June</option>
                                <option value="JULY">July</option>
                                <option value="AUGUST">August</option>
                                <option value="SEPTEMBER">September</option>
                                <option value="OCTOBER">October</option>
                                <option value="NOVEMBER">November</option>
                                <option value="DECEMBER">December</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                                <label for="tahun">Years</label>
                                <input type="text" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="2000" required autofocus>
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
                            <div class="form-group col-sm">
                                <label for="price">Price</label>
                                <input type="text" class="form-control form-control-sm" id="price" placeholder="0" name="price" required autofocus>
                            </div>
                        </div>
                    <input type="text" name="checked" value="0" hidden>
                    <input type="text" name="id_bill" value="<?= mt_rand(); ?>" hidden>
                    <button type="submit" class="btn btn-primary float-right" name="submit" onclick="return confirm('Are you sure is the data correct ?')">Create</button>
                    <a href="{{ route('back') }}" class="btn btn-secondary float-right mr-sm-2" name="submit">Back</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
