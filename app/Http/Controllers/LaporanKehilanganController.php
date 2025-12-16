<?php

namespace App\Http\Controllers;

use App\Models\LaporanKehilangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanKehilanganController extends Controller
{
    // tampilkan form
    public function create()
    {
        return view('laporan-kehilangan');
    }

    // simpan laporan
    public function store(Request $request)
    {
        $request->validate([
            'nama_item' => 'required|string',
            'kategori_item' => 'required|string',
            'deskripsi_barang' => 'required|min:20',
            'kronologi_kejadian' => 'required|min:30',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('laporan', 'public');
        }

        LaporanKehilangan::create([
            'user_id' => Auth::id(),
            'nama_pelapor' => Auth::user()->name,
            'no_telepon' => Auth::user()->no_telepon ?? '-',
            'email' => Auth::user()->email,

            'nama_item' => $request->nama_item,
            'kategori_item' => $request->kategori_item,
            'deskripsi_barang' => $request->deskripsi_barang,
            'kronologi_kejadian' => $request->kronologi_kejadian,
            'foto' => $fotoPath,
            'status' => 'Terkirim',
        ]);

        return redirect()->route('laporan.riwayat')
                         ->with('success', 'Laporan kehilangan berhasil dikirim.');
    }

    // riwayat laporan user
    public function riwayat()
    {
        $laporan = LaporanKehilangan::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('riwayat-laporan', compact('laporan'));
    }
}
