<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function addShop()
    {
        return view('pages.add-shop');
    }

    public function listShop()
    {
    	$shops = DB::table('shops')->get();

    	return view('pages.shops', [
            'shops' => $shops
        ]);
    }
}
