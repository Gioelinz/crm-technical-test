<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'user_id', 'email', 'request'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
