<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            // Data Mikroklimat & Tanah sesuai Proposal
            $table->float('air_temperature');  // Suhu Udara
            $table->float('air_humidity');     // Kelembaban Udara
            $table->float('soil_moisture');    // Kelembaban Tanah
            $table->float('soil_ph');          // pH Tanah
            $table->float('light_intensity')->nullable(); // Intensitas Cahaya

            // Data Nutrisi (NPK) opsional tapi penting untuk prediksi pupuk
            $table->float('nitrogen')->nullable();
            $table->float('phosphorus')->nullable();
            $table->float('potassium')->nullable();

            $table->timestamps(); // Mencatat waktu (created_at) data masuk
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
