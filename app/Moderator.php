<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
