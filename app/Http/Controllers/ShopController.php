<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops\Shop;

class ShopController extends Controller
{
    public function details($id){
    	$infos = Shop::findOrFail($id); 

    	return view('pages.shop', [
            'infos'=> $infos
        ]);
    }
}
