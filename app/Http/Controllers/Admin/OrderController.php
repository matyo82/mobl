<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('admin.orders.list',compact('orders'));
    }
	
	public function showFactor(Order $order)
	{
        return view('admin.orders.show-factor',compact('order'));
	}	
	
	public function details(Order $order)
	{
        return view('admin.orders.details',compact('order'));
	}
		
    public function changeOrderStatus(Order $order)
    {
		 switch($order->order_status){
			 
			case 0:
			$order->order_status=1;
			break;			
			
			case 1:
			$order->order_status=2;
			break;
			
			case 2:
			$order->order_status=3;
			break;
			
			case 3:
			$order->order_status=4;
			break;		
			
			case 4:
			$order->order_status=5;
			break;			

			case 5:
			$order->order_status=1;
			break;		

		}
		$order->save();
		return back();
    }

}
