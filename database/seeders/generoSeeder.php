<?php

namespace Database\Seeders;
use App\models\genero;
use Illuminate\Database\Seeder;

class generoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        genero::insert([
            ['nombre' => 'MASCULINO'],
            ['nombre' => 'FEMENINA']
        ]);
    }
}
