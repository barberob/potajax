<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops\Categorie;

class CategoriesController extends Controller
{
    public function listCat(){
        $categories = Categorie::all();


        return view('pages.home', [
            'categories' => $categories
        ]);
    }
}
