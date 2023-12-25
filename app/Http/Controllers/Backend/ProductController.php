<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{

    public function Product()
    {


        $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.products', compact('products'));

    }

    public function ViewProduct()
    {
        $viewproducts = Product::take(10)->get(); // Replace 10 with the number of products you want to display

        $categories = Category::all();

        return view('allproducts', compact('viewproducts', 'categories'));

    }

  // In your controller
  public function searchSort(Request $request)
  {
      $searchQuery = $request->input('search');
      $sortOption = $request->input('sort');
      $foodType = $request->input('food_type');
      $categoryId = $request->input('category');
  
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
          // Ensure the case is consistent (e.g., 'nonVeg' or 'Non-Veg')
          $query->where('item', strtolower($foodType));
      }
  
      // Apply sorting
      if ($sortOption == 'latest') {
          $query->orderBy('created_at', 'desc');
      } elseif ($sortOption == 'oldest') {
          $query->orderBy('created_at', 'asc');
      } else {
          // Default sorting by price
          // Ensure that $sortOption is either "asc" or "desc"
          $query->orderBy('price', $sortOption === 'asc' ? 'asc' : 'desc');
      }
  
      // Get the filtered products
      $viewproducts = $query->get();
  
      // You can add additional logic or filters here as needed
  
      $categories = Category::all(); // Assuming you have a Category model
  
      if ($viewproducts->isEmpty()) {
          // If no products found, return a message
          return view('allproducts', compact('categories','viewproducts'))->withErrors([]);
      }
  
      // If products are found, return the view with the products
      return view('allproducts', compact('viewproducts', 'categories'));
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

    public function EditProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.editproduct', compact('product', 'categories'));

    }


    public function UpdateProducts(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20|unique:products,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'item' => 'required|in:veg,non-veg',
        ]);

        // Retrieve the existing product
        $product = Product::findOrFail($id);

        // Delete the old image if it exists
        if ($request->hasFile('image') && $product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        // Update product information
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->item = $request->item;

        // Update image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }

        // Save changes to the database
        $product->update();

        $notification = [
            'message' => 'Product " ' . $request->name . ' " Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.products')->with($notification);
    }

    public function DeleteProduct(Request $request)
    {
        $id = $request->id;

        $product = Product::findOrFail($id);

        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);

        }

        $product->delete();

        $notification = [
            'message' => 'Product " ' . $product->name . ' " Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);



    }






}
