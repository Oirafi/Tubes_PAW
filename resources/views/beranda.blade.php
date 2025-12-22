@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="hero">
    <img src="{{ asset('img/logo.png') }}" class="hero-logo" alt="Logo">

    <h1>TemuBarang</h1>

    <p>
        Platform Resmi Pelaporan Kehilangan Barang Untuk Membantu
        Penumpang Menemukan Kembali Barang Yang Hilang Selama
        Perjalanan Menggunakan Layanan Trans Banyumas
    </p>

    <a href="{{ route('lapor.kehilangan') }}" class="btn-primary">
        + Lapor Kehilangan
    </a>
</section>

<!-- STATISTIK -->
<section class="statistik">
    <h2>Data Statistik Laporan</h2>
    <p class="subtext">Laporan Pengguna Platform Pelaporan Kehilangan Barang</p>

    <div class="stat-grid">
        <div>
            <strong>82</strong>
            <span>Laporan Kehilangan</span>
        </div>
        <div>
            <strong>65</strong>
            <span>Barang Diambil Kembali</span>
        </div>
        <div>
            <strong>7</strong>
            <span>Dalam Verifikasi</span>
        </div>
        <div>
            <strong>10</strong>
            <span>Laporan Ditolak</span>
        </div>
    </div>
</section>

<!-- ALUR -->
<section class="alur">
    <h2>Alur Proses Pelaporan</h2>

    <div class="alur-container">
        <div class="alur-step">
            <div class="circle blue">✏️</div>
            <h4>Isi Form Laporan</h4>
            <p>Mengisi detail laporan barang hilang</p>
        </div>

        <div class="alur-line"></div>

        <div class="alur-step">
            <div class="circle yellow">🔄</div>
            <h4>Proses Verifikasi</h4>
            <p>Laporan diverifikasi admin</p>
        </div>

        <div class="alur-line"></div>

        <div class="alur-step">
            <div class="circle red">💬</div>
            <h4>Tindak Lanjut</h4>
            <p>Admin menghubungi pelapor</p>
        </div>

        <div class="alur-line"></div>

        <div class="alur-step">
            <div class="circle green">✅</div>
            <h4>Klaim Barang</h4>
            <p>Pengambilan barang</p>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
    <h2>Sering Ditanyakan ke TemuBarang — FAQs</h2>

    <details>
        <summary>Apa itu layanan Lost & Found Trans Banyumas?</summary>
        <p>
            Layanan resmi dari Trans Banyumas untuk membantu penumpang
            melaporkan dan menemukan kembali barang yang hilang atau tertinggal
            selama menggunakan layanan transportasi.
        </p>
    </details>

    <details>
        <summary>Apa saja yang bisa saya lakukan di layanan ini?</summary>
        <p>
            Anda dapat melaporkan kehilangan barang, memantau status laporan,
            serta menerima informasi apabila barang Anda ditemukan.
        </p>
    </details>

    <details>
        <summary>Bagaimana cara membuat laporan kehilangan?</summary>
        <p>
            Klik menu <strong>Laporkan Kehilangan</strong>, lalu isi formulir
            laporan dengan data yang lengkap dan benar.
        </p>
    </details>

    <details>
        <summary>Apakah laporan saya akan ditindaklanjuti?</summary>
        <p>
            Ya. Setiap laporan yang masuk akan diverifikasi oleh admin
            dan ditindaklanjuti sesuai prosedur yang berlaku.
        </p>
    </details>

    <details>
        <summary>Apakah saya dapat melihat daftar barang temuan di website ini?</summary>
        <p>
            Saat ini daftar barang temuan hanya dapat dilihat setelah login.
            Informasi akan diperbarui secara berkala oleh admin.
        </p>
    </details>

    <details>
        <summary>Berapa lama waktu tindak lanjut laporan?</summary>
        <p>
            Waktu tindak lanjut bervariasi tergantung proses verifikasi,
            namun umumnya dilakukan dalam waktu 1–3 hari kerja.
        </p>
    </details>

    <details>
        <summary>Saya salah memasukkan data laporan. Apa yang harus saya lakukan?</summary>
        <p>
            Anda dapat menghubungi admin melalui Pusat Bantuan
            atau memperbarui data laporan jika fitur edit tersedia.
        </p>
    </details>

    <details>
        <summary>Apakah layanan ini berbayar?</summary>
        <p>
            Tidak. Layanan TemuBarang disediakan secara gratis
            untuk seluruh pengguna Trans Banyumas.
        </p>
    </details>

    <details>
        <summary>Bagaimana saya tahu jika barang saya ditemukan?</summary>
        <p>
            Anda akan menerima notifikasi melalui website atau kontak
            yang Anda cantumkan saat mengisi laporan.
        </p>
    </details>

    <details>
        <summary>Apakah data pribadi saya aman?</summary>
        <p>
            Ya. Data pribadi pengguna dijaga kerahasiaannya dan
            hanya digunakan untuk keperluan proses pelaporan.
        </p>
    </details>

    <!-- FAQ TAMBAHAN -->
    <details>
        <summary>Apakah saya harus memiliki akun untuk membuat laporan?</summary>
        <p>
            Untuk saat ini, beberapa fitur memerlukan akun agar
            Anda dapat memantau status laporan dengan lebih mudah.
        </p>
    </details>

    <details>
        <summary>Di mana saya bisa mengambil barang yang ditemukan?</summary>
        <p>
            Barang yang ditemukan dapat diambil di kantor Trans Banyumas
            sesuai dengan informasi yang diberikan oleh admin.
        </p>
    </details>

    <details>
        <summary>Apakah saya bisa melaporkan barang yang ditemukan?</summary>
        <p>
            Tidak. Anda belum dapat melaporkan barang temuan,
            mungkin kedepannya bisa.
        </p>
    </details>
</section>
@endsection