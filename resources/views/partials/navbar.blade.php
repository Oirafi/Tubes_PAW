<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">

        <div class="nav-brand">
            <strong>TemuBarang</strong>
            <small>Oleh TransBanyumas</small>
        </div>
    </div>

    <div class="nav-menu">
        <a href="/">Beranda</a>
        <a href="{{ route('lapor.kehilangan') }}">Laporkan Kehilangan</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Pusat Bantuan</a>
        <a href="{{ route('login') }}" class="btn-daftar">Daftar</a>

    </div>
</nav>

