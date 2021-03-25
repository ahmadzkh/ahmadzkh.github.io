@extends('layouts.navbar')
@section('title', 'Try it')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/landing/tryit.css')}}">
<section class="page-section">
    <div class="container p-5">
        <ul>
            <li>
                <h2>Landing Page</h2>
                <ul class="pl-5 ul">
                    <li>
                        <a href="{{url('/')}}" class="text-decoration-none">Home</a>
                    </li>
                    <li>
                        <a href="{{url('/about')}}" class="text-decoration-none">About</a>
                    </li>
                    <li>
                        <a href="{{url('/about')}}" class="text-decoration-none">Service</a>
                    </li>
                    <li>
                        <a href="{{url('/trial')}}" class="text-decoration-none active">Try it</a>
                    </li>
                </ul>
            </li>
            <li>
                <h2>Auth</h2>
                <ul class="pl-5 ul">
                    <li>
                        <a href="{{url('/login')}}" class="text-decoration-none">Login</a>
                    </li>
                    <li>
                        <a href="{{url('/regist')}}" class="text-decoration-none">Regist</a>
                    </li>
                </ul>
            </li>
            <li>
                <h2>Dashboard</h2>
                <ul class="pl-5 ul">
                    <li>
                        <a href="{{url('/dashboard-admin-trial')}}" class="text-decoration-none">Dashboard Admin</a>
                    </li>
                    <li>
                        <a href="{{url('/dashboard-client-trial')}}" class="text-decoration-none">Dashboard Client</a>
                    </li>
                    <li>
                        <a href="{{url('/dashboard-pln-trial')}}" class="text-decoration-none">Dashboard PLN</a>
                    </li>
                    <li>
                        <a href="{{url('/dashboard-bank-trial')}}" class="text-decoration-none">Dashboard Bank</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>
@endsection
