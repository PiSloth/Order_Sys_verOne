<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('user_id');
            $table->string('branch');
            $table->integer('status_id');
            $table->string('design');
            $table->string('detail');
            $table->string('quality');
            $table->string('weight');
            $table->string('size');
            $table->integer('qty');
            $table->string('grade');
            $table->integer('counterstock');
            $table->integer('sell_rate')->default(0);
            $table->text('note');
            $table->integer('instockqty')->nullable();
            $table->integer('estimatetime')->nullable();
            $table->integer('arqty')->nullable();
            $table->integer('closeqty')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
