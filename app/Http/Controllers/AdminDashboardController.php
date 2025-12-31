<?php

namespace App\Http\Controllers;

use App\Models\LaporanTemuan;
use App\Models\LaporanKehilangan;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalTemuan'     => LaporanTemuan::count(),
            'totalKehilangan' => LaporanKehilangan::count(),
            'totalUser'       => User::count(),
        ]);
    }
}
