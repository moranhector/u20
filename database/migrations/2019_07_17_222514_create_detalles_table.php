<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('descrip')->nullable();
            $table->integer('id_articulo')->nullable();
            $table->decimal('cantidad', 11,2)->nullable();
            $table->decimal('precio', 11,2)->nullable();
            $table->decimal('importe', 11,2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalles');
    }
}
