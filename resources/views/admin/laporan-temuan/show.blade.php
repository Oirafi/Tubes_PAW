@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<section class="admin-wrapper">
    <div class="admin-header between">
        <h1>Detail Laporan Temuan</h1>
        <a href="{{ route('admin.temuan.index') }}" class="btn-secondary">
    ← Kembali
</a>

    </div>

    <div class="admin-card detail-card">
        <div class="detail-grid">

            {{-- INFORMASI --}}
            <div class="detail-info">
                <div class="detail-item">
                    <span>Kode Temuan</span>
                    <strong>{{ $temuan->kode_temuan }}</strong>
                </div>

                <div class="detail-item">
                    <span>Nama Barang</span>
                    <strong>{{ $temuan->nama_barang }}</strong>
                </div>

                <div class="detail-item">
                    <span>Kategori</span>
                    <strong>{{ $temuan->kategori }}</strong>
                </div>

                <div class="detail-item">
                    <span>Lokasi Ditemukan</span>
                    <strong>{{ $temuan->lokasi_ditemukan }}</strong>
                </div>

                <div class="detail-item">
                    <span>Tanggal Ditemukan</span>
                    <strong>{{ \Carbon\Carbon::parse($temuan->tanggal_ditemukan)->format('d M Y') }}</strong>
                </div>

                <div class="detail-item full">
                    <span>Deskripsi</span>
                    <p>{{ $temuan->deskripsi ?? '-' }}</p>
                </div>
            </div>

            {{-- FOTO --}}
            <div class="detail-photo">
                @if ($temuan->foto)
                    <img src="{{ asset('storage/' . $temuan->foto) }}" alt="Foto Temuan">
                @else
                    <div class="no-photo">Tidak ada foto</div>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection
