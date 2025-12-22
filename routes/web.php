<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanKehilanganController;

/* =====================
   LANDING
===================== */
Route::get('/', function () {
    return view('beranda');
})->name('home');

/* =====================
   AUTH
===================== */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* =====================
   LAPOR KEHILANGAN (WAJIB LOGIN)
===================== */
Route::middleware('auth')->group(function () {

    Route::get('/lapor-kehilangan',
        [LaporanKehilanganController::class, 'create']
    )->name('lapor.kehilangan');

    Route::post('/lapor-kehilangan',
        [LaporanKehilanganController::class, 'store']
    )->name('lapor.kehilangan.store');

    // STATUS RIWAYAT
    Route::get('/status-laporan', [LaporanKehilanganController::class, 'status'])
        ->name('lapor.status');

    // DETAIL LAPORAN
    Route::get('/laporan/{id}', [LaporanKehilanganController::class, 'show'])
    ->middleware('auth')
    ->name('lapor.detail');


});
