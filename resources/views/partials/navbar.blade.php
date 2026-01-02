<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <div class="nav-brand">
            <strong>TemuBarang</strong>
            <small>Oleh TransBanyumas</small>
        </div>
    </div>

    {{-- ================= MENU ================= --}}
    <div class="nav-menu">

        {{-- LINK UMUM --}}
        @auth
            @if(Auth::user()->role === 'admin')
                {{-- ================= ADMIN ================= --}}
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                <a href="{{ url('/admin/laporan-temuan') }}">Laporan Temuan</a>
                <a href="{{ route('lapor.status') }}">Laporan Kehilangan</a>
                <a href="{{ url('/admin/verifikasi') }}">Verifikasi Laporan</a>
                <a href="{{ url('/admin/users') }}">Manajemen Pengguna</a>
            @else
                {{-- ================= USER ================= --}}
                <a href="{{ route('home') }}">Beranda</a>
                
                <div class="nav-item">
                    <button class="dropdown-toggle">Laporkan Kehilangan</button>
                    <div class="nav-dropdown">
                        <a href="{{ route('lapor.kehilangan') }}">Buat Laporan</a>
                        <a href="{{ route('lapor.status') }}">Status Riwayat</a>
                    </div>
                </div>

                <a href="{{ route('tentang') }}">Tentang Kami</a>
                <a href="{{ route('home') }}#faq">Pusat Bantuan</a>
            @endif

        @else
            {{-- PENGUNJUNG --}}
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('tentang') }}">Tentang Kami</a>
            <a href="{{ route('login') }}">Laporkan Kehilangan</a>
            <a href="{{ route('home') }}#faq">Pusat Bantuan</a>
        @endauth
    </div>

    {{-- ================= USER PROFILE (KANAN) ================= --}}
    <div class="nav-right">
        @auth
        <div class="nav-user">

            {{-- TOMBOL PROFIL TANPA AVATAR UI --}}
            <button class="nav-user-btn" id="profileToggle" style="display:flex;align-items:center;gap:8px;">

                {{-- Ikon User --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 20a6 6 0 0 0-12 0"/>
                    <circle cx="12" cy="10" r="4"/>
                </svg>

                <span>{{ Auth::user()->name }}</span>

                {{-- Panah --}}
                <svg class="chevron" width="16" height="16" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>

            {{-- DROPDOWN --}}
            <div class="nav-dropdown" id="profileMenu">
                <a href="{{ route('profile.edit') }}">Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            </div>
        </div>
        @else
            <a href="{{ route('login') }}" class="btn-daftar">Daftar / Masuk</a>
        @endauth
    </div>
</nav>
