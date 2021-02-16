<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops\Categorie;
use App\Shops\Shop;
use App\Shops\SubCategorie;

class SubcategoriesController extends Controller
{
    public function listSubcat($category_id){
		$subcategories = SubCategorie::where('category_id',$category_id)->get(); 

		$categories = Categorie::all();

		$current_category = Categorie::findOrFail($category_id)->libelle;

		$shops = Shop::where("category_id",$category_id)->get();

		return view('pages.map', [
            'subcategories' => $subcategories,
            'categories' => $categories,
            'current_category' => $current_category,
            'shops' => $shops
        ]);
	}
}
