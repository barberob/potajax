<?php

namespace App\Http\Controllers;

use App\Shops\Categorie;
use App\Shops\SubCategorie;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function addShop()
    {
        $categories = Categorie::all();

        return view('pages.add-shop', [
            'categories' => $categories,
        ]);
    }

    public function postAddShop(Request $request)
    {
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'email' => ['required'],
            'siret' => ['required'],
            'hours' => ['required'],
            'adress' => ['required'],
            'street_number' => ['required'],
            'city' => ['required'],
            'cp' => ['required'],
            'lat' => ['required', 'number'],
            'lng' => ['required', 'number'],
        ]);
    }

    public function listShop()
    {
    	$shops = DB::table('shops')->get();

    	return view('pages.shops', [
            'shops' => $shops
        ]);
    }
}
