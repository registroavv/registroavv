<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\serviciosCercanos;

class ServiciosCercanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        serviciosCercanos::insert([
            ['nombre' => 'NO IDENTIFICADO', 'id' => '1'],
            ['nombre' => 'SI', 'id' => '2'],
            ['nombre' => 'NO', 'id' => '3']
        ]);
    }
}
