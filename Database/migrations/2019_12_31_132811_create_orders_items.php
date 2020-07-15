<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('photo')->nullable();
            $table->text('item_name')->nullable();
            $table->text('item_category')->nullable();
            $table->text('item_brand')->nullable();
            $table->text('item_gen')->nullable();
            $table->integer('item_amount')->nullable();
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
        Schema::dropIfExists('orderitems');
    }
}
