<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Shops\Shop;
use App\Shops\Picture;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$auth = Auth::user();
        $myshops = Shop::with('pictures')->where('user_id', $auth->id)->get();
        
        

        // $visit = DB::table('visits')->
        return view('pages.account', ['auth'=> $auth, 'myshops'=> $myshops]);
    }
}
