<?php

namespace App\Shops;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
