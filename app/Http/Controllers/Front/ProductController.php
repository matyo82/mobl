<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list(ProductCategory $category)
    {
        if ($category->id)
            $products = $category->products();
        else
            $products = new Product();

        $products = $products->latest()->paginate(9);

        return view('front.product-list', compact('products', 'category'));
    }

    public function single(Product $product)
    {
//        dd(auth()->user()->products);
        $products = new Product();
        $products = $products->latest()->paginate(4);
        return view('front.product', compact('product','products'));
    }

    public function addToFavorite(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return back()->with('success', 'محصول با موفقیت به لیست علاقه مندی ها اضافه شد');
            } else {
                return back()->with('failed', 'محصول با موفقیت از لیست علاقه مندی ها حذف شد');
            }
        } else {
            return redirect()->route('login');
        }
    }
}