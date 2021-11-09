<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable = ['name', 'description', 'entry', 'price', 'gluten_free', 'vegetarian', 'vegan', 'frozen', 'available'];
    //todo picture, restaurant_id

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
