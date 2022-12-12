<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\cmg;

class CmgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cmg::insert([
            ['nombre' => 'SIN CONFORMAR', 'id' => '1'],
            ['nombre' => 'CONFORMADO Y SIN REGISTRAR', 'id' => '2'],
            ['nombre' => 'CONFORMADO Y REGISTRADO', 'id' => '3']
        ]);
    }
}
