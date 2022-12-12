<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\levantamiento_topografico;

class LevantamientoTopograficoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        levantamiento_topografico::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'CERTIFICADO', 'id' => '2'],
            ['nombre' => 'NO CERTIFICADO', 'id' => '3']
        ]);
    }
}
