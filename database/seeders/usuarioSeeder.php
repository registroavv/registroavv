<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
            'name' => 'ADMINISTRADOR',
            'email' => 'admin@email.com',
            'password' => bcrypt('21246813'),
            'admin' => true,
            'rol_id' => '1',
            'estado_id' => '25',
            'nivel2' => false
        ],[
            'name' => 'FMH NACIONAL',
            'email' => 'fmhnacional@email.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'rol_id' => '4',
            'estado_id' => '25',
            'nivel2' => false
        ],[
            'name' => 'REDES',
            'email' => 'redes@email.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'rol_id' => '2',
            'estado_id' => '1',
            'nivel2' => false
        ],[
            'name' => 'INTU NIVEL 2 NACIONAL',
            'email' => 'intu2nacional@email.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'rol_id' => '3',
            'estado_id' => '25',
            'nivel2' => true
        ]]);
    }
}
