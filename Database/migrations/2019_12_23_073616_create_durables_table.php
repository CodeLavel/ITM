<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDurablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('durables', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('photo')->nullable();
            $table->string('duID')->nullable();
            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->integer('catagory_id')->unsigned()->nullable()->index();
            $table->string('du_name')->nullable()->unique();
            $table->string('brand')->nullable();
            $table->string('gen')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('break')->nullable();
            $table->integer('use')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('durables');
    }
}
