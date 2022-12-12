<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\propiedad_terreno;

class PropiedadTerrenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        propiedad_terreno::insert([
            ['nombre' => 'NO IDENTIFICADO', 'id' => '1'],
            ['nombre' => 'PRIVADO CONOCIDO', 'id' => '2'],
            ['nombre' => 'PRIVADO DESCONOCIDO', 'id' => '3'],
            ['nombre' => 'PÚBLICO ALCALDIA', 'id' => '4'],
            ['nombre' => 'PÚBLICO GOBERNACION', 'id' => '5'],
            ['nombre' => 'PÚBLICO INMOBILIARIA', 'id' => '6'],
            ['nombre' => 'PÚBLICO NACIONAL', 'id' => '7'],
            ['nombre' => 'SIN TERRENO', 'id' => '8'],
            ['nombre' => 'TRANSFERIDO A LA AVV', 'id' => '9']
        ]);
    }
}
