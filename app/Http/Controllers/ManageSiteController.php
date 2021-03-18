<?php

namespace App\Http\Controllers;

use App\Shops\Categorie;
use App\Shops\SubCategorie;
use Illuminate\Http\Request;

class ManageSiteController extends Controller
{
    public function __construct()
    {
       $this->middleware('admin');
    }

    public function index()
    {
        return view('pages.manage-site');
    }

    public function categories()
    {
        $categories = Categorie::with('subcategories')->get();
        return view('pages.manage-categories', [
            'categories' => $categories
        ]);
    }

    public function subcategories($category_id)
    {
        $category = Categorie::find($category_id);
        $subcategories = SubCategorie::where('category_id', $category_id)->get();
        return view('pages.manage-subcategories', [
            'category' => $category,
            'subcategories' => $subcategories
        ]);
    }

    public function postAddSubcategories(Request $request, $category_id)
    {
        dd($request);
    }
}
