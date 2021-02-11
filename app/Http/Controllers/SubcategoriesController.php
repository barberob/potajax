<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shops\Categorie; 
class SubcategoriesController extends Controller
{
    public function listSubcat($category_id){
		$subcategories = DB::table('subcategories')
		->distinct()
		->where("category_id","=",$category_id)
		->get();
		
		$categories = DB::table('categories')->distinct()->get();

		$current_category = Categorie::findOrFail($category_id)->libelle;
		//DB::table('categories')->where("id","=",$category_id)->get();

		

		return view('pages.map', [
            'subcategories' => $subcategories,
            'categories' => $categories,
            'current_category' => $current_category
        ]);
	}
}
