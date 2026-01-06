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
        // 1. Ambil data umum (Sensor & Log)
        $sensor = SensorData::latest()->first();
        $logs = FarmingLog::latest()->take(5)->get();

        // 2. Cek Role User yang sedang login
        $user = auth()->user();

        if ($user->role === 'admin') {
            // ADMIN: Butuh data Actuators untuk kontrol alat
            $actuators = Actuator::all();

            // Arahkan ke folder 'admin'
            return view('admin.dashboard', compact('sensor', 'logs', 'actuators'));
        } else {
            // PETANI: Tidak butuh data Actuators (karena cuma monitoring)

            // Arahkan ke folder 'petani'
            return view('petani.dashboard', compact('sensor', 'logs'));
        }
    }

    // Fungsi Baru: Untuk memproses tombol ON/OFF
    public function toggleActuator($id)
    {
        // PENGAMANAN: Cek apakah user adalah admin?
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak! Hanya Admin yang boleh menyalakan alat.');
        }

        // Kalau Admin, baru boleh lanjut...
        $tool = Actuator::findOrFail($id);
        $tool->is_active = !$tool->is_active;
        $tool->save();

        return redirect()->back()->with('success', 'Status ' . $tool->name . ' berhasil diubah.');
    }
}
