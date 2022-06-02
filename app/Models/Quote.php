<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}