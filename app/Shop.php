<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function moderators()
    {
        return $this->belongsToMany(Moderator::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function subCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }
}
