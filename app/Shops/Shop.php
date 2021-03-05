<?php

namespace App\Shops;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable = [
        'codeNote',
        'nom',
        'descriptif',
        'adresse',
        'adresse2',
        'cp',
        'numRue',
        'tel',
        'email',
        'siret',
        'horaires',
        'siret',
        'user_id',
        'city_id',
        'category_id',
        'subcategory_id',
        'lat',
        'lng',
        'etat'
    ];

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

    public function comments()
    {
        return $this->hasMany(Review::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
