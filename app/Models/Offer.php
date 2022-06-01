<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'customer_id', 'price', 'description'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
