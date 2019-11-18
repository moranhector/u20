<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('articulo')->nullable();
            $table->integer('deposito')->nullable();
            $table->decimal('stock')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stocks');
    }
}
