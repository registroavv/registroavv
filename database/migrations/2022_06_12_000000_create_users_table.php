<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('admin')->default(false);
            $table->boolean('nivel1')->default(false);
            $table->boolean('nivel2')->default(false);
            $table->boolean('nivel3')->default(false);
            $table->boolean('nivel4')->default(false);
            $table->boolean('nivel5')->default(false);
            $table->boolean('nivel6')->default(false);
            $table->boolean('nivel7')->default(false);
            $table->boolean('nivel8')->default(false);
            $table->boolean('nivel9')->default(false);

            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('rol_id')->nullable()->references('id')->on('rols')->nullOnDelete()->cascadeOnUpdate();
            
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
        Schema::dropIfExists('users');
    }
}
