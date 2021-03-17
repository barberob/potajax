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
        if(auth()->check())
        {
           // On récupère l'id de l'utilisateur connecté

            $user_id = Auth::id();

            // On va chercher en BDD les magasins mis en favoris par l'utilisateur connecté

            $shops = DB::table('shops')->join('favorites', 'id', '=', 'favorites.shop_id')
                                       ->where('favorites.user_id', '=', $user_id)
                                       ->get();

            // On envoie les magasins récupérés en BDD à la vue fav

            return view('pages.fav', [
                'shops' => $shops
            ]); 
        }
        
        //else
        //{
            /*dd($_POST);*/
            /*dd("zebi");*/



            /*$shops = DB::table('shops')->where('shop_id', '=', $_COOKIE['id'])
                                       ->get();

            // On envoie les magasins récupérés en BDD à la vue fav grâce au localStorage

            return view('pages.fav', [
                'shops' => $shops
            ]);*/
        //}
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

    	/*else
    	{
    		// On enregistre ses favoris en localStorage
    	}*/
    }

    public function post(Request $request)
    {
        // Récupération des id du body du fetch

        // Requête vers BDD whereIn tous les id sont dans cette collection d'id

        // Retourne la vue shops.blade avec en paramètres les résultats de la requête ci-dessus
    }
}