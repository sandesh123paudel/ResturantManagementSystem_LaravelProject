<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderItems;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Support\Facades\Log;

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
            'payment' => 'required',
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
        $order->payment = $request->input('payment');

       
        try {
            if ($request->input('payment') == 'paypal') {
                

                $provider = new PayPalClient;
                
               
                $token= $provider->getAccessToken();

                
                $provider->setAccessToken($token);
                
                $orderPayPal = $provider->createOrder([
                    "intent" => "CAPTURE",
                    "application_context" => [
                        "return_url" => route('payment.success'),
                        "cancel_url" => route('payment.cancel'),
                    ],
                    "purchase_units" => [
                        0 => [
                            "amount" => [
                                "currency_code" => "USD",
                                "value" => $request->input('totalPrice')
                            ]
                        ]
                    ]
                ]);
                
                return redirect($orderPayPal['links'][1]['href']);
              
            }
        
       
            
             else {
                // Handle other payment methods
                $order->save();
            }

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
        } catch (\Exception $e) {
            Log::error('Error processing payment: ' . $e->getMessage());

            $notification = [
                'message' => 'Error processing payment. Please try again later.',
                'alert-type' => 'error',
            ];


            return redirect()->back()->withInput()->with($notification);
        }
    }

}
