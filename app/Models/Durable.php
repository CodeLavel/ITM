<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Durable extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'durables';

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
                  'photo',
                  'duID',
                  'category_id',
                  'catagory_id',
                  'du_name',
                  'brand',
                  'gen',
                  'amount',
                  'break',
                  'use'
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

    /**
     * Get the category for this model.
     *
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function catagory()
    {
        return $this->belongsTo('App\Models\Catagory','catagory_id');
    }



}
