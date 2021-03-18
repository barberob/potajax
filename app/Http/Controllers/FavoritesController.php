<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        else{
            return view('pages.fav');
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

    static public function post(Request $request)
    {
        //dd($request->input('0')['type']);
        $type = $request->input('0')['type'];

        if ($type === 'create') {
            if (auth()->check()) {
                $id = $request->input('id');
                $favorite = Favorite::firstOrCreate([
                        'user_id' => auth()->id(),
                        'shop_id' => $id
                    ]
                );
                return json_encode($favorite);
            }
            /*else{
                return json_encode('pas Co');
            }*/
        } else if ($type === 'read') {
            /*if(auth()->check()){

            }
            else{*/
            $shops = null;
            //dd($request->all());
            foreach ($request->input('1') as $idShop) {
                $shops[] = DB::table('shops')->
                select('shops.id', 'shops.nom', 'shops.lat', 'shops.lng', 'shops.descriptif', 'shops.adresse', 'shops.subcategory_id', 'shops.category_id', 'subcategories.libelle as SubCat_libelle', 'categories.libelle as Cat_libelle', 'shops.created_at', 'shops.updated_at', 'shops.deleted_at')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                join('cities', 'cities.id', '=', 'shops.city_id')->
                where('shops.id', $idShop)->
                orderBy('shops.id')->
                get();
            }
            //dd(json_encode($shops));
            return FavoritesController::Fetch($shops);
            //}
        }
    }
    static public function Fetch($cats)
    {
        $lesCategorie = [];
        foreach ($cats as $cat) {
            foreach ($cat as $ct) {
                $lesCategorie[] = $ct;
            }
        }
        return $lesCategorie;
    }


        /*if(count($request->all()) > 1){
            //if (auth()->check()) {

                /*$shops = null;
                foreach ($request->all() as $idShop) {
                    $shops[] = DB::table('shops')->
                    select('shops.id', 'shops.nom', 'shops.lat', 'shops.lng', 'shops.descriptif', 'shops.adresse', 'shops.subcategory_id', 'shops.category_id', 'subcategories.libelle as sub_libelle', 'categories.libelle as libelle', 'shops.created_at', 'shops.updated_at', 'shops.deleted_at')->
                    join('categories', 'categories.id', '=', 'shops.category_id')->
                    join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                    join('cities', 'cities.id', '=', 'shops.city_id')->
                    where('shops.id', $idShop)->
                    orderBy('shops.id')->
                    get();
                }
                dd(json_encode($shops));
                return json_encode($shops);*/


            //} else {
            /*$shops = null;
            foreach ($request->all() as $idShop){

                $shops[] = DB::table('shops')->
                select('shops.id','shops.nom','shops.lat','shops.lng','shops.descriptif','shops.adresse','shops.subcategory_id','shops.category_id','subcategories.libelle as sub_libelle','categories.libelle as libelle','shops.created_at','shops.updated_at','shops.deleted_at')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                join('cities', 'cities.id', '=', 'shops.city_id')->
                where('shops.id', $idShop)->
                orderBy('shops.id')->
                get();
            }*/
            //dd(json_encode($shops));
            //return json_encode($shops);
            //}

        //} elseif (count($request->all()) === 1){
            //{{route('add-favorites', $infos->id)}}
            /*if (auth()->check()) {
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
    }*/



}
