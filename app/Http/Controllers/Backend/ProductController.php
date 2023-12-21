<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{

    public function Product()
    {
       

        $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.products.products', compact('products'));
        
    }

    public function AddProducts()
    {
        $categories = Category::all();
        return view('admin.products.addproducts',compact('categories'));
    }



}
