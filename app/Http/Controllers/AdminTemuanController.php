<?php

namespace App\Http\Controllers;

use App\Models\LaporanTemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTemuanController extends Controller
{
    public function index()
    {
        $temuan = LaporanTemuan::latest()->get();
        return view('admin.laporan-temuan.index', compact('temuan'));
    }

    public function create()
    {
        return view('admin.laporan-temuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi_ditemukan' => 'required',
            'tanggal_ditemukan' => 'required|date',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('temuan', 'public');
        }

        LaporanTemuan::create([
            'kode_temuan' => 'TM-' . strtoupper(Str::random(6)),
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi_ditemukan' => $request->lokasi_ditemukan,
            'tanggal_ditemukan' => $request->tanggal_ditemukan,
            'foto' => $fotoPath,
        ]);

        return redirect('/admin/laporan-temuan')->with('success', 'Laporan temuan berhasil ditambahkan');
    }

    public function show($id)
{
    $temuan = LaporanTemuan::findOrFail($id);

    return view('admin.laporan-temuan.show', compact('temuan'));
}

    }