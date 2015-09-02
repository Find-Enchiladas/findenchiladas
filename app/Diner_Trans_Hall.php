<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diner_Trans_Hall extends Model
{
  protected $table = 'dining_trans_halls';

  protected $primaryKey = 'id';

  protected $fillable = ['dining_id', 'user_id',
  'breakfast', 'lunch', 'dinner', 'brunch', 'weekend_dinner',
  'updated_at', 'created_at'];
}
