<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $myshops = Shop::findOrFail($auth->id);
        return view('pages.account', ['auth'=> $auth, 'myshops'=> $myshops]);
    }
}
