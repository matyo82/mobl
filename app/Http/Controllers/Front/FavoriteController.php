<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class FavoriteController extends Controller
{
    public function index()
	{
		return view('front.favorites');
	}
	
	
	public function removeFromCart(Product $product)
	{
		$user=auth()->user();
		$user->products()->detach($product->id);
		return back()->with('success','محصول با موفقیت از لیست علاقه مندیهای شما حذف شد');
	}
}
