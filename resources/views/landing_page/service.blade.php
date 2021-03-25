@extends('layouts.navbar')
@section('title', 'Service')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/landing/service.css')}}">
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase font-weight-bold">Services</h2>
            <h4 class="section-subheading text-muted">Our service provide for you</h4>
        </div>
        <div class="row text-center mt-5">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x service"></i>
                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">E-Commerce</h4>
                <p class="text-muted pr-4 pl-4">An application that makes it easy for you to pay postpaid electricity bills through Online Banking Payment Point (PPOB).</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x service"></i>
                    <i class="fas fa-charging-station fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Electricity</h4>
                <p class="text-muted pr-4 pl-4">Stay active with your family without worrying about power outages.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x service"></i>
                    <i class="fas fa-file-invoice-dollar fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Transaction Security</h4>
                <p class="text-muted pr-4 pl-4">All data on electricity bills that have been paid can be viewed again to protect your account information leakage.</p>
            </div>
        </div>
    </div>
</section>
@endsection
