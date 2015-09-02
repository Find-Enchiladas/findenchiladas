<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Dining_Halls;

class DiningHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Dining_Halls::create([
        'name' => 'Collins',
        'nickname' => 'Collins',
        'campus'  => 'CMC'
        // 'breakfastOpen' => '07:30:00',
        // 'breakfastClosed' => '09:00:00',
        // 'lunchOpen' => '11:00:00',
        // 'lunchClosed' => '13:00:00',
        // 'dinnerOpen' => '17:00:00',
        // 'dinnerClosed' => '19:00:00',
        // 'brunchOpen' => '10:30:00',
        // 'brunchClosed' => '12:30:00',
        // 'weekendDinnerOpen' => '16:30:00',
        // 'weekendDinnerClosed' => '18:30:00'
      ]);
      Dining_Halls::create([
        'name' => 'Frank',
        'nickname' => 'Frank',
        'campus'  => 'Pomona'
        // 'breakfastOpen' => '07:30:00',
        // 'breakfastClosed' => '10:00:00',
        // 'lunchOpen' => '11:30:00',
        // 'lunchClosed' => '13:00:00',
        // 'dinnerOpen' => '17:00:00',
        // 'dinnerClosed' => '19:00:00',
        // 'brunchOpen' => '11:00:00',
        // 'brunchClosed' => '13:00:00',
        // 'weekendDinnerOpen' => '17:30:00',
        // 'weekendDinnerClosed' => '19:00:00'
      ]);
      Dining_Halls::create([
        'name' => 'Frary',
        'nickname' => 'Frary',
        'campus'  => 'Pomona'
        // 'breakfastOpen' => '07:30:00',
        // 'breakfastClosed' => '10:00:00',
        // 'lunchOpen' => '11:00:00',
        // 'lunchClosed' => '14:00:00',
        // 'dinnerOpen' => '17:00:00',
        // 'dinnerClosed' => '19:00:00',
        // 'brunchOpen' => '11:00:00',
        // 'brunchClosed' => '13:00:00',
        // 'weekendDinnerOpen' => '17:30:00',
        // 'weekendDinnerClosed' => '19:00:00'
      ]);
      Dining_Halls::create([
        'name' => 'Hoch',
        'nickname' => 'Mudd',
        'campus'  => 'Harvey Mudd'
      ]);
      Dining_Halls::create([
        'name' => 'Malott',
        'nickname' => 'Scripps',
        'campus'  => 'Scripps'
      ]);
      Dining_Halls::create([
        'name' => 'McConnell',
        'nickname' => 'Pitzer',
        'campus'  => 'Pitzer'
      ]);
      Dining_Halls::create([
        'name' => 'Oldenborg',
        'nickname' => 'Oldenborg',
        'campus'  => 'Pomona'
      ]);
    }
}
