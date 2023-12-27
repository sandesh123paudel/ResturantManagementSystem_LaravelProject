<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomePageController extends Controller
{
    
    public function ViewCategoryHome()
    {
        $viewcategories = Category::all();
        
        $viewproducts = Product::inRandomOrder()->take(8)->get(); 
    
        return view('home', compact('viewcategories',('viewproducts')));

    }
}
