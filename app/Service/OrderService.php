<?php

namespace App\Service;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderService 
{
    public function __construct(
        protected Order $order
    )
    {

    }

    public function saveOrder(Request $request)
    {
        $order = new Order();

        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->totalPrice = $request->input('totalPrice');
        $order->tracking_no = '#ODR' . rand(1111, 9999);
        $order->payment = $request->input('payment');
        $order->save();

        return $order;
    }
}