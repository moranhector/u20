<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('descrip')->nullable();
            $table->string('ean13')->nullable();
            $table->string('id_rubro')->nullable();
            $table->string('umedida')->nullable();
            $table->decimal('precio', 11,2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
