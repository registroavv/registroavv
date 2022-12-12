<?php

namespace Database\Seeders;
use App\models\avv;

use Illuminate\Database\Seeder;

class avvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        avv::insert([
            'id'                    =>  '825',
            'nombre'                =>  'URBANISMO HUGO CHAVEZ',
            'direccion'             =>  'calle principal',
            'latitud'               =>  '10.482704232535113',
            'longitud'              =>  '-66.94666015498046',
            'cant_viviendas'        =>  '537',
            'familias'              =>  '50',
            'cant_personas'         =>  '530',
            'organo_id'             =>  '1',
            'estado_id'             =>  '1',
            'municipio_id'          =>  '101',
            'parroquia_id'          =>  '10101',
            'consejo_comunal'       =>  'LA PIEDRITA',
            'comuna'                =>  'FLOR DE PATRIA',
            'saime_id'              =>  '1',
            'telefono'              =>  '4166207494',
            'preregistro'           =>  true,
            'nivel1'                =>  false,
            'nivel2'                =>  false,
            'nivel3'                =>  false,
            'nivel4'                =>  false,
            'nivel5'                =>  false,
            'nivel6'                =>  false,
            'nivel7'                =>  false,
            'nivel8'                =>  false,
            'nivel9'                =>  false,
            'implantacion_id'       =>  '1',
            'proyecto_id'           =>  '1',
            'implantacion2'          =>  '62c8ac973c827Implantaciones.pdf',
            'prefactibilidad_id'    =>  '1',
            'salida_cartografica_id'=>  '1',
            'servicios_cercanos_id' =>  '1',
            'levantamiento_topografico_id'=> '1',
            'estudio_suelo_id'      =>  '1',
            'factibilidad_servicio_id'=> '1',
            'propiedad_terreno_id'  =>  '1',
            'tpm_id'                => '1',
            'cmg_id'                => '1',
            'sigevih_id'            => '1',
            'codigoregistro'        => '010101825'
        ]);
    }
}
