<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->date('date')->nullable();
            $table->date('rdate')->nullable();
            $table->string('status')->nullable();
            $table->string('borrow')->nullable();
            $table->string('comment')->nullable();

            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('userID')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('place')->nullable();
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
