@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<style>
/* Tombol verifikasi */
.btn-verif {
    background: #4CAF50;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
    transition: 0.2s;
    border: none;
}
.btn-verif:hover { background: #3e8e41; }

.btn-tolak {
    background: #E74C3C;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
    transition: 0.2s;
    border: none;
}
.btn-tolak:hover { background: #c0392b; }
</style>
@endpush

@section('content')
<section class="admin-wrapper">

    <div class="admin-header">
        <h1>Verifikasi Laporan Kehilangan</h1>
        <p>Periksa laporan dari pengguna dan lakukan verifikasi</p>
    </div>

    {{-- FILTER --}}
    <div class="filter-box">
        <form method="GET" class="filter-form">

            <select name="status">
                <option value="">Semua Status</option>
                <option value="menunggu" {{ request('status')=='menunggu'?'selected':'' }}>Menunggu</option>
                <option value="selesai" {{ request('status')=='selesai'?'selected':'' }}>Selesai</option>
                <option value="ditolak" {{ request('status')=='ditolak'?'selected':'' }}>Ditolak</option>
            </select>

            <select name="sort">
                <option value="terbaru" {{ request('sort')=='terbaru'?'selected':'' }}>Terbaru</option>
                <option value="terlama" {{ request('sort')=='terlama'?'selected':'' }}>Terlama</option>
            </select>

            <button type="submit" class="btn-small">Filter</button>
            <a href="{{ route('admin.verifikasi.index') }}" class="btn-small reset">Reset</a>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($laporan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_item }}</td>
                    <td>{{ $item->kategori_item }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>

                    <td>
                        <span class="badge
                            @if($item->status == 'menunggu') badge-warning
                            @elseif($item->status == 'ditolak') badge-danger
                            @else badge-success
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>

                    <td style="display:flex; gap:6px;">
                        @if($item->status == 'menunggu')
                            <form action="{{ route('admin.verifikasi.approve', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn-verif">Verifikasi</button>
                            </form>

                            <form action="{{ route('admin.verifikasi.reject', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn-tolak">Tolak</button>
                            </form>
                        @else
                            <span style="color:#999;font-size:13px;">Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty">Tidak ada laporan untuk diverifikasi.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</section>
@endsection
