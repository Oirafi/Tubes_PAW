<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // 📌 Menampilkan halaman profil
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    // 📌 Update nama & email saja (tanpa gambar)
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    // 📌 Hapus akun (jika diperlukan)
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required','current_password']
        ]);

        $user = Auth::user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
