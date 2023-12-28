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

    public function addCart(Request $request, $id)
    {
        if (auth()->user()) {
            $user_id = Auth::id();
            $product_id = $id;
            $quantity = $request->quantity;
    
            // Check if the product is already in the user's cart
            $existingCartItem = Cart::where('user_id', $user_id)
                                    ->where('product_id', $product_id)
                                    ->first();
    
            if ($existingCartItem) {
                // If the product is already in the cart, update the quantity
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                // If the product is not in the cart, create a new entry
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->quantity = $quantity;
                $cart->save();
            }
    
            return redirect()->back();
        } else {
            return redirect(route('login'));
        }
    }
    

    public function showCart()
    {
        $user_id = Auth::id();
        
        $cartData = cart::where('user_id', $user_id)
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->select('carts.*', 'products.name', 'products.description', 'products.price', 'products.product_image')
                        ->get();
    
        return view('cart', compact('cartData'));
    }
    



    public function removeCart($id)
    {

        $data=cart::find($id);

        $data->delete();

        return redirect()->back();

    }
    
    


}
