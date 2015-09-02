<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dining_Hall_Food extends Model
{
  protected $table = 'dining_hall_food';

  protected $primaryKey = 'id';

  protected $fillable = ['dining_id', 'meal', 'food_name', 'date_served', 'updated_at', 'created_at'];
}
