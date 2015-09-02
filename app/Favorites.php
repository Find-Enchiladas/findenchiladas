<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
  protected $table = 'favorites';

  protected $primaryKey = 'id';

  protected $fillable = ['user_id', 'food_name', 'updated_at', 'created_at'];
}
