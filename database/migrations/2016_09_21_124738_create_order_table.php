<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->index()->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->integer('shipment_id')->index()->unsigned()->nullable();
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
            $table->integer('status');
            $table->integer('cartons');
            $table->integer('pieces_per_carton');
            $table->integer('wasted_cartons');
            $table->float('wasted_price');
            $table->float('total_price');
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
        Schema::drop('orders');
    }
}
