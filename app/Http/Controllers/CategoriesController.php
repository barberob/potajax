<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
		public function listCat(){
			$categories = DB::table('categories')->distinct()->get();
			

			return view('pages.home', [
	            'categories' => $categories
	        ]);
		}
}
