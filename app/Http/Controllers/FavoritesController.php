<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Favorite;

class FavoritesController extends Controller
{
    public function get(Request $request)
    {
        FavoritesController::post($request);
    }

    public function index()
    {
        if (auth()->check()) {
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
        /*$shops = DB::table('shops')->where('shop_id', '=', $_COOKIE['id'])
                                   ->get();

        // On envoie les magasins récupérés en BDD à la vue fav grâce au localStorage

        return view('pages.fav', [
            'shops' => $shops
        ]);*/
        //}
    }

    /*public function add(Request $request)
    {
        //{{route('add-favorites', $infos->id)}}
        if(auth()->check()){
            $id = $request->input('search');
            Favorite::create([
                    'user_id' => auth()->id(),
                    'shop_id' => $id
                ]
            );
        }
    }*/

    public function post(Request $request)
    {

        //{{route('add-favorites', $infos->id)}}
        if (auth()->check()) {
            $id = $request->input('id');
            $favorite = Favorite::firstOrCreate([
                    'user_id' => auth()->id(),
                    'shop_id' => $id
                ]
            );
            return json_encode($favorite);
        } else {
            return json_encode('pas Co');
        }
    }


}
