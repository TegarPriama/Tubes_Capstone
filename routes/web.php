<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmingLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Route Dashboard (Halaman Utama)
// Ini yang bikin halaman awal muncul, kalau hilang jadi 404
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. Route Jurnal Kegiatan (Form Tambah Data)
Route::get('/kegiatan/baru', [FarmingLogController::class, 'create'])->name('logs.create');

// 3. Route Simpan Data (Proses Backend)
Route::post('/kegiatan/simpan', [FarmingLogController::class, 'store'])->name('logs.store');

// Route untuk Saklar ON/OFF
Route::post('/alat/ubah/{id}', [DashboardController::class, 'toggleActuator'])->name('actuator.toggle');
