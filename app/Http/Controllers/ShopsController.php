<?php

namespace App\Http\Controllers;

use App\Shops\Categorie;
use App\Shops\Picture;
use App\Shops\Shop;
use App\Shops\SubCategorie;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Storage;

class ShopsController extends Controller
{
    public function addShop()
    {
        return view('pages.add-shop');
    }

    public function updateShop()
    {

        return view('pages.add-shop');
    }

    public function postAddShop(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'required'],
            'category' => ['required'],
            'email' => ['required'],
            'siret' => ['required'],
            'hours' => ['required'],
            'adress' => ['required'],
            'street_number' => ['required'],
            'city' => ['required'],
            'cp' => ['required'],
            'tel' => ['required'],
//            'lat' => ['required', 'numeric'],
//            'lng' => ['required', 'numeric'],
//            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        $subcat = $request->subcategory === '-1' ? null : $request->subcategory;

        $shop = Shop::create([
            'nom' => $request->name,
            'descriptif' => $request->description,
            'adresse' => $request->adress,
            'adresse2' => $request->adress2,
            'cp' => $request->cp,
            'numRue' => $request->street_number,
            'tel' => $request->tel,
            'email' => $request->email,
            'siret' => $request->siret,
            'horaires' => $request->hours,
            'etat' => 0,
            'user_id' => Auth::id(),
            'city_id' => $request->citycode,
            'category_id' => $request->category,
            'subcategory_id' => $subcat,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $file)
            {
                $date = Carbon::now();
                $picture = Picture::create([
                    'url' => '',
                    'shop_id' => $shop->id
                ]);

                $name = $shop->id . '_' . $picture->id;
                $url = '/storage/shops/'.$date->year.'/'.$date->month.'/'.$date->day;
                $picture->url = $url . '/' .$name. '.' . $file->extension();
                $picture->save();

                $input['imagename'] = $name.'.'.$file->extension();

                if (!is_dir(public_path($url))) {
                    mkdir(public_path($url), 0775, true);
                }

                $filePath = public_path($url);

                $img = Image::make($file->path());
                $img->resize(400, 300, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);

                $filePath = public_path('/storage/shops/original');
                $file->move($filePath, $input['imagename']);
            }
        }
        return redirect()
            ->route('account')
            ->with('success','Création réussie');
    }

    public function listShop()
    {
    	$shops = DB::table('shops')->get();

    	return view('pages.shops', [
            'shops' => $shops
        ]);
    }
}
