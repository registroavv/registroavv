<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(estadoSeeder::class);
        $this->call(municipioSeeder::class);
        $this->call(parroquiaSeeder::class);
        $this->call(rolSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(generoSeeder::class);
        $this->call(organoSeeder::class);
        $this->call(saimeseeder::class);
        $this->call(implantacionSeeder::class);
        $this->call(proyectoSeeder::class);
        $this->call(EstudioSueloSeeder::class);
        $this->call(FactibilidadServiciosSeeder::class);
        $this->call(LevantamientoTopograficoSeeder::class);
        $this->call(prefactibilidadSeeder::class);
        $this->call(PropiedadTerrenoSeeder::class);
        $this->call(SalidaCartograficaSeeder::class);
        $this->call(ServiciosCercanosSeeder::class);
        $this->call(tpmSeeder::class);
        $this->call(CmgSeeder::class);
        $this->call(SigevihSeeder::class);
        $this->call(avvSeeder::class);
    }
}