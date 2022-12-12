<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\prefactibilidad;

class prefactibilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        prefactibilidad::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'FACTIBLE', 'id' => '2'],
            ['nombre' => 'NO FACTIBLE', 'id' => '3']
        ]);
    }
}
