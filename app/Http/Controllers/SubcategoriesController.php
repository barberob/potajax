<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SubcategoriesController extends Controller
{
    public function listSubcat($category_id){
		$subcategories = DB::table('subcategories')
		->distinct()
		->where("category_id","=",$category_id)
		->get();
		
		$categories = DB::table('categories')->distinct()->get();
		return view('pages.map', [
            'subcategories' => $subcategories,
            'categories' => $categories
        ]);
	}
}
