<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farming_logs', function (Blueprint $table) {
            $table->id();
            $table->date('activity_date'); // Tanggal kegiatan
            $table->string('activity_type'); // Contoh: Penyiraman, Pemupukan, Panen

            // Fase pertumbuhan penting untuk prediksi kebutuhan nutrisi
            $table->enum('growth_phase', ['Vegetatif', 'Generatif', 'Panen'])->default('Vegetatif');

            $table->text('description')->nullable(); // Catatan detail petani
            $table->string('officer_name'); // Nama petani yang mencatat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farming_logs');
    }
};
