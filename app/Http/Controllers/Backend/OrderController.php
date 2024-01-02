<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function order()
    {


        
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);


        return view('admin.orders.orders', compact('orders'));

    }


    public function updateStatus(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);
        

        $order->update([
            'status' => $request->status,
        ]);

        $notification = [
            'message' => 'Order Updated Successfully',
            'alert-type' => 'success',

        ];

        return redirect()->route('admin.orders')->with($notification);
    }


    public function show($id)
{
    $order = Order::findOrFail($id);

    $orderItems = $order->orderItems()->with('product')->get();

    return view('admin.orders.show', compact('order', 'orderItems'));
}



}
