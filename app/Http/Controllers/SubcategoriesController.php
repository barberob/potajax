<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SubcategoriesController extends Controller
{
    public function listSubcat(){
		$subcategories = DB::table('subcategories')->distinct()->get();
		

		return view('pages.map', [
            'subcategories' => $subcategories
        ]);
	}
}
