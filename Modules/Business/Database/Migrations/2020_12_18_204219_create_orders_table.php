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
            $table->increments('id');
            $table->integer('total_price');
            $table->integer('total_item_price');
            $table->integer('delivery_price');
            $table->integer('total_price_after_disco');
            $table->string('unt');
            $table->integer('status');
            $table->integer('item_count');
            $table->string('restaurant_approved_at');
            $table->text('description');
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->timestamps();
            $table->softDeletes();
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
