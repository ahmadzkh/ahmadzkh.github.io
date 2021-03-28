@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/users/client/mybill.css')}}">
<section class="page-section">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('bill.result') }}" method="get" class="w-100">
                            <div class=" input-group">
                                <input name="search" type="search" class="form-control" placeholder="ID PLN" aria-describedby="basic-addon2">
                            </div>
                    </div>
                    <div class="col-sm-1 p-0 m-0">
                        <button class="btn btn-outline-primary" type="submit" name="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="row">
                        <div class="col-sm text-center font-weight-bold">
                            <pre class="pre"><i class="fas fa-sad-tear pre"></i> {{session('message')}}</pre>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
