<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;

// Jalur ESP32 KIRIM Data Sensor (Method: POST)
Route::post('/sensor/kirim', [SensorController::class, 'store']);

// Jalur ESP32 BACA Status Alat (Method: GET) <--- INI YANG BARU
Route::get('/alat/status', [SensorController::class, 'getActuatorStatus']);
