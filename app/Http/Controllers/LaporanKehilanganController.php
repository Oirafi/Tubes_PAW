<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKehilangan;
use Illuminate\Support\Facades\Auth;

class LaporanKehilanganController extends Controller
{
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor'     => 'required|string|max:255',
            'no_telepon'       => 'required|digits_between:10,15',
            'email'            => 'required|email',
            'nama_item'        => 'required|string|max:255',
            'kategori_item'    => 'required|string',
            'deskripsi_barang' => 'required|string',
            'kronologi'        => 'required|string',
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'no_telepon.required' => 'Nomor telepon wajib diisi',
            'no_telepon.digits_between' => 'Nomor telepon harus berupa angka (10–15 digit)',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('laporan', 'public');
        }

        LaporanKehilangan::create([
            'user_id'          => Auth::id(),
            'nama_pelapor'     => $request->nama_pelapor,
            'no_telepon'       => $request->no_telepon,
            'email'            => $request->email,
            'nama_item'        => $request->nama_item,
            'kategori_item'    => $request->kategori_item,
            'deskripsi_barang' => $request->deskripsi_barang,
            'kronologi'        => $request->kronologi, // ✅ FIX
            'foto'             => $fotoPath,
        ]);

        return redirect()
            ->route('lapor.kehilangan')
            ->with('success', 'Laporan berhasil diunggah');
    }
    public function status(Request $request)
    {
        $query = LaporanKehilangan::where('user_id', Auth::id());

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // SORTING
        $allowedSorts = [
            'id',
            'created_at',
            'nama_item',
            'status'
        ];

        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');

        if (in_array($sort, $allowedSorts)) {
            $query->orderBy($sort, $order);
        }

        $laporan = $query->get();

        return view('laporan.status', compact('laporan'));
    }
    
    public function show($id)
    {
        $laporan = LaporanKehilangan::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    return view('laporan.detail', compact('laporan'));
}



}
