<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function FindCat($tab_cat_id,$norEst,$sudOue){

        $categories = null;
        foreach ($tab_cat_id as $cat_id){
            $categories .= DB::table('shops')->
            where('shops.category_id','=',$cat_id)->
            whereBetween('shops.lat', [$norEst['lat'], $sudOue['lat']])->
            whereBetween('shops.lng', [$norEst['lng'], $sudOue['lng']])->
            get();
        }
        return $categories;
    }

    public function FindSubCat($tab_subcat_id,$norEst,$sudOue){

        $subcategories = null;
        foreach ($tab_subcat_id as $subcat_id){
            $subcategories .= DB::table('shops')->
            join('cities')->
            where('shops.subcategory_id','=',$subcat_id)->

            get();
        }
        return $subcategories;
    }

    public function create(Request $request)
    {
        //dd($request->all());
        //dd($request->input());

        //if(!$request->filled('message')) return redirect()->back()->with('error', 'You can\'t send an empty message');

        $cat = $request->input('categories');
        $subCat = $request->input('subcategories');
        $norEst = $request->input('northEast');
        $sudOue = $request->input('sudOuest');



        $categories = MapController::FindCat($cat,$norEst,$sudOue);
        dd($categories);

        $subCategories = MapController::FindSubCat($subCat,$norEst,$sudOue);
        //dd($subCategories);

        /*return [
            'categories' => $categories,
            'subcategories' => $subCategories,
        ];*/

        //return view('ajax-request');
    }



    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
