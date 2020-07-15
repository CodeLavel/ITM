<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
  protected $table = 'orderitems';
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $guarded = [];
}
