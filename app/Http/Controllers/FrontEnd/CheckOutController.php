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


        return view('checkout', compact('cartItems'));
    }




    public function placeorder(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',

        ]);

        // Create a new order instance
        $order = new Order();

        // Populate order data from the request
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->totalPrice = $request->input('totalPrice');
        $order->tracking_no = '#ODR' . rand(1111, 9999);

        // Save the order to the database
        $order->save();

        // Retrieve cart items for the user
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Loop through cart items and create order items
        foreach ($cartItems as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->products->price,
            ]);
        }

        // Destroy the cart items for the user
        Cart::destroy($cartItems);

        // Redirect with a success message
        $notification = [
            'message' => 'Order Placed Successfully',
            'alert-type' => 'success',
        ];

        return redirect('/')->with($notification);
    }

}
