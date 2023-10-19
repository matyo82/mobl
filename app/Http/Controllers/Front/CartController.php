<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $cartItems=CartItem::where('user_id',Auth::user()->id)->get();			
			$allPrices=[];
			foreach($cartItems as $cartItem){
				array_push($allPrices,$cartItem->product->price);
			}
			$allPrices=array_sum($allPrices);
			$addresses=auth()->user()->addresses;
            return view('front.cart',compact('cartItems','addresses','allPrices'));
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
	
	
	public function submitOrder(Request $request)
	{
		$validated=$request->validate([
		'address_id'=>'required||exists:addresses,id',
		'prices'=>'required',
		]);
		$address=Address::where('id',$validated['address_id'])->first();
		$user=auth()->user();
		$inputs['user_id']=$user->id;
		$inputs['address_id']=$validated['address_id'];
		$inputs['address_object']=$address;
		$inputs['order_final_amount']=$validated['prices'];
		$inputs['order_status']=3;
		Order::updateOrCreate(['user_id' => $user->id, 'order_status' => 3],$inputs);
		
		dd('order sabt shod');
		
	}
	
	
	public function removeFromCart(CartItem $cartItem)
	{
		$cartItem->delete();
		return back();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


}
