<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Favorite;

class FavoritesController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $shops = DB::table('shops')->join('favorites', 'id', '=', 'favorites.shop_id')
                                   ->where('favorites.user_id', '=', $user_id)
                                   ->get();

        return view('pages.fav', [
            'shops' => $shops
        ]);
    }

    public function add($id)
    {
    	// Si l'utilisateur est connecté

    	if(auth()->check())
    	{
    		// On enregistre ses favoris dans la BDD

            Favorite::create(
                ['user_id' => auth()->id(), 'shop_id' => $id]
            );
    	}

    	// Si l'utilisateur n'est pas connecté

    	else
    	{
    		// On enregistre ses favoris en localStorage
    	}
    }
}