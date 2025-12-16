<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actuator;

class ActuatorSeeder extends Seeder
{
    public function run(): void
    {
        Actuator::create(['name' => 'Pompa Irigasi', 'is_active' => false]);
        Actuator::create(['name' => 'Kipas Ventilasi', 'is_active' => false]);
        Actuator::create(['name' => 'Grow Light', 'is_active' => false]);
    }
}
