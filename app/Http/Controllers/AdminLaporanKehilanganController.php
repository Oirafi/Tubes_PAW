<?php

namespace App\Http\Controllers;

use App\Models\LaporanKehilangan;
use Illuminate\Http\Request;

class AdminLaporanKehilanganController extends Controller
{
    public function show($id)
    {
        $laporan = LaporanKehilangan::findOrFail($id);
        return view('admin.laporan-kehilangan.show', compact('laporan'));
    }

    public function index(Request $request)
{
    $query = \App\Models\LaporanKehilangan::query();

    // FILTER STATUS
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // FILTER KATEGORI
    if ($request->kategori) {
        $query->where('kategori_item', $request->kategori);
    }

    // SORT TANGGAL
    if ($request->sort == 'terlama') {
        $query->orderBy('created_at', 'asc');
    } else {
        $query->orderBy('created_at', 'desc'); // default terbaru
    }

    $laporan = $query->get();

    return view('admin.laporan-kehilangan.index', compact('laporan'));
}

}
