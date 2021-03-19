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

    public function postAddSubcategory(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        Categorie::findOrFail($category_id);
        if(SubCategorie::where('libelle', $request->name)->where('category_id', $category_id)->count() > 0)
            return redirect()->back();
        SubCategorie::create([
            'libelle' => $request->name,
            'category_id'=> $category_id
        ]);
        return redirect()->back()->with('success', 'Création réussie');
    }

    public function postAddCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        if(Categorie::where('libelle', $request->name)->count() > 0) return redirect()->back();
        Categorie::create([
            'libelle' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Création réussie');
    }

    public function getUpdateCategory($category_id)
    {
        $category = Categorie::findOrFail($category_id);
        return view('pages.update-category', [
            'category' => $category
        ]);
    }

    public function postUpdateCategory(Request $request, $category_id)
    {
        $category = Categorie::findOrFail($category_id);
        $request->validate([
            'name' => 'required|string'
        ]);
        $category->libelle = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Modification réussie');
    }

    public function postUpdateSubcategory(Request $request, $subcategory_id, $category_id)
    {
        $category = Categorie::findOrFail($category_id);
        $subcategory = SubCategorie::findOrFail($subcategory_id);
        $request->validate([
            'name' => 'required|string'
        ]);
        $subcategory->libelle = $request->name;
        $subcategory->save();
        return redirect()
            ->route('manage_subcategories', ['category_id' => $category->id])
            ->with('success', 'Modification réussie');
    }

    public function getUpdateSubcategory($subcategory_id, $category_id)
    {
        $subcategory = SubCategorie::findOrFail($subcategory_id);
        $category = Categorie::findOrFail($subcategory_id);
        return view('pages.update-subcategory', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }

}
