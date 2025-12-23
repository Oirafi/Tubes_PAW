@extends('layouts.app')

@section('content')
<div class="admin-container">
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="admin-header">
        <h2>Tambah Laporan Temuan</h2>
        <a href="{{ route('admin.laporan-temuan.index') }}" class="btn-secondary">← Kembali</a>
    </div>

    <div class="admin-card">
        <form action="{{ route('admin.laporan-temuan.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" required>
                </div>

                <div class="form-group">
                    <label>Lokasi Ditemukan</label>
                    <input type="text" name="lokasi_ditemukan" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Ditemukan</label>
                    <input type="date" name="tanggal_ditemukan" required>
                </div>

                <div class="form-group full">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4"></textarea>
                </div>

                <div class="form-group full">
                    <label>Foto Barang</label>
                    <input type="file" name="foto">
                </div>
            </div>

            <div class="form-action">
                <button type="submit" class="btn-primary">Simpan Temuan</button>
            </div>
        </form>
    </div>

</div>
@endsection
