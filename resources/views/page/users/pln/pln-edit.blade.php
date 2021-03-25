@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/plntab.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="font-weight-bold m-sm-0">Edit Client</h2>
            </div>
            <div class="card-body">
                <form action="/client/{{$data_pln->id}}/update" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="nama_depan" class="form-control" id="exampleFormControlInput1" value="{{$data_pln->nama_depan}}" autofocus>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleFormControlInput2">Last Name</label>
                            <input type="text" name="nama_belakang" class="form-control" id="exampleFormControlInput2" value="{{$data_pln->nama_belakang}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput5">Phone Number</label>
                        <input type="text" name="no_telp" class="form-control" id="exampleFormControlInput5" value="{{$data_pln->no_telp}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputGroupFile02">File Image</label>
                        <div class="custom-file">
                            <input type="file" name="avatar" value="crcLogo.png'" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon01">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3">{{$data_pln->alamat}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right" name="submit" onclick="return confirm('Are you sure is the data correct ?')">Update</button>
                    <a href=" {{url('/pln')}}" class="btn btn-secondary float-right mr-sm-2" name="submit">Back</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
