<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\factibilidad_servicio;

class FactibilidadServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factibilidad_servicio::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'CERTIFICADO', 'id' => '2'],
            ['nombre' => 'NO CERTIFICADO', 'id' => '3']
        ]);
    }
}
