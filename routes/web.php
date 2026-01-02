<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanKehilanganController;
use App\Http\Controllers\AdminTemuanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminLaporanKehilanganController;
use App\Http\Controllers\AdminVerifikasiController;
use App\Http\Controllers\ProfileController;

/* =====================
   PUBLIC
===================== */
Route::get('/', fn() => view('beranda'))->name('home');
Route::get('/tentang-kami', fn() => view('tentang'))->name('tentang');

/* =====================
   AUTH
===================== */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* =====================
   USER & PROFIL (LOGIN WAJIB)
===================== */
Route::middleware('auth')->group(function () {

    /* ===== PROFIL USER ===== */
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* ===== LAPOR KEHILANGAN ===== */
    Route::get('/lapor-kehilangan', [LaporanKehilanganController::class, 'create'])
        ->name('lapor.kehilangan');

    Route::post('/lapor-kehilangan', [LaporanKehilanganController::class, 'store'])
        ->name('lapor.kehilangan.store');

    Route::get('/status-laporan', [LaporanKehilanganController::class, 'status'])
        ->name('lapor.status');

    Route::get('/laporan/{id}', [LaporanKehilanganController::class, 'show'])
        ->name('lapor.detail');
});

/* =====================
   ADMIN PANEL
===================== */
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /* ===== DASHBOARD ===== */
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /* ===== LAPORAN TEMUAN ===== */
        Route::get('/laporan-temuan', [AdminTemuanController::class, 'index'])
            ->name('laporan-temuan.index');

        Route::get('/laporan-temuan/create', [AdminTemuanController::class, 'create'])
            ->name('laporan-temuan.create');

        Route::post('/laporan-temuan', [AdminTemuanController::class, 'store'])
            ->name('laporan-temuan.store');

        Route::get('/laporan-temuan/{id}', [AdminTemuanController::class, 'show'])
            ->name('laporan-temuan.show');

        Route::get('/laporan-temuan/{id}/edit', [AdminTemuanController::class, 'edit'])
            ->name('laporan-temuan.edit');

        Route::put('/laporan-temuan/{id}', [AdminTemuanController::class, 'update'])
            ->name('laporan-temuan.update');

        Route::delete('/laporan-temuan/{id}', [AdminTemuanController::class, 'destroy'])
            ->name('laporan-temuan.destroy');

        /* ===== LAPORAN KEHILANGAN (ADMIN) ===== */
        Route::get('/laporan-kehilangan', [AdminLaporanKehilanganController::class, 'index'])
            ->name('laporan-kehilangan.index');

        Route::get('/laporan-kehilangan/{id}', [AdminLaporanKehilanganController::class, 'show'])
            ->name('laporan-kehilangan.show');

        /* ===== VERIFIKASI LAPORAN ===== */
        Route::get('/verifikasi', [AdminVerifikasiController::class, 'index'])
            ->name('verifikasi.index');

        Route::put('/verifikasi/{id}/approve', [AdminVerifikasiController::class, 'approve'])
            ->name('verifikasi.approve');

        Route::put('/verifikasi/{id}/reject', [AdminVerifikasiController::class, 'reject'])
            ->name('verifikasi.reject');

        /* ===== MANAJEMEN PENGGUNA ===== */
        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users');

        Route::put('/users/{id}/role', [AdminUserController::class, 'updateRole'])
            ->name('users.updateRole');

        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])
            ->name('users.destroy');
    });