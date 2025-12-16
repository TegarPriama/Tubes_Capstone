<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    // Tambahkan baris ini (Fillable)
    protected $fillable = [
        'air_temperature',
        'air_humidity',
        'soil_moisture',
        'soil_ph',
        'light_intensity',
        'nitrogen',
        'phosphorus',
        'potassium'
    ];
}
