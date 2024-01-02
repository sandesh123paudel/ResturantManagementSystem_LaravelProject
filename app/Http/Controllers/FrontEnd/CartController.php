<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{

    public function cartCount(){
        $user_id = Auth::id();

        $cartnumber = Cart::where('user_id', $user_id)->count();
        
        return view('frontend.master', compact('cartnumber'));
    }

    public function addCart(Request $request, $id)
    {
        if (auth()->user()) {
            $user_id = Auth::id();
            $product_id = $id;
            $quantity = $request->quantity;
    
            $existingCartItem = Cart::where('user_id', $user_id)
                                    ->where('product_id', $product_id)
                                    ->first();
    
            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->quantity = $quantity;
                $cart->save();
            }

            $notification = [
                'message' => 'Product Added to Cart Successfully',
                'alert-type' => 'success',
            ];
    
            
    
            return redirect()->back()->with($notification);
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
    
        return view('user.cart', compact('cartData'));
    }
    



    public function removeCart($id)
    {

        $data=cart::find($id);

        $data->delete();

        return redirect()->back();

    }
    
    


}
