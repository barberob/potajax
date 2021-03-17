<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request, $shop_id)
    {
        dump($shop_id);
        $request->validate([
            'code' => 'required'
        ]);
    }
}   
