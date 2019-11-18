<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuntoventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntoventas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('numero')->nullable();
            $table->string('sistema')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fechadesde')->nullable();
            $table->boolean('habilitado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puntoventas');
    }
}
