<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function get(Request $request){

/*
        $cat = $request->input('categories');
        $subCat = $request->input('subcategories');
        $norEst = $request->input('northEast');
        $sudOue = $request->input('sudOuest');

        $categories = MapController::FindCat($cat,$subCat,$norEst,$sudOue);
        dd($categories);

*/
        dd('Bah nan dsl !!!');
    }

    public function FindCat($tab_cat_id,$tab_subcat_id,$norEst,$sudOue){
        $categories = null;

        if($tab_subcat_id[0] != null){

            if($tab_cat_id[0] == "All" && $tab_subcat_id[0] == "All"){
                $categories[] = DB::table('shops')->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            }
            else if($tab_subcat_id[0] == "All"){
                $categories[] = DB::table('shops')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                where('category_id', $tab_cat_id[0])->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            }
            else{
                $categories[] = DB::table('shops')->
                join('categories', 'categories.id', '=', 'shops.category_id')->
                where('category_id', $tab_cat_id[0])->
                where('subcategory_id', $tab_subcat_id[0])->
                whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
                whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
                get();
            }
        }

        if($tab_subcat_id[0] == null){
            $categories[] = DB::table('shops')->
            join('categories', 'categories.id', '=', 'shops.category_id')->
            where('category_id', $tab_cat_id[0])->
            whereBetween('lat', [$sudOue['lat'], $norEst['lat']])->
            whereBetween('lng', [$sudOue['lng'], $norEst['lng']])->
            get();
        }
        //dd($tab_cat_id[0]);

        //dd($categories);

        return MapController::unFetch($categories);
    }

    public function unFetch($cats){
        $lesCategorie = [];
        foreach ($cats as $cat){
            foreach ($cat as $ct) {
                $lesCategorie[] = $ct;
            }
        }
        //dd($lesCategorie);
        return $lesCategorie;
    }

    public function post(Request $request)
    {
        //dd($request->all());
        //dd($request->input());

        //if(!$request->filled('message')) return redirect()->back()->with('error', 'You can\'t send an empty message');

        $cat = $request->input('categories');
        $subCat = $request->input('subcategories');
        $norEst = $request->input('northEast');
        $sudOue = $request->input('sudOuest');


        $categories = MapController::FindCat($cat,$subCat,$norEst,$sudOue);
        //dd($categories);

        //$subCategories = MapController::FindSubCat($subCat,$norEst,$sudOue);
        //dd($subCategories);

        return [
            'categories' => $categories,
            /*'subcategories' => $subCategories,*/
        ];

        //return view('ajax-request');
    }



    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
