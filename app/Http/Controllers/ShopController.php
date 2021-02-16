<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops\Shop;
use App\Shops\Categorie;

class ShopController extends Controller
{
    public function details($id){
    	$infos = Shop::findOrFail($id); 
    	$id_cat = Shop::findOrFail($id)->category_id;
    	$img_cat = Categorie::findOrFail($id_cat)->libelle;

    	return view('pages.shop', [
            'infos'=> $infos,
            'img'=> $img_cat
        ]);
    }
}
