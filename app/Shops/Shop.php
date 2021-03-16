<?php

namespace App\Shops;

use App\City;
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

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategorie::class, 'subcategory_id');
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

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
