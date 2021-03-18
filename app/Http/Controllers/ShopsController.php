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
use Illuminate\Support\Facades\URL;
use Image;
use Storage;

class ShopsController extends Controller
{
    public function addShop()
    {
        $categories = Categorie::all();
        return view('pages.add-update-shop', ['categories' => $categories]);
    }

    public function updateShop($id)
    {
        $shop = Shop::findOrFail($id);
        if($shop->user_id !== Auth::id()) abort(403);
        $categories = Categorie::all();
        return view('pages.add-update-shop', [
            'shop' => $shop,
            'categories' => $categories
        ]);
    }

    public function postAddUpdateShop(Request $request, $id = null)
    {
        $request->session()->put('requestReferrer', URL::previous());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'siret' => ['required', 'max:14'],
            'hours' => ['required'],
            'adress' => ['required'],
            'street_number' => ['required'],
            'city' => ['required'],
            'cp' => ['required', 'digits:5'],
            'tel' => ['required', 'regex:/^[0-9 ]+$/'],
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'images' => function($attribute, $value, $fail) {
                if (count($value) > 4) {
                    return $fail('le champ d\'' . $attribute . ' est limité à 4 fichiers maximum.');
                }
            }
        ]);


        $subcat = $request->subcategory === '-1' ? null : $request->subcategory;

        $shop = Shop::updateOrCreate(
            ['id' => $id],
            [
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
            $db_pictures_count = Picture::where('shop_id', $id)->count();
            $max_files = Picture::MAX_FILES - $db_pictures_count;
            if(count($request->file('images')) > $max_files) {
                return redirect($request->session()->get('requestReferrer'))
                    ->withInput()
                    ->with('too_much_files');
            }
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
            ->with('success','Enregistrement réussi');
    }

    public function listShop()
    {
    	$shops = DB::table('shops')->get();

    	return view('pages.shops', [
            'shops' => $shops
        ]);
    }

    public function stats($id)
    {
        $nbVisits = count(DB::table('visits')->where('shop_id', '=', $id)->get());

        return view('pages.stats', [
            'visits' => $nbVisits
        ]);
    }
}
