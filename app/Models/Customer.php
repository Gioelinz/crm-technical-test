<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 'email', 'telephone', 'vat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
