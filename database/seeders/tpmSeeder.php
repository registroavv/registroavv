<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tpm;

class tpmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tpm::insert([
            ['nombre' => 'SIN ENTREGAR', 'id' => '1'],
            ['nombre' => 'ENTREGADO', 'id' => '2']
        ]);
    }
}
