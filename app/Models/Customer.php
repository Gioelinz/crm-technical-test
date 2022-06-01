<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'telephone', 'vat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
