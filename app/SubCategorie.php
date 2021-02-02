<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    //
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
