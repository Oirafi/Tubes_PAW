@extends('layouts.app')

@section('content')
<section class="hero auth-wrapper">
    <div class="auth-container">

        <div class="auth-card">
            <h2>Masuk</h2>
            <p class="subtitle">Masuk untuk melanjutkan laporan</p>

            <form method="POST" action="{{ route('login.post') }}" class="auth-form">

                @csrf

                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Masukkan nama pengguna"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Kata Sandi</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        required
                    >
                </div>

                <button type="submit" class="btn-auth">Masuk</button>
            </form>

            <div class="auth-footer">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>

    </div>
</section>
@endsection
