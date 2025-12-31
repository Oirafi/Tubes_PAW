@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<section class="admin-wrapper">

    <div class="admin-header between">
        <h1>Edit Laporan Temuan</h1>
        <a href="{{ route('admin.laporan-temuan.index') }}" class="btn-secondary">← Kembali</a>
    </div>

    <div class="admin-card">

        <form action="{{ route('admin.laporan-temuan.update', $temuan->id) }}" method="POST" enctype="multipart/form-data" class="admin-form">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $temuan->nama_barang }}" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" value="{{ $temuan->kategori }}" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Lokasi Ditemukan</label>
                    <input type="text" name="lokasi_ditemukan" value="{{ $temuan->lokasi_ditemukan }}" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Ditemukan</label>
                    <input type="date" name="tanggal_ditemukan" value="{{ $temuan->tanggal_ditemukan }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="3">{{ $temuan->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto Barang (Opsional)</label>
                
                @if($temuan->foto)
                    <p>Foto saat ini:</p>
                    <img src="{{ asset('storage/'.$temuan->foto) }}" width="150" style="border-radius: 10px; margin-bottom:10px;">
                @endif

                <input type="file" name="foto" accept="image/*">
            </div>

            <button class="btn-primary" style="margin-top: 10px;">
                Simpan Perubahan
            </button>

        </form>
    </div>

</section>
@endsection