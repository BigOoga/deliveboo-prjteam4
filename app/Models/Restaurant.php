<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Authenticatable
{
    protected $fillable = ['name', 'email', 'address', 'iva', 'delivery_fee', 'description', 'opening_time', 'closing_time'];

    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
