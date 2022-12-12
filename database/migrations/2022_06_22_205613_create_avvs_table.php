<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avvs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigoregistro')->unique();

            //============ CAMPOS DE REDES ============
            $table->string('nombre')->nullable();
            $table->longText('direccion')->nullable();
            $table->text('latitud')->nullable();
            $table->text('longitud')->nullable();
            $table->integer('familias')->nullable();
            $table->integer('cant_personas')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('nombre_terreno')->nullable();
            $table->string('acta_avv')->nullable();
            $table->string('tipologia_constructiva')->nullable();
            $table->foreignId('cmg_id')->default('1')->nullable()->references('id')->on('cmgs')->nullOnDelete()->cascadeOnUpdate();
            $table->string('nombre_cmg')->nullable();
            $table->string('tpm_codigo')->nullable();
            $table->foreignId('tpm_id')->default('1')->nullable()->references('id')->on('tpms')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('sigevih_id')->default('1')->nullable()->references('id')->on('sigevihs')->nullOnDelete()->cascadeOnUpdate();
            $table->bigInteger('sigevih_codigo')->nullable();
            $table->string('metodologia_ejecucion')->nullable();
            $table->string('protocolizacion')->nullable();
            $table->string('consejo_comunal')->nullable();
            $table->string('comuna')->nullable();
            $table->boolean('preregistro')->default(true);
            $table->boolean('nivel1')->default(false);
            $table->boolean('nivel5')->default(false);
            $table->boolean('nivel6')->default(false);
            $table->boolean('nivel7')->default(false);
            $table->boolean('nivel8')->default(false);
            $table->boolean('nivel9')->default(false);


            //============ CAMPOS DE FMH ============
            $table->integer('cant_viviendas')->nullable();
            $table->longText('observacion_fmh')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->string('implantacion2')->nullable();
            $table->string('proyecto2')->nullable();
            $table->boolean('nivel4')->default(false);
            $table->foreignId('implantacion_id')->default('1')->nullable()->references('id')->on('implantacions')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('proyecto_id')->default('1')->nullable()->references('id')->on('proyectos')->nullOnDelete()->casacdeOnUpdate();

            //============ CAMPOS DE INTU ============
            $table->boolean('nivel2')->default(false);
            $table->integer('matriz_intu')->nullable();
            $table->bigInteger('codigo_intu')->nullable();
            $table->double('area_terreno', 5, 2)->nullable();
            $table->longText('observacion_intu2')->nullable();
            
            $table->string('prefactibilidad2')->nullable();
            $table->string('factibilidad_servicio')->nullable();
            $table->string('salida_cartografica')->nullable();
            $table->string('levantamiento_topografico')->nullable();
            $table->string('estudio_suelo')->nullable();
            $table->foreignId('prefactibilidad_id')->default('1')->nullable()->references('id')->on('prefactibilidads')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('factibilidad_servicio_id')->default('1')->nullable()->references('id')->on('factibilidad_servicios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('salida_cartografica_id')->default('1')->nullable()->references('id')->on('salida_cartograficas')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('servicios_cercanos_id')->default('1')->nullable()->references('id')->on('servicios_cercanos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('levantamiento_topografico_id')->default('1')->nullable()->references('id')->on('levantamiento_topograficos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estudio_suelo_id')->default('1')->nullable()->references('id')->on('estudio_suelos')->nullOnDelete()->cascadeOnUpdate();

            //============ CAMPOS DE INTU ============
            $table->boolean('nivel3')->default(false);
            $table->string('gaceta_oficial')->nullable();
            $table->integer('decreto_3330')->nullable();
            $table->foreignId('propiedad_terreno_id')->default('1')->nullable()->references('id')->on('propiedad_terrenos')->nullOnDelete()->cascadeOnUpdate();
            $table->string('docu_catastral')->nullable();
            $table->longText('observacion_intu3')->nullable();

            $table->string('tenencia_terreno')->nullable();
            $table->longText('observacion_redes')->nullable();

            $table->foreignId('requerimientos_fmh_id')->nullable()->references('id')->on('requerimientos_fmhs')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('saime_id')->nullable()->references('id')->on('saimes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('organo_id')->nullable()->references('id')->on('organos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avvs');
    }
}
