<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigracionInicial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tokens_api', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token', 100);
            $table->boolean('activo')->default(false);
            $table->timestamps();
        });

        Schema::create('lista_blanca_acceso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('red', 100);
            $table->boolean('permitir')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tokens_api');
        Schema::drop('lista_blanca_acceso');
    }
}
