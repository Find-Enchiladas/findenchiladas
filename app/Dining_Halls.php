<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dining_Halls extends Model
{
  protected $table = 'dining_halls';

  protected $primaryKey = 'id';

  protected $fillable = ['name', 'nickname', 'campus',
  // 'breakfastOpen', 'breakfastClosed',
  // 'lunchOpen', 'lunchClosed',
  // 'dinnerOpen', 'dinnerClosed',
  // 'brunchOpen', 'brunchClosed',
  // 'weekendDinnerOpen', 'weekendDinnerClosed',
  'updated_at', 'created_at'];
}
