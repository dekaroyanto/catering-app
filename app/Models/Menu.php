<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
