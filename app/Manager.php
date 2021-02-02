<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
