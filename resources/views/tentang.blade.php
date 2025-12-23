@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
@endpush

@section('title', 'Tentang Kami')

@section('content')
<section class="hero tentang-wrapper">
    <div class="tentang-container">

        {{-- HERO --}}
        <div class="tentang-hero">
            <h1>Tentang Kami</h1>
            <p>
                TemuBarang adalah sistem informasi Lost & Found resmi milik
                <strong>TransBanyumas</strong> yang membantu penumpang melaporkan
                dan melacak barang hilang atau tertinggal secara mudah dan transparan.
            </p>
        </div>

        {{-- APA ITU --}}
        <div class="tentang-section grid">
            <div>
                <h2>Apa itu TemuBarang?</h2>
                <p>
                    TemuBarang merupakan platform digital yang dirancang untuk
                    memudahkan proses pelaporan barang hilang pada layanan transportasi
                    umum TransBanyumas secara cepat, aman, dan terintegrasi.
                </p>
                <p>
                    Dengan sistem ini, penumpang dapat memantau status laporan secara
                    real-time tanpa harus datang langsung ke kantor layanan.
                </p>
            </div>
            <div>
                <img src="{{ asset('img/bus.webp') }}" alt="Bus TransBanyumas">
            </div>
        </div>

        <div class="tentang-section">
    <h2 class="center">Tujuan Pengembangan</h2>

    <div class="card-grid">

        <div class="card icon-card">
            <div class="icon-wrap blue">
                {{-- REPORT ICON --}}
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M8 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-4H8z" stroke-width="2"/>
                    <path d="M14 4v4h4" stroke-width="2"/>
                </svg>
            </div>
            <h3>Pelaporan Mudah</h3>
            <p>Penumpang dapat melaporkan barang hilang kapan saja secara online.</p>
        </div>

        <div class="card icon-card">
            <div class="icon-wrap green">
                {{-- CHECK ICON --}}
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M20 6L9 17l-5-5" stroke-width="2"/>
                </svg>
            </div>
            <h3>Proses Transparan</h3>
            <p>Status laporan dapat dipantau secara real-time dan jelas.</p>
        </div>

        <div class="card icon-card">
            <div class="icon-wrap orange">
                {{-- USER ICON --}}
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-width="2"/>
                    <circle cx="12" cy="7" r="4" stroke-width="2"/>
                </svg>
            </div>
            <h3>Pelayanan Terintegrasi</h3>
            <p>Terhubung langsung dengan petugas TransBanyumas.</p>
        </div>

    </div>
</div>

        {{-- KEUNGGULAN --}}
        <div class="tentang-section highlight">
            <h2>Kenapa Menggunakan TemuBarang?</h2>
            <ul>
                <li>Mengurangi kehilangan barang yang tidak terlaporkan</li>
                <li>Meningkatkan kepercayaan penumpang</li>
                <li>Mendukung digitalisasi layanan transportasi publik</li>
            </ul>
        </div>

        {{-- PENGELOLA --}}
        <div class="tentang-footer">
            <h2>Dikelola oleh</h2>
            <img src="{{ asset('img/logo-trans.jpg') }}" alt="Trans Banyumas">
            <p>
                TemuBarang dikelola oleh <strong>PT. Banyumas Raya Transportasi</strong>
                sebagai bagian dari komitmen peningkatan kualitas layanan
                transportasi publik di Kabupaten Banyumas.
            </p>
        </div>

    </div>
</section>
@endsection