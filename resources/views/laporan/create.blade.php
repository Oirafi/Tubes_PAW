@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endpush

@section('content')
<section class="laporan-wrapper">
    <div class="laporan-card">
        <h2>Laporkan Kehilangan</h2>
        <p class="subtitle">
            Admin akan memeriksa laporan Anda dan menghubungi jika ditemukan
        </p>
@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

        <form method="POST"
              action="{{ route('lapor.kehilangan.store') }}"
              enctype="multipart/form-data"
              class="laporan-form">
            @csrf

            <label>Nama Pelapor</label>
            <input type="text" name="nama_pelapor"
                   value="{{ auth()->user()->name }}" readonly>

            <label>Email</label>
            <input type="email" name="email"
                   value="{{ auth()->user()->email }}" readonly>

            <label>Nomor Telepon</label>
<input
    type="text"
    name="no_telepon"
    required
    inputmode="numeric"
    pattern="[0-9]*"
    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
>

            <label>Nama Item</label>
            <input type="text" name="nama_item" required>

            <label>Kategori Item</label>
            <select name="kategori_item" required>
                <option value="">Pilih kategori</option>
                <option>Elektronik</option>
                <option>Tas</option>
                <option>Dompet</option>
                <option>Dokumen</option>
                <option>Lainnya</option>
            </select>

            <label>Deskripsi Barang</label>
            <textarea name="deskripsi_barang" rows="4" required></textarea>

            <label>Kronologi Kejadian</label>
            <textarea name="kronologi" rows="4" required></textarea>

            <label>Unggah Gambar</label>
            <input type="file" name="foto">

            <button type="submit">
                Unggah Laporan Kehilangan
            </button>
        </form>
    </div>
</section>
@endsection
