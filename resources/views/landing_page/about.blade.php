@extends('layouts.navbar')
@section('title', 'About')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/landing/about.css')}}">
<section class="page-section">
    <div class="row">
        <div class="coll d-flex justify-content-center align-items-center">
            <img src="{{asset ('/assets/img/tower.jpg')}}" alt="">
        </div>
        <div class="coll d-flex justify-content-center align-items-center">
            <center>
                <h3 class="text-dark">Visi</h3>
                <p>Selalu menjadi yang dapat bermanfaat bagi semua.</p>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="coll d-flex justify-content-center align-items-center px-5">
            <div class="d-block px-3">
                <center>
                    <h3 class="text-dark mb-3">Misi</h3>
                </center>
                <ul>
                    <li>
                        <p align="justify">Menjalankan bisnis kelistrikan, berorientasi pada kepuasan pelanggan.</p>
                    </li>
                    <li>
                        <p align="justify">Menjadikan sumber daya listrik suatu kebutuhan utama dalam kehidupan masyarakat.</p>
                    </li>
                    <li>
                        <p align="justify">Berusaha membuat sumber daya listik yang dapat mendorong kegiatan ekonomi nasional.</p>
                    </li>
                </ul>

            </div>
        </div>
        <div class="coll d-flex justify-content-center align-items-center">
            <img src="{{asset ('/assets/img/posko.jpg')}}" alt="">
        </div>
    </div>
</section>
@endsection
