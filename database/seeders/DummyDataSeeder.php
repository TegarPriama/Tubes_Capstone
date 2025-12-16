<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SensorData; // Panggil Model Sensor
use App\Models\FarmingLog; // Panggil Model Log

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Sensor Dummy (Kondisi Ideal)
        SensorData::create([
            'air_temperature' => 28.5, // Suhu 28.5 C
            'air_humidity' => 75.0,    // Kelembaban Udara 75%
            'soil_moisture' => 60.0,   // Kelembaban Tanah 60% (Lembab)
            'soil_ph' => 6.8,          // pH Netral
            'nitrogen' => 120,
            'phosphorus' => 40,
            'potassium' => 150,
            'light_intensity' => 5000,
        ]);

        // 2. Buat Data Jurnal Tani Dummy
        FarmingLog::create([
            'activity_date' => now()->subDays(2),
            'activity_type' => 'Pemberian Nutrisi AB Mix',
            'growth_phase' => 'Vegetatif',
            'description' => 'Memberikan nutrisi fokus daun karena tanaman baru pindah tanam.',
            'officer_name' => 'Pak Budi (Ketua Tani)',
        ]);

        FarmingLog::create([
            'activity_date' => now()->subDays(1),
            'activity_type' => 'Pengecekan Hama',
            'growth_phase' => 'Vegetatif',
            'description' => 'Tidak ditemukan hama kutu kebul. Kondisi aman.',
            'officer_name' => 'Mas Zain',
        ]);

        FarmingLog::create([
            'activity_date' => now(),
            'activity_type' => 'Monitoring pH',
            'growth_phase' => 'Vegetatif',
            'description' => 'pH stabil di angka 6.8, tidak perlu penambahan acid.',
            'officer_name' => 'Mbak Syalu',
        ]);
    }
}
