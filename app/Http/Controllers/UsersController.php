<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Shops\Shop;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$auth = Auth::user();
        $myshops = Shop::all()->where('user_id', $auth->id);
        // $visit = DB::table('visits')->
        return view('pages.account', ['auth'=> $auth, 'myshops'=> $myshops]);
    }

    public function connect()
    {
        $auth = Auth::user();
        return view('layouts.nav', [
            'auth' => $auth
        ]);
    }
}
