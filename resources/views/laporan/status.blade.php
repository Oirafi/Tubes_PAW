@extends('layouts.app')
@section('title', 'Status Riwayat')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/status.css') }}">
@endpush

@section('content')
<section class="status-wrapper">
    <div class="status-card">

        <div class="status-header">
            <div>
                <h2>Status Riwayat</h2>
                <p>Lihat Status Laporan Kehilangan Anda</p>
            </div>

            <form method="GET" class="status-search">
                <select name="sort">
                    <option value="created_at">Tanggal</option>
                    <option value="id">ID</option>
                    <option value="nama_item">Nama Barang</option>
                    <option value="status">Status</option>
                </select>

                <select name="order">
                    <option value="desc">Terbaru</option>
                    <option value="asc">Terlama</option>
                </select>

                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                </select>

                <button type="submit">Filter</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table class="status-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($laporan as $item)
                    <tr>
                        <td>LH-{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>{{ $item->nama_item }}</td>
                        <td>
                            <span class="badge {{ $item->status }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('lapor.detail', $item->id) }}" class="action-btn">🔍</a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">
                            Belum ada laporan
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            Menampilkan {{ $laporan->count() }} laporan
        </div>

    </div>
</section>
@endsection
