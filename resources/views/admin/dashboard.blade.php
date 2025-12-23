@extends('layouts.app')

@section('content')
<div style="padding:40px">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ auth()->user()->name }}</p>

    <ul>
        <li>Kelola Laporan Kehilangan</li>
        <li>Verifikasi Barang</li>
        <li>Manajemen User</li>
    </ul>
</div>
@endsection
