<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(ProductCategory $category)
    {
        if ($category->id)
            $products = $category->products();
        else
            $products = new Product();

        $products = $products->latest()->paginate(9);

        return view('front.product-list', compact('products' , 'category'));
    }

    public function single(Product $product)
    {
        return view('front.product', ['product' => $product]);
    }
}
