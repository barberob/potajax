<?php

namespace App\Shops;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    protected $fillable = ['url'];
    /**
     * @var mixed|string
     */

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
