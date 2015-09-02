<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiningHallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('dining_halls', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('nickname');
          $table->string('campus');
          // $table->time('breakfastOpen');
          // $table->time('breakfastClosed');
          // $table->time('lunchOpen');
          // $table->time('lunchClosed');
          // $table->time('dinnerOpen');
          // $table->time('dinnerClosed');
          // $table->time('brunchOpen');
          // $table->time('brunchClosed');
          // $table->time('weekendDinnerOpen');
          // $table->time('weekendDinnerClosed');
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
        Schema::drop('dining_halls');
    }
}
