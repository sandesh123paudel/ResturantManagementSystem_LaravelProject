<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{

    public function CartCount(){
        $user_id = Auth::id();

        $cartnumber = Cart::where('user_id', $user_id)->count();
        
        return view('master', compact('cartnumber'));
    }
    
    


}
