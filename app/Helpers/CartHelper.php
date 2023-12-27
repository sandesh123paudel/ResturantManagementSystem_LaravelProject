<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartHelper{
    public static function CartCount()
    {

        $user_id = Auth::id();

        $cartnumber = Cart::where('user_id', $user_id)->count();

        return $cartnumber;

    }
}
