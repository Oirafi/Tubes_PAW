<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanKehilanganController;
use App\Http\Controllers\AdminTemuanController;

/* =====================
   PUBLIC
===================== */
Route::get('/', function () {
    return view('beranda');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('tentang');
})->name('tentang');

/* =====================
   AUTH
===================== */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* =====================
   USER (LOGIN WAJIB)
===================== */
Route::middleware('auth')->group(function () {

    Route::get('/lapor-kehilangan', 
        [LaporanKehilanganController::class, 'create']
    )->name('lapor.kehilangan');

    Route::post('/lapor-kehilangan', 
        [LaporanKehilanganController::class, 'store']
    )->name('lapor.kehilangan.store');

    Route::get('/status-laporan', 
        [LaporanKehilanganController::class, 'status']
    )->name('lapor.status');

    Route::get('/laporan/{id}', 
        [LaporanKehilanganController::class, 'show']
    )->name('lapor.detail');
});

/* =====================
   ADMIN (AUTH + ROLE)
===================== */
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // LAPORAN TEMUAN
        Route::get('/laporan-temuan',
            [AdminTemuanController::class, 'index']
        )->name('laporan-temuan.index');

        Route::get('/laporan-temuan/create',
            [AdminTemuanController::class, 'create']
        )->name('laporan-temuan.create');

        Route::post('/laporan-temuan',
            [AdminTemuanController::class, 'store']
        )->name('laporan-temuan.store');

        Route::get('/laporan-temuan/{id}',
            [AdminTemuanController::class, 'show']
        )->name('laporan-temuan.show');
});


