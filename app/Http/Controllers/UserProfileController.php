<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /** Halaman Profil */
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    /** Update Profil */
    public function update(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ]);

        $user = Auth::user();
        
        // update tanpa mengubah controller bawaan
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
