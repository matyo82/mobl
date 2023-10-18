<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $cartItems=CartItem::where('user_id',Auth::user()->id)->get();
            return view('front.cart',compact('cartItems'));
        }else{
            return to_route('register');
        }
    }


    public function addToCart(Product $product,Request $request)
    {
            $request->validate([
                'fabric_id' => 'nullable|exists:product_fabrics,id',
            ]);

            $cartItems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();

            // age mahsol ghablan to sabade user bode
//            foreach($cartItems as $cartItem)
//            {
//                if($cartItem->fabric_id == $request->fabric_id)
//                {
//                    $cartItem->update(['number' =>$cartItem->number + $request->number]);
//                    return back()->with('success', 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
//                }
//            }

            // age nabode
            $inputs = [];
            $inputs['fabric_id'] = $request->fabric_id;
            $inputs['user_id'] =  auth()->user()->id;
            $inputs['product_id'] =  $product->id;
            $inputs['number'] = 1;
            CartItem::create($inputs);

            return redirect()->route('front.product' , ['product' => $product->id])->with('success', 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
    }
}
