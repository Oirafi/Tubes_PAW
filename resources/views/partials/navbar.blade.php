<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <div class="nav-brand">
            <strong>TemuBarang</strong>
            <small>Oleh TransBanyumas</small>
        </div>
    </div>

    {{-- MENU TENGAH --}}
    <div class="nav-menu">

    <a href="{{ route('home') }}">Beranda</a>
{{-- ================= ADMIN ================= --}}
@auth
    @if(auth()->user()->role === 'admin')

        <a href="{{ url('/admin/dashboard') }}">Dashboard</a>

        <a href="{{ url('/admin/laporan-temuan') }}">
            Laporan Temuan
        </a>

        <a href="{{ route('lapor.status') }}">
            Laporan Kehilangan
        </a>

    @else
        {{-- ================= USER ================= --}}
        <div class="nav-item">
            <button class="dropdown-toggle">
                Laporkan Kehilangan
            </button>

            <div class="nav-dropdown">
                <a href="{{ route('lapor.kehilangan') }}">Buat Laporan</a>
                <a href="{{ route('lapor.status') }}">Status Riwayat</a>
            </div>
        </div>
    @endif
@endauth


    <a href="{{ route('tentang') }}">Tentang Kami</a>
    <a href="{{ route('home') }}#faq">Pusat Bantuan</a>

</div>


    {{-- KANAN --}}
    <div class="nav-right">
        @auth
        <div class="nav-user">
            <button class="nav-user-btn" id="profileToggle">
                <svg class="user-icon" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
                </svg>
                <span>{{ Auth::user()->name }}</span>
                <svg class="chevron" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>

            <div class="nav-dropdown" id="profileMenu">
                <a href="#">Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            </div>
        </div>
        @else
            <a href="{{ route('login') }}" class="btn-daftar">Daftar</a>
        @endauth
    </div>
</nav>
