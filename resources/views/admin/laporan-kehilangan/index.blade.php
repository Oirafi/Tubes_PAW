@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<section class="admin-wrapper">
    <div class="admin-header">
        <h1>Data Laporan Kehilangan Pengguna</h1>
        <p>Semua laporan yang dikirim oleh penumpang TransBanyumas</p>
    </div>

            <div class="admin-card">
                <table class="admin-table">
                    <thead>
                        <div class="filter-box">
            <form method="GET" class="filter-form">

                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <select name="kategori">
                    <option value="">Semua Kategori</option>
                    <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Dokumen" {{ request('kategori') == 'Dokumen' ? 'selected' : '' }}>Dokumen</option>
                    <option value="Tas" {{ request('kategori') == 'Tas' ? 'selected' : '' }}>Tas</option>
                    <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>

                <select name="sort">
                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                </select>

                <button type="submit" class="btn-small">Filter</button>
                <a href="{{ route('admin.laporan-kehilangan.index') }}" class="btn-small reset">Reset</a>
            </form>
        </div>

                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal Kehilangan</th>
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
                    <td>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>

                    <td>
                    <span class="badge
                        @if($item->status == 'menunggu') badge-warning
                        @elseif($item->status == 'ditolak') badge-danger
                        @elseif($item->status == 'selesai') badge-success
                        @else badge-secondary
                        @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>


                    <td>
                        <a href="{{ route('admin.laporan-kehilangan.show', $item->id) }}" class="btn-small">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty">Belum ada laporan kehilangan.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</section>
@endsection
