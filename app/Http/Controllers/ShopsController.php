<?php

namespace App\Http\Controllers;

use App\Shops\Categorie;
use App\Shops\Picture;
use App\Shops\SubCategorie;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function addShop()
    {
        return view('pages.add-shop');
    }

    public function postAddShop(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'category' => ['required'],
            'email' => ['required'],
            'siret' => ['required'],
            'hours' => ['required'],
            'adress' => ['required'],
            'street_number' => ['required'],
            'city' => ['required'],
            'cp' => ['required'],
//            'lat' => ['required', 'numeric'],
//            'lng' => ['required', 'numeric'],
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);
                Picture::create([
                    'url' => '/uploads/'.$name
                ]);
            }
        }

        return redirect()->back()->with('success', 'File has successfully uploaded!');

    }

    public function listShop()
    {
    	$shops = DB::table('shops')->get();

    	return view('pages.shops', [
            'shops' => $shops
        ]);
    }
}
