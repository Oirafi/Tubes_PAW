@extends('layouts.app')
@section('title','Profil Saya')

@section('content')
<div style="max-width:600px;margin:30px auto;background:white;padding:25px;border-radius:15px;box-shadow:0 0 10px rgba(0,0,0,0.1);">

    <h2>👤 Profil Saya</h2>

    {{-- Avatar Otomatis --}}
    <div style="text-align:center;margin-bottom:20px;">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=120"
             style="border-radius:50%;width:120px;height:120px;border:4px solid #eee;">
        <p style="margin-top:10px;color:#666;">Avatar otomatis</p>
    </div>

    @if(session('success'))
        <p style="background:#E3F2FD;padding:10px;border-radius:8px;color:#0D47A1;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Form Update Profil --}}
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <label>Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" style="width:100%;padding:10px;margin-bottom:10px;">

        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" style="width:100%;padding:10px;margin-bottom:10px;">

        <button style="width:100%;background:#1E88E5;color:white;padding:10px;border:none;border-radius:8px;">
            💾 Simpan Perubahan
        </button>
    </form>

    <hr style="margin:25px 0;">

    {{-- Hapus Akun --}}
    <form action="{{ route('profile.destroy') }}" method="POST" 
          onsubmit="return confirm('Yakin ingin menghapus akun?')">
        @csrf @method('DELETE')

        <label>Password Konfirmasi</label>
        <input type="password" name="password" placeholder="Masukkan password"
               style="width:100%;padding:10px;margin-bottom:10px;">

        <button style="width:100%;background:#E53935;color:white;padding:10px;border:none;border-radius:8px;">
            ❌ Hapus Akun
        </button>
    </form>
</div>
@endsection
