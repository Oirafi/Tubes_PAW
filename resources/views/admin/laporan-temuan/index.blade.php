@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<section class="admin-wrapper">
    <div class="admin-header">
        <h1>Daftar Laporan Temuan</h1>

        <a href="{{ route('admin.laporan-temuan.create') }}" class="btn-primary">
            + Tambah Temuan
        </a>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($temuan as $item)
                    <tr>
                        <td>{{ $item->kode_temuan }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->lokasi_ditemukan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_ditemukan)->format('d M Y') }}</td>

                        <td class="aksi">
                            <a href="{{ route('admin.laporan-temuan.show', $item->id) }}" class="btn-small">Detail</a>
                            <a href="{{ route('admin.laporan-temuan.edit', $item->id) }}" class="btn-small warning">Edit</a>

                            <form action="{{ route('admin.laporan-temuan.destroy', $item->id) }}" 
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small danger" onclick="return confirm('Hapus laporan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada laporan temuan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection