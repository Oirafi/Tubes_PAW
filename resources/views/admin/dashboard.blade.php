@extends('layouts.app')

@section('content')
<div class="admin-container">

    <h1> Dashboard Admin</h1>
    <p>Selamat datang, {{ Auth::user()->name }} 👋</p>

    {{-- ======= STATISTIK KARTU ======= --}}
    <div class="stat-grid">
        <div class="stat-card">
            <h3>{{ $totalTemuan }}</h3>
            <p>Laporan Temuan</p>
        </div>

        <div class="stat-card">
            <h3>{{ $totalKehilangan }}</h3>
            <p>Laporan Kehilangan</p>
        </div>

        <div class="stat-card">
            <h3>{{ $totalUser }}</h3>
            <p>Total Pengguna</p>
        </div>
    </div>

    {{-- ======= GRAFIK ======= --}}
    <h2 style="margin-top: 40px;">Grafik Statistik Laporan</h2>
    <canvas id="chartLaporan"></canvas>

</div>

{{-- CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartLaporan');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jumlah Temuan', 'Jumlah Kehilangan', 'Jumlah Pengguna'],
        datasets: [{
            label: 'Jumlah Data',
            data: [{{ $totalTemuan }}, {{ $totalKehilangan }}, {{ $totalUser }}],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

@endsection
