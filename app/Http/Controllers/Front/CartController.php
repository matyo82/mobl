<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $allPrices = [];
        foreach ($cartItems as $cartItem) {
            array_push($allPrices, $cartItem->product->price);
        }
        $allPrices = array_sum($allPrices);
        $addresses = auth()->user()->addresses;
        return view('front.cart', compact('cartItems', 'addresses', 'allPrices'));
    }


    public function addToCart(Product $product, Request $request)
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

        return redirect()->route('front.product', ['product' => $product->id])->with('success', 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
    }

    public function payment()
    {
        $order = $this->createOrder();
        $total_amount = $order->order_final_amount;

        session([
            'amount' => strval($total_amount),
            'order_id' => strval($order->id)
        ]);

        $invoice = (new Invoice)->amount($total_amount);

        return Payment::purchase($invoice, function ($driver, $transactionId) {
            session()->put('transaction_id', strval($transactionId));
        })->pay()->render();
    }

    public function verifyPayment()
    {
        $transaction_id = intval(session()->get('transaction_id'));
        $total_amount = intval(session()->get('amount'));
        $order_id = intval(session()->get('order_id'));

        try {

            Payment::amount($total_amount)->transactionId($transaction_id)->verify();
            $this->submitOrder($order_id);

            session()->forget(['transaction_id', 'amount', 'order_id']);
            return redirect()->route('front.profile')->with('payment-success', 'پرداخت شما با موفقیت انجام شد. میتوانید وضعیت سفارشتان را از صفحه پروفایل بررسی کنید.');

        } catch (InvalidPaymentException $exception) {

            session()->forget(['transaction_id', 'amount', 'order_id']);
            return redirect()->route('front.cart')->with('payment-failed', ['title' => 'پرداخت شما به دلیل زیر ناموفق بود :', 'message' => $exception->getMessage()]);

        }
    }

    public function createOrder()
    {
        $validated = request()->validate([
            'address_id' => 'required||exists:addresses,id',
            'prices' => 'required',
        ]);
        $user = auth()->user();
        $address = Address::where('id', $validated['address_id'])->first();


        //create order
        $inputs['user_id'] = $user->id;
        $inputs['address_id'] = $validated['address_id'];
        $inputs['address_object'] = $address;
        $inputs['order_final_amount'] = $validated['prices'];
        $inputs['order_status'] = 0;
        $order = Order::create($inputs);

        return $order;
    }

    public function submitOrder($order)
    {
        $user = auth()->user();
        
        $order = Order::find($order);
        $order->order_status = 3;
        $order->save();
        
        $cartItems = CartItem::where('user_id', $user->id)->get();

        //craete orderItems
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product' => $cartItem->product,
                'final_product_price' => $cartItem->product->price,
                'final_total_price' => $cartItem->product->price * $cartItem->number,
            ]);
            $cartItem->delete();
        }
    }


    public function removeFromCart(CartItem $cartItem)
    {
        $cartItem->delete();
        return back();
    }
}
