<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


use App\Models\Order;
use App\Models\OrderItems;


class CheckOutController extends Controller
{
    public function index()
    {


        $cartItems = Cart::where('user_id', Auth::id())->get();


        return view('user.checkout', compact('cartItems'));
    }




    public function placeorder(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',

        ]);

        $order = new Order();

        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->totalPrice = $request->input('totalPrice');
        $order->tracking_no = '#ODR' . rand(1111, 9999);

        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartItems as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->products->price,
            ]);
        }

        Cart::destroy($cartItems);

        $notification = [
            'message' => 'Order Placed Successfully',
            'alert-type' => 'success',
        ];

        return redirect('/')->with($notification);
    }

}
