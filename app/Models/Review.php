<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Review');
    }
}

