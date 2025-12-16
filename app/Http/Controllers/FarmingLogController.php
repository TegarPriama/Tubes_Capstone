<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmingLog;

class FarmingLogController extends Controller
{
    // 1. Menampilkan Form Tambah Kegiatan
    public function create()
    {
        return view('farming_logs.create');
    }

    // 2. Menyimpan Data dari Form ke Database
    public function store(Request $request)
    {
        // Validasi inputan agar tidak kosong
        $request->validate([
            'activity_date' => 'required|date',
            'officer_name' => 'required|string|max:255',
            'activity_type' => 'required|string',
            'growth_phase' => 'required|in:Vegetatif,Generatif,Panen',
            'description' => 'nullable|string',
        ]);

        // Simpan ke database
        FarmingLog::create($request->all());

        // Kembali ke Dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Kegiatan berhasil dicatat!');
    }
}
