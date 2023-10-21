<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
	{
		$orders = Order::take(5)->get();
		$ordersWaitForPay=Order::where('order_status',0)->get()->count();
		$ordersCount=Order::count();
		$ordersThatSends=Order::where('order_status',1)->get()->count();
		$ordersThatCanceled=Order::where('order_status',2)->get()->count();
		$ordersThatSubmit=Order::where('order_status',3)->get()->count();
		$ordersMarjue=Order::where('order_status',4)->get()->count();
		$allUsers=User::count();
		$users=User::where('user_type',0)->get()->count();
		$admins=User::where('user_type',1)->get()->count();
		return view('admin.index',compact('orders','ordersCount','ordersWaitForPay','ordersThatSends','ordersThatCanceled','ordersThatSubmit','ordersMarjue','allUsers','users','admins'));
	}
}
