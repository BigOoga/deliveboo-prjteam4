<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['address','user_name','user_surname','phone','email','total'];

    public function dishes()
    {
        return $this->belongsToMany('App\Models\Dish');
    }
}
