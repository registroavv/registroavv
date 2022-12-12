<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\organo;

class organoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        organo::insert([
            ['id' => '1', 'nombre' => 'MINISTERIO DEL PODER POPULAR PARA LAS COMUNAS Y MOVIMIENTOS SOCIALES'],
            ['id' => '2', 'nombre' => 'MISION RIBAS'],
            ['id' => '3', 'nombre' => 'FRENTE FRANCISCO DE MIRANDA'],
            ['id' => '4', 'nombre' => 'GOBERNACION'],
            ['id' => '5', 'nombre' => 'ALCALDIA'],
            ['id' => '6', 'nombre' => 'COMITE DE TIERRA URBANA']
        ]);        
    }
}
