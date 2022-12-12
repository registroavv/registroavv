<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\saime;

class SaimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        saime::insert([[
            'letra' => 'V',
            'cedula' => '19491796',
            'apellido1' => 'ZERPA',
            'apellido2' => 'GUERRERO',
            'nombre1' => 'JOEL',
            'nombre2' => 'ANTONIO',
            'fecha_nac' => '1990/10/17',
            'genero_id' => '1'
        ]]);
    }
}
