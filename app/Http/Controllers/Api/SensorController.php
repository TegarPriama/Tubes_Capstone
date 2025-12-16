<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\Actuator; // Tambahkan Model Actuator

class SensorController extends Controller
{
    // 1. Fungsi Menerima Data Sensor (Dari ESP32 ke Server)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'air_temperature' => 'required|numeric',
            'air_humidity'    => 'required|numeric',
            'soil_moisture'   => 'required|numeric',
            'soil_ph'         => 'required|numeric',
            'light_intensity' => 'nullable|numeric',
            'nitrogen'        => 'nullable|numeric',
            'phosphorus'      => 'nullable|numeric',
            'potassium'       => 'nullable|numeric',
        ]);

        $sensor = SensorData::create($validated);

        if ($sensor) {
            return response()->json([
                'status' => 'berhasil',
                'message' => 'Data sensor diterima',
                'data' => $sensor
            ], 201);
        } else {
            return response()->json(['status' => 'gagal'], 500);
        }
    }

    // 2. Fungsi Mengirim Status Alat (Dari Server ke ESP32)
    // ESP32 akan akses ini untuk tahu apakah harus nyala/mati
    public function getActuatorStatus()
    {
        $actuators = Actuator::all(['id', 'name', 'is_active']);

        return response()->json([
            'status' => 'berhasil',
            'data' => $actuators
        ], 200);
    }
}
