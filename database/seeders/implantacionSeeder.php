<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\implantacion;

class implantacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        implantacion::insert([
            ['nombre' => 'NO REALIZADO', 'id' => '1'],
            ['nombre' => 'VALIDADO', 'id' => '2'],
            ['nombre' => 'NO VALIDADO', 'id' => '3']
        ]);
    }
}
