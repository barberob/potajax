<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//header('Content-type: application/json');

class MapController extends Controller
{
    public function get(Request $request)
    {


        $norEst = $request->input('northEast');
        $sudOue = $request->input('sudOuest');

        if($request->input('search')){
            $search = $request->input('search');

            $categories = MapController::FindSearch($search);
        }
        else {
            $cat = $request->input('categories');
            $subCat = $request->input('subcategories');

            $categories = MapController::FindCat($cat, $subCat, $norEst, $sudOue);
        }


        return json_encode($categories);


        /*$res[] = $categories = MapController::FindSearch($request->input('search'));
        $res[] = MapController::API($request->input('search'));
        dd($res);*/

        dd('Bah nan dsl !!!');
    }

    static function FindCat($tab_cat_id, $tab_subcat_id, $norEst, $sudOue)
    {
        $categories = null;

        if ($tab_subcat_id[0] != null) {

            if ($tab_cat_id[0] == "All" && $tab_subcat_id[0] == "All") {
                $categories[] = DB::table('shops')->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            } else if ($tab_subcat_id[0] == "All") {
                $categories[] = DB::table('shops')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                where('shops.category_id', $tab_cat_id[0])->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            } else {
                $categories[] = DB::table('shops')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                where('shops.category_id', $tab_cat_id[0])->
                where('shops.subcategory_id', $tab_subcat_id[0])->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            }
        }

        if ($tab_subcat_id[0] == null) {
            $categories[] = DB::table('shops')->
            join('categories', 'categories.id', '=', 'shops.category_id')->
            join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
            where('shops.category_id', $tab_cat_id[0])->
            whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
            whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
            get();
        }
        //dd($tab_cat_id[0]);

        //dd($categories);
        return MapController::Fetch($categories);
    }

    static function FindSearch($search){
        $shops = null;

        if ($search != null) {

            $shops[] = DB::table('shops')->
            join('categories', 'categories.id', '=', 'shops.category_id')->
            join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
            where('shops.nom', 'Like','%' . $search . '%')->
            get();

            if(count($shops[0]) > 0){
                return MapController::Fetch($shops);
            }else {
                $shops[] = DB::table('shops')->
                select('shops.id','shops.nom','shops.lat','shops.lng','shops.descriptif','shops.adresse','shops.subcategory_id','shops.category_id','subcategories.libelle','shops.created_at','shops.updated_at','shops.deleted_at')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                join('subcategories', 'subcategories.id', '=', 'shops.subcategory_id')->
                join('cities', 'cities.id', '=', 'shops.city_id')->
                where('cities.nom', 'Like','%' . $search . '%')->
                get();

                return MapController::Fetch($shops);
            }
        }
    }

    static public function findApi($search){
        $shops[] = MapController::API($search);

        dd($shops);
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

    public function post(Request $request){
        //dd($request->all());
        //dd($request->input());

        //if(!$request->filled('message')) return redirect()->back()->with('error', 'You can\'t send an empty message');

        if($request->input('search')){
            $search = $request->input('search');
            $search = str_replace("+", " ", $search);

            $research = MapController::FindSearch($search);

            return json_encode($research);
        }
        else{
            $norEst = $request->input('northEast');
            $sudOue = $request->input('sudOuest');
            $cat = $request->input('categories');
            $subCat = $request->input('subcategories');

            $categories = MapController::FindCat($cat, $subCat, $norEst, $sudOue);

            //$subCategories = MapController::FindSubCat($subCat,$norEst,$sudOue);
            //dd($subCategories);

            return json_encode($categories);
        }

        //dd($search);
        //return view('ajax-request');
    }

    public function store(Request $request){
        $data = $request->all();
        #create or update your data here

        return response()->json(['success' => 'Ajax request submitted successfully']);
    }

    static public function API($laRecherche){

        $query = $laRecherche;
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => "http://api-adresse.data.gouv.fr/search/?q=". urlencode($query),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
            ]
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            abort(403);
        } else {
            return json_decode($response)->features[0];
        }
    }
}
