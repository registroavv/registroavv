<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos_fmhs', function (Blueprint $table) {
            $table->id();
            $table->float('req_01')->nullable()->default(00.00);
            $table->float('req_02')->nullable()->default(00.00);
            $table->float('req_03')->nullable()->default(00.00);
            $table->float('req_04')->nullable()->default(00.00);
            $table->float('req_05')->nullable()->default(00.00);
            $table->float('req_06')->nullable()->default(00.00);
            $table->float('req_07')->nullable()->default(00.00);
            $table->float('req_08')->nullable()->default(00.00);
            $table->float('req_09')->nullable()->default(00.00);
            $table->float('req_10')->nullable()->default(00.00);
            $table->float('req_11')->nullable()->default(00.00);
            $table->float('req_12')->nullable()->default(00.00);
            $table->float('req_13')->nullable()->default(00.00);
            $table->float('req_14')->nullable()->default(00.00);
            $table->float('req_15')->nullable()->default(00.00);
            $table->float('req_16')->nullable()->default(00.00);
            $table->float('req_17')->nullable()->default(00.00);
            $table->float('req_18')->nullable()->default(00.00);
            $table->float('req_19')->nullable()->default(00.00);
            $table->float('req_20')->nullable()->default(00.00);
            $table->float('req_21')->nullable()->default(00.00);
            $table->float('req_22')->nullable()->default(00.00);
            $table->float('req_23')->nullable()->default(00.00);
            $table->float('req_24')->nullable()->default(00.00);
            $table->float('req_25')->nullable()->default(00.00);
            $table->float('req_26')->nullable()->default(00.00);
            $table->float('req_27')->nullable()->default(00.00);
            $table->float('req_28')->nullable()->default(00.00);
            $table->float('req_29')->nullable()->default(00.00);
            $table->float('req_30')->nullable()->default(00.00);
            $table->float('req_31')->nullable()->default(00.00);
            $table->float('req_32')->nullable()->default(00.00);
            $table->float('req_33')->nullable()->default(00.00);
            $table->float('req_34')->nullable()->default(00.00);
            $table->float('req_35')->nullable()->default(00.00);
            $table->float('req_36')->nullable()->default(00.00);
            $table->float('req_37')->nullable()->default(00.00);
            $table->float('req_38')->nullable()->default(00.00);
            $table->float('req_39')->nullable()->default(00.00);
            $table->float('req_40')->nullable()->default(00.00);
            $table->float('req_41')->nullable()->default(00.00);
            $table->float('req_42')->nullable()->default(00.00);
            $table->float('req_43')->nullable()->default(00.00);
            $table->float('req_44')->nullable()->default(00.00);
            $table->float('req_45')->nullable()->default(00.00);
            $table->float('req_46')->nullable()->default(00.00);
            $table->float('req_47')->nullable()->default(00.00);
            $table->float('req_48')->nullable()->default(00.00);
            $table->float('req_49')->nullable()->default(00.00);
            $table->float('req_50')->nullable()->default(00.00);
            $table->float('req_51')->nullable()->default(00.00);
            $table->float('req_52')->nullable()->default(00.00);
            $table->float('req_53')->nullable()->default(00.00);
            $table->float('req_54')->nullable()->default(00.00);
            $table->float('req_55')->nullable()->default(00.00);
            $table->float('req_56')->nullable()->default(00.00);
            $table->float('req_57')->nullable()->default(00.00);
            $table->float('req_58')->nullable()->default(00.00);
            $table->float('req_59')->nullable()->default(00.00);
            $table->float('req_60')->nullable()->default(00.00);
            $table->float('req_61')->nullable()->default(00.00);
            $table->float('req_62')->nullable()->default(00.00);
            $table->float('req_63')->nullable()->default(00.00);
            $table->float('req_64')->nullable()->default(00.00);
            $table->float('req_65')->nullable()->default(00.00);
            $table->float('req_66')->nullable()->default(00.00);
            $table->float('req_67')->nullable()->default(00.00);
            $table->float('req_68')->nullable()->default(00.00);
            $table->float('req_69')->nullable()->default(00.00);
            $table->float('req_70')->nullable()->default(00.00);
            $table->float('req_71')->nullable()->default(00.00);
            $table->float('req_72')->nullable()->default(00.00);
            $table->float('req_73')->nullable()->default(00.00);
            $table->float('req_74')->nullable()->default(00.00);
            $table->float('req_75')->nullable()->default(00.00);
            $table->float('req_76')->nullable()->default(00.00);
            $table->float('req_77')->nullable()->default(00.00);
            $table->float('req_78')->nullable()->default(00.00);
            $table->float('req_79')->nullable()->default(00.00);
            $table->float('req_80')->nullable()->default(00.00);
            $table->float('req_81')->nullable()->default(00.00);
            $table->float('req_82')->nullable()->default(00.00);
            $table->float('req_83')->nullable()->default(00.00);
            $table->float('req_84')->nullable()->default(00.00);
            $table->float('req_85')->nullable()->default(00.00);
            $table->float('req_86')->nullable()->default(00.00);
            $table->float('req_87')->nullable()->default(00.00);
            $table->float('req_88')->nullable()->default(00.00);
            $table->float('req_89')->nullable()->default(00.00);
            $table->float('req_90')->nullable()->default(00.00);
            $table->float('req_91')->nullable()->default(00.00);
            $table->float('req_92')->nullable()->default(00.00);

            $table->float('total_etapa1')->nullable()->default(00.00);
            $table->float('total_etapa2')->nullable()->default(00.00);
            $table->float('total_etapa3')->nullable()->default(00.00);
            $table->float('total_etapa4')->nullable()->default(00.00);
            $table->float('total_etapa5')->nullable()->default(00.00);
            $table->float('total_etapa6')->nullable()->default(00.00);
            $table->float('total_etapa7')->nullable()->default(00.00);
            $table->float('total_etapa8')->nullable()->default(00.00);

            $table->float('avance_total')->nullable()->default(00.00);

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
        Schema::dropIfExists('requerimientos_fmhs');
    }
};
