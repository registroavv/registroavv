<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sigevih;

class SigevihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sigevih::insert([
            ['nombre' => 'NO INSCRITA', 'id' => '1'],
            ['nombre' => 'INSCRITA CON FAMILIAS', 'id' => '2'],
            ['nombre' => 'INSCRITA SIN FAMILIAS', 'id' => '3']
        ]);
    }
}
