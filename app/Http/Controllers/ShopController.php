<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Shops\Shop;
use App\Shops\Categorie;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function details($id){
    	$infos = Shop::with('reviews')->findOrFail($id);
    	$id_cat = $infos->category_id;
    	$img_cat = Categorie::findOrFail($id_cat)->libelle;
    	$user_can_review = Review::where('user_id', Auth::id())->count() > 0 ? false : true;
    	return view('pages.shop', [
            'infos'=> $infos,
            'img'=> $img_cat,
            'user_can_review' => $user_can_review
        ]);
    }
}
