<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


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
        return view('admin.products.addproducts', compact('categories'));
    }

    public function StoreProducts(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:products|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'item' => 'required|in:veg,non-veg',
        ]);


        //Image Upload

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null;

        }


        //Save to Databsse

        Product::create([
            'name' => $request->name,
            'product_image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'item' => $request->item

        ]);


        $notification = [
            'message' => 'Product " ' . $request->name . ' " Created Successfully',
            'alert-type' => 'success',

        ];

        return redirect()->route('admin.products')->with($notification);







    }



}
