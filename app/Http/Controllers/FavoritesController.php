<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FavoritesController extends Controller
{
    public function index()
    {
        $tabId = array();

        foreach($_COOKIE as $key=>$cookie)
        {
            /*dump($key, $cookie);*/

            if(preg_match('/^id\d$/', $key, $matches) != false)
            {
                array_push($tabId, $matches[0]);
            }

            dump($tabId);

            /*$id = $_COOKIE['id'.$i];
            $shops = DB::table('shops')->where('id', '=', $id)->get();*/
        }

        /*return view('pages.fav', [
            'shops' => $shops
        ]);*/
    }

    public function add()
    {
    	// Si l'utilisateur est connecté

    	if(auth()->check())
    	{
    		// On enregistre ses favoris dans la BDD
    	}

    	// Si l'utilisateur n'est pas connecté

    	else
    	{
    		// On enregistre ses favoris en localStorage
    	}

    	/*return view('pages.add-fav');*/
        
        return view('pages.fav');
    }
}