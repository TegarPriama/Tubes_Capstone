<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\FarmingLog;
use App\Models\Actuator; // <--- PENTING: Baris ini wajib ada agar Actuator dikenali

class DashboardController extends Controller
{
    // Fungsi untuk menampilkan Halaman Dashboard
    public function index()
    {
        // 1. Ambil data sensor paling baru
        $sensor = SensorData::latest()->first();

        // 2. Ambil 5 kegiatan pertanian terakhir
        $logs = FarmingLog::latest()->take(5)->get();

        // 3. Ambil semua data alat (Pompa, Kipas, dll) untuk fitur kontrol
        $actuators = Actuator::all();

        // 4. Kirim SEMUA data (sensor, logs, actuators) ke tampilan
        return view('dashboard', compact('sensor', 'logs', 'actuators'));
    }

    // Fungsi Baru: Untuk memproses tombol ON/OFF
    public function toggleActuator($id)
    {
        // Cari alat berdasarkan ID
        $tool = Actuator::findOrFail($id);

        // Ubah statusnya (Kalau Nyala jadi Mati, kalau Mati jadi Nyala)
        $tool->is_active = !$tool->is_active;
        $tool->save();

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect()->back()->with('success', 'Status ' . $tool->name . ' berhasil diubah.');
    }
}
