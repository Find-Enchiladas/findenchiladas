<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiningHallFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('dining_hall_food', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('dining_id');
          $table->string('meal');
          $table->string('food_name');
          $table->date('date_served');
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
        Schema::drop('dining_hall_food');
    }
}
