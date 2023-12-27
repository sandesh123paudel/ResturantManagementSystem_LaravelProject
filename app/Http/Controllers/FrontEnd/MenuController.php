<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    public function searchSort(Request $request)
    {

        
        $searchQuery = $request->input('search');
        $sortOption = $request->input('sort');
        $foodType = $request->input('food_type');
        $categoryId = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Start with all products
        $query = Product::query();

        // Apply search filter
        if ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        // Apply category filter
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Apply food type filter
        if ($foodType) {

            $query->where('item', strtolower($foodType));
        }
        if ($minPrice && $maxPrice) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }


        if ($sortOption == 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortOption == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sortOption == 'asc' || $sortOption == 'desc') {
            // Sorting by price
            $query->orderBy('price', $sortOption);
        }
        if ($minPrice && $maxPrice) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        } else {
            $query->orderBy('price', 'asc');
        }


        $viewproducts = $query->paginate(18);


        // You can add additional logic or filters here as needed

        $categories = Category::all(); // Assuming you have a Category model

        if ($viewproducts->isEmpty()) {
            // If no products found, return a message
            return view('allproducts', compact('categories', 'viewproducts', 'searchQuery', 'sortOption', 'foodType', 'categoryId'))->withErrors([]);
        }



        // If products are found, return the view with the products
        return view('allproducts', compact('viewproducts', 'categories', 'searchQuery', 'sortOption', 'foodType', 'categoryId'));
    }


    public function addCart(Request $request, $id)
    {

        if (auth()->user()) {

            $user_id = Auth::id();

            $product_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id = $user_id;

            $cart->product_id = $product_id;

            $cart->quantity = $quantity;

            $cart->save();

            


            return redirect()->back();
        } else {
            return redirect(route('login'));
        }


    }




}
