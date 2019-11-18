<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('propietario')->nullable();
            $table->string('cuit', 11)->nullable();
            $table->string('condiva')->nullable();
            $table->string('deposito')->nullable();
            $table->string('actualiza_stock')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('ingresos_brutos')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('sitio')->nullable();
            $table->string('logo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sistemas');
    }
}
