<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->char('tipo', 1)->nullable();
            $table->char('ptovta', 4)->nullable();
            $table->char('nrocomp', 8)->nullable();
            $table->char('cuit', 11)->nullable();
            $table->decimal('imptot', 11,2)->nullable();
            $table->decimal('impiva', 11,2)->nullable();
            $table->string('fecha')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas');
    }
}
