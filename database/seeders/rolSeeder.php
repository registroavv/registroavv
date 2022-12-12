<?php

namespace Database\Seeders;
use App\models\rol;
use Illuminate\Database\Seeder;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rol::insert([
            ['id' => '1','nombre' => 'ADMIN'],
            ['id' => '2','nombre' => 'REGISTRO'],
            ['id' => '3','nombre' => 'INTU'],
            ['id' => '4','nombre' => 'FMH'],
            ['id' => '5','nombre' => 'PARTICIPACION']
        ]);
    }
}