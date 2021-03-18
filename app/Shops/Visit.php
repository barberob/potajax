<?php

namespace App\Shops;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
	protected $fillable = [
        'shop_id'
    ];

   	public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
