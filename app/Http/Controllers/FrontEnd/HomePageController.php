<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomePageController extends Controller
{
    
    public function viewCategoryHome()
    {
        $viewcategories = Category::all();
        
        $viewproducts = Product::inRandomOrder()->take(8)->get(); 
    
        return view('frontend.home', compact('viewcategories',('viewproducts')));

    }
}
