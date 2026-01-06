<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmingLogController;
use App\Http\Controllers\AuthController;

// --- BAGIAN LOGIN/LOGOUT ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- BAGIAN YANG DIPROTEKSI (HARUS LOGIN DULU) ---
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Jurnal Kegiatan
    Route::get('/kegiatan/baru', [FarmingLogController::class, 'create'])->name('logs.create');
    Route::post('/kegiatan/simpan', [FarmingLogController::class, 'store'])->name('logs.store');

    // Kontrol Alat (Hanya bisa diakses)
    Route::post('/alat/ubah/{id}', [DashboardController::class, 'toggleActuator'])->name('actuator.toggle');
});
