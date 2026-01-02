<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (Auth::id() == $id) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        User::findOrFail($id)->delete();
        return back()->with('success', 'Pengguna berhasil dihapus!');
    }
}
