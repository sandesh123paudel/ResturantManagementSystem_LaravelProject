<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Service\OrderService;
use App\Models\Order;
use App\Models\OrderItems;
use App\Service\PayPalService;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Log;

class CheckOutController extends Controller
{

    public function __construct(
        protected PayPalService $payPalService,
        protected Order $order,
        protected OrderService $orderService,
        )
    {

    }

    public function index()
    {


        $cartItems = Cart::where('user_id', Auth::id())->get();


        return view('user.checkout', compact('cartItems'));
    }
    public function placeorder(Request $request)
    {
        try {

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'payment' => 'required',
        ]);
        DB::beginTransaction();
        switch ($request->payment) {
            case "paypal":
                $orderPayPal = $this->payPalService->payment($request);

               $order = $this->orderService->saveOrder($request);
               $this->deleteCart($order);
               DB::commit();
                return redirect($orderPayPal['links'][1]['href']);
            case "cash_on_delivery":
                // Save order details for cash on delivery
                $order = $this->orderService->saveOrder($request);
                $this->deleteCart($order);
                $notification = [
                    'message' => 'Order Placed Successfully',
                    'alert-type' => 'success',
                ];
                DB::commit();
                return redirect('/')->with($notification);
        }
        
        
        switch ($request->payment)
        {

            case "paypal":
                $orderPayPal= $this->payPalService->payment($request);
            
                 return redirect($orderPayPal['links'][1]['href']);
            case "cash_on_delivery":
                $notification = [
                    'message' => 'Order Placed Successfully',
                    'alert-type' => 'success',
                ];
                DB::commit();
                return redirect('/')->with($notification);
        }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error processing payment: ' . $e->getMessage());

            $notification = [
                'message' => 'Error processing payment. Please try again later.',
                'alert-type' => 'error',
            ];


            return redirect()->back()->withInput()->with($notification);
        }
    }

    private function deleteCart(Order $order)
    {
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
    }

}
