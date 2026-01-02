@extends('layouts.app')

@push('styles')
<style>
.page-title {
    font-size: 26px;
    font-weight: 700;
    margin: 30px 0 15px 60px; /* kiri biar sejajar dengan card */
}

.detail-container {
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    width: 70%;
    margin-left: 60px; /* 🔥 card kiri sejajar judul */
}

.detail-header {
    display: flex;
    justify-content: flex-end;  /* 🔥 tombol kanan */
    margin-bottom: 20px;
}

.btn-kembali {
    background: #e7edff;
    padding: 8px 14px;
    border-radius: 8px;
    color: #2c3e50;
    font-weight: 500;
    text-decoration: none;
    transition: 0.2s;
}
.btn-kembali:hover { background: #d6e3ff; }

/* FOTO */
.foto-barang {
    max-width: 220px;
    border-radius: 10px;
    margin-top: 10px;
    display: block;
    box-shadow: 0 4px 10px rgba(0,0,0,0.10);
}
.no-foto {
    color: #777;
    font-style: italic;
    margin-top: 8px;
    display: block;
}
</style>
@endpush

@section('content')

<h1 class="page-title">Detail Laporan Kehilangan</h1>

<div class="detail-container">

    <div class="detail-header">
        <a href="{{ route('admin.laporan-kehilangan.index') }}" class="btn-kembali">← Kembali</a>
    </div>

    <p><strong>Nama Barang:</strong> {{ $laporan->nama_item }}</p>
    <p><strong>Kategori:</strong> {{ $laporan->kategori_item }}</p>
    <p><strong>Tanggal:</strong> {{ $laporan->created_at->format('d M Y') }}</p>
    <p><strong>Deskripsi Barang:</strong> {{ $laporan->deskripsi_barang }}</p>
    <p><strong>Kronologi:</strong> {{ $laporan->kronologi }}</p>
    <p><strong>Status:</strong>
        @if($laporan->status == 'menunggu')
            <span class="badge badge-pending">Menunggu</span>
        @elseif($laporan->status == 'selesai')
            <span class="badge badge-success">Selesai</span>
        @elseif($laporan->status == 'ditolak')
            <span class="badge badge-rejected">Ditolak</span>
        @endif

    {{-- 🔥 FOTO BARANG --}}
    <p><strong>Foto Barang:</strong></p>
    @if($laporan->foto)
        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Barang" class="foto-barang">
    @else
        <span class="no-foto">Tidak ada foto tersedia</span>
    @endif

</div>
@endsection

