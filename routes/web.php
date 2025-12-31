<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanKehilanganController;
use App\Http\Controllers\AdminTemuanController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('beranda'))->name('home');
Route::get('/tentang-kami', fn() => view('tentang'))->name('tentang');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| USER (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/lapor-kehilangan', [LaporanKehilanganController::class, 'create'])
        ->name('lapor.kehilangan');

    Route::post('/lapor-kehilangan', [LaporanKehilanganController::class, 'store'])
        ->name('lapor.kehilangan.store');

    Route::get('/status-laporan', [LaporanKehilanganController::class, 'status'])
        ->name('lapor.status');

    Route::get('/laporan/{id}', [LaporanKehilanganController::class, 'show'])
        ->name('lapor.detail');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH + ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // ========= LAPORAN TEMUAN =========
        Route::get('/laporan-temuan', [AdminTemuanController::class, 'index'])->name('laporan-temuan.index');
        Route::get('/laporan-temuan/create', [AdminTemuanController::class, 'create'])->name('laporan-temuan.create');
        Route::post('/laporan-temuan', [AdminTemuanController::class, 'store'])->name('laporan-temuan.store');
        Route::get('/laporan-temuan/{id}', [AdminTemuanController::class, 'show'])->name('laporan-temuan.show');
        Route::get('/laporan-temuan/{id}/edit', [AdminTemuanController::class, 'edit'])->name('laporan-temuan.edit');
        Route::put('/laporan-temuan/{id}', [AdminTemuanController::class, 'update'])->name('laporan-temuan.update');
        Route::delete('/laporan-temuan/{id}', [AdminTemuanController::class, 'destroy'])->name('laporan-temuan.destroy');

        // ========= MENU TAMBAHAN ADMIN =========
        Route::get('/verifikasi', fn()=> "Halaman Verifikasi Data")
            ->name('verifikasi');

        Route::get('/users', fn()=> "Manajemen Pengguna")
            ->name('users');
});