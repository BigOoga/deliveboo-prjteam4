<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable = ['name', 'description', 'entry', 'price'];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('quantity');
    }

    public function restaurant()
    {
        return $this->belongsToMany('App\Models\Restaurant');
    }
}
