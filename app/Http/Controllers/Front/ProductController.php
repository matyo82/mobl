<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $products = Product::latest()->paginate(15);
        return view('front.product-list', compact('products'));
    }

    public function single(Product $product){
        return view('front.product' , ['product' => $product]);
    }
}