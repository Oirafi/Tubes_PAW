@extends('layouts.app')
@section('title', 'Detail Laporan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/detail-laporan.css') }}">
@endpush

@section('content')
<section class="detail-wrapper">
    <div class="detail-card">

        <div class="detail-header">
            <h2>Detail Laporan Kehilangan</h2>
            <p>Informasi lengkap laporan kehilangan Anda</p>
        </div>

        <div class="detail-grid">

            {{-- KIRI --}}
            <div class="detail-left">

                {{-- Informasi Laporan --}}
                <div class="detail-box">
                    <h3>📄 Informasi Laporan</h3>

                    <div class="info-grid">
                        <div>
                            <small>ID Laporan</small>
                            <strong>LH-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}</strong>
                        </div>

                        <div>
                            <small>Tanggal Laporan</small>
                            <strong>{{ $laporan->created_at->format('d M Y') }}</strong>
                        </div>

                        <div>
                            <small>Status Laporan</small>
                            <span class="badge {{ $laporan->status }}">
                                {{ ucfirst($laporan->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Informasi Barang --}}
                <div class="detail-box">
                    <h3>📦 Informasi Barang</h3>

                    <div class="info-grid">
                        <div>
                            <small>Nama Barang</small>
                            <strong>{{ $laporan->nama_item }}</strong>
                        </div>

                        <div>
                            <small>Kategori</small>
                            <strong>{{ $laporan->kategori_item }}</strong>
                        </div>
                    </div>

                    <div class="info-full">
                        <small>Deskripsi Barang</small>
                        <p>{{ $laporan->deskripsi_barang }}</p>
                    </div>
                </div>

                {{-- Kronologi --}}
                <div class="detail-box">
                    <h3>📍 Kronologi Kehilangan</h3>

                    <div class="info-full highlight">
                        {{ $laporan->kronologi }}
                    </div>
                </div>

                {{-- Kontak Pelapor --}}
                <div class="detail-box">
                    <h3>👤 Kontak Pelapor</h3>

                    <div class="info-grid">
                        <div>
                            <small>Nama</small>
                            <strong>{{ $laporan->nama_pelapor }}</strong>
                        </div>

                        <div>
                            <small>Email</small>
                            <strong>{{ $laporan->email }}</strong>
                        </div>

                        <div>
                            <small>No. Telepon</small>
                            <strong>{{ $laporan->no_telepon }}</strong>
                        </div>
                    </div>
                </div>

            </div>

            {{-- KANAN --}}
            <div class="detail-right">

                {{-- Foto --}}
                <div class="detail-box">
                    <h3>🖼️ Dokumentasi</h3>

                    @if($laporan->foto)
                        <img src="{{ asset('storage/' . $laporan->foto) }}" class="foto-barang">
                    @else
                        <div class="no-photo">
                            Tidak ada foto
                        </div>
                    @endif
                </div>

                {{-- Status --}}
                <div class="detail-box status-box">
                    <h3>Status</h3>

                    <span class="badge {{ $laporan->status }}">
                        {{ ucfirst($laporan->status) }}
                    </span>

                    <p class="status-desc">
                        @if($laporan->status === 'menunggu')
                            Laporan Anda sedang menunggu proses verifikasi.
                        @elseif($laporan->status === 'diproses')
                            Laporan Anda sedang diproses oleh admin.
                        @else
                            Laporan telah selesai diproses.
                        @endif
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
