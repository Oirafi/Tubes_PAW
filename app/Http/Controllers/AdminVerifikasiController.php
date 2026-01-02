<?php

namespace App\Http\Controllers;

use App\Models\LaporanKehilangan;
use App\Models\LaporanTemuan;
use Illuminate\Http\Request;

class AdminVerifikasiController extends Controller
{
    /** 📌 LIST VERIFIKASI */
    public function index(Request $request)
    {
        $query = LaporanKehilangan::query();

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 'menunggu'); // default yang belum diverifikasi
        }

        // Sort
        if ($request->sort == 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $laporan = $query->get();

        return view('admin.verifikasi.index', compact('laporan'));
    }


    /** 📌 DETAIL VERIFIKASI & CARI TEMUAN SERUPA */
    public function show($id)
    {
        $kehilangan = LaporanKehilangan::findOrFail($id);

        // Cari temuan yang cocok berdasarkan kategori
        $temuan = LaporanTemuan::where('kategori', $kehilangan->kategori_item)
                                ->where('status', 'belum diambil')
                                ->get();

        return view('admin.verifikasi.show', compact('kehilangan', 'temuan'));
    }


    /** 📌 SETUJUI VERIFIKASI TANPA KONEK KE TEMUAN */
    public function approve($id)
    {
        $laporan = LaporanKehilangan::findOrFail($id);
        $laporan->status = 'selesai';
        $laporan->save();

        return back()->with('success', '✔ Laporan berhasil disetujui!');
    }


    /** 📌 TOLAK VERIFIKASI */
    public function reject($id)
    {
        $laporan = LaporanKehilangan::findOrFail($id);
        $laporan->status = 'ditolak';
        $laporan->save();

        return back()->with('error', '❌ Laporan ditolak.');
    }


    /** 📌 HUBUNGKAN KE TEMUAN */
    public function hubungkan($id, $temuanId)
    {
        $kehilangan = LaporanKehilangan::findOrFail($id);
        $temuan = LaporanTemuan::findOrFail($temuanId);

        // Update status keduanya
        $kehilangan->status = 'selesai';
        $kehilangan->save();

        $temuan->status = 'diklaim';
        $temuan->save();

        return redirect()->route('admin.verifikasi.index')
                         ->with('success', '🎉 Berhasil dihubungkan dengan data temuan!');
    }
}
