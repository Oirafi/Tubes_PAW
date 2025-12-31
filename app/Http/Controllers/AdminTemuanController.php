<?php

namespace App\Http\Controllers;

use App\Models\LaporanTemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTemuanController extends Controller
{
    /* =========================
       LIST DATA
    ========================== */
    public function index()
    {
        $temuan = LaporanTemuan::latest()->get();
        return view('admin.laporan-temuan.index', compact('temuan'));
    }

    /* =========================
       FORM TAMBAH DATA
    ========================== */
    public function create()
    {
        return view('admin.laporan-temuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'       => 'required',
            'kategori'          => 'required',
            'lokasi_ditemukan'  => 'required',
            'tanggal_ditemukan' => 'required|date',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fotoPath = $request->hasFile('foto')
            ? $request->file('foto')->store('temuan', 'public')
            : null;

        LaporanTemuan::create([
            'kode_temuan'       => 'TM-' . strtoupper(Str::random(6)),
            'nama_barang'       => $request->nama_barang,
            'kategori'          => $request->kategori,
            'deskripsi'         => $request->deskripsi,
            'lokasi_ditemukan'  => $request->lokasi_ditemukan,
            'tanggal_ditemukan' => $request->tanggal_ditemukan,
            'foto'              => $fotoPath,
        ]);

        return redirect()->route('admin.laporan-temuan.index')
            ->with('success', 'Laporan temuan berhasil ditambahkan.');
    }

    /* =========================
       DETAIL DATA
    ========================== */
    public function show($id)
    {
        $temuan = LaporanTemuan::findOrFail($id);
        return view('admin.laporan-temuan.show', compact('temuan'));
    }

    /* =========================
       EDIT & UPDATE
    ========================== */
    public function edit($id)
    {
        $temuan = LaporanTemuan::findOrFail($id);
        return view('admin.laporan-temuan.edit', compact('temuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'       => 'required',
            'kategori'          => 'required',
            'lokasi_ditemukan'  => 'required',
            'tanggal_ditemukan' => 'required|date',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $temuan = LaporanTemuan::findOrFail($id);

        if ($request->hasFile('foto')) {
            // hapus foto jika ada
            if ($temuan->foto && file_exists(storage_path('app/public/'.$temuan->foto))) {
                unlink(storage_path('app/public/'.$temuan->foto));
            }
            $temuan->foto = $request->file('foto')->store('temuan', 'public');
        }

        // update data lain
        $temuan->update($request->except('foto'));

        return redirect()->route('admin.laporan-temuan.index')
            ->with('success', 'Laporan temuan berhasil diperbarui.');
    }

    /* =========================
       DELETE DATA
    ========================== */
    public function destroy($id)
    {
        $temuan = LaporanTemuan::findOrFail($id);

        if ($temuan->foto && file_exists(storage_path('app/public/'.$temuan->foto))) {
            unlink(storage_path('app/public/'.$temuan->foto));
        }

        $temuan->delete();

        return redirect()->route('admin.laporan-temuan.index')
            ->with('success', 'Laporan temuan berhasil dihapus.');
    }
}