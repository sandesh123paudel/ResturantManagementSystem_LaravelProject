<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class FUserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();

        return view('user.myorders', compact('orders'));
    }


    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('user.vieworder', compact('orders'));
    }
}
