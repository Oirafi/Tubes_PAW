<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil
     */
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update nama & email
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save(); // ⬅️ IDE PALING SUKA save()

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Hapus akun
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        /** @var User $user */
        $user = Auth::user();

        Auth::logout();
        $user->delete(); // ⬅️ SEKARANG IDE PAHAM

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
