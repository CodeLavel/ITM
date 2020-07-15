<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function durables(){
      return $this->hasMany(Durable::class);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'catagories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'catagory_name'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];




}
