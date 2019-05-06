<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_calculation', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('service_price');
            $table->integer('ship_inside_price')->nullable();
            $table->integer('exchange_rate');
            $table->integer('ship_outside_price');
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
        Schema::dropIfExists('price_calculation');
    }
}
