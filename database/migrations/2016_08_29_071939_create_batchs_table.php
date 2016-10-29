<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batchs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->index()->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('tag')->unique();
            $table->date('manufacture');
            $table->date('expiry');
            $table->integer('quantity');
            $table->integer('shrinkage')->default(0);
            $table->integer('sell')->default(0);
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
        Schema::drop('batchs');
    }
}
