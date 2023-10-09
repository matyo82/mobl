<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function home()
    {
		return view('front.index');
    }


}


