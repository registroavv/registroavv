<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\estudio_suelo;

class EstudioSueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estudio_suelo::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'CERTIFICADO', 'id' => '2'],
            ['nombre' => 'NO CERTIFICADO', 'id' => '3'],
            ['nombre' => 'DE TERCERO CERTIFICADO', 'id' => '4'],
            ['nombre' => 'DE TERCERO NO CERTIFICADO', 'id' => '5']
        ]);
    }
}
