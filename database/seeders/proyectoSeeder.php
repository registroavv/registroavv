<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\proyecto;

class proyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        proyecto::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'EN PROCESO', 'id' => '2'],
            ['nombre' => 'VALIDADO', 'id' => '3'],
            ['nombre' => 'NO VALIDADO', 'id' => '4']
        ]);
    }
}
