@extends('layouts.app')

@section('content')
<section class="hero auth-wrapper">
    <div class="auth-container">

        <div class="auth-card">
            <h2>Buat Akun</h2>
            <p class="subtitle">Gabung untuk melaporkan barang hilang</p>

            <form method="POST" action="{{ route('register.post') }}" class="auth-form">
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
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Kata Sandi</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Buat kata sandi"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Konfirmasi Kata Sandi</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi kata sandi"
                        required
                    >
                </div>

                <button type="submit" class="btn-auth">Daftar</button>
            </form>

            <div class="auth-footer">
                Sudah punya akun?
                <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>

    </div>
</section>
@endsection
