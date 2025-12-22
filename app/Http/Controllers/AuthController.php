<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /* =====================
       SHOW LOGIN PAGE
    ===================== */
    public function showLogin()
    {
        return view('auth.login');
    }

    /* =====================
       SHOW REGISTER PAGE
    ===================== */
    public function showRegister()
    {
        return view('auth.register');
    }

    /* =====================
       REGISTER
    ===================== */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai',
            'password.min' => 'Kata sandi minimal 8 karakter',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // auto login setelah daftar
        Auth::login($user);

        return redirect()->route('home');
    }

    /* =====================
       LOGIN
    ===================== */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // balik ke halaman tujuan (misal lapor-kehilangan)
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'login_error' => 'Nama pengguna atau kata sandi salah',
        ])->withInput();
    }

    /* =====================
       LOGOUT
    ===================== */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
