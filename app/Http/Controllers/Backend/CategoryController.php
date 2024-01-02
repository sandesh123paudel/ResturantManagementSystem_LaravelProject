<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


   
    public function category()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(5);
        

        return view('admin.category.category', compact('category'));
    }

    


    public function addCategory()
    {
        return view('admin.category.addcategory');
    }

  


    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:20',
            'category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        if ($request->hasFile('category_icon')) {
            $imagePath = $request->file('category_icon')->store('category_icons', 'public');
        } else {
            $imagePath = null;
        }

        Category::create([
            'name' => $request->name,
            'category_icon' => $imagePath,
        ]);

        $notification = [
            'message' => 'Category "' . $request->name . '" Created Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.category')->with($notification);
    }


    public function editCategory($id)
    {

        $category = Category::findOrFail($id);

        return view('admin.category.editcategory', compact('category'));
    }



    public function updateCategory(Request $request,$id)
    {
        

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:20',
            'category_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('category_icon')) {
            if ($category->category_icon) {
                Storage::disk('public')->delete($category->category_icon);
            }

            $imagePath = $request->file('category_icon')->store('category_icons', 'public');
        } else {
            $imagePath = $category->category_icon;
        }

        $category->update([
            'name' => $request->name,
            'category_icon' => $imagePath,
        ]);

        $notification = [
            'message' => 'Category "' . $request->name . '" Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.category')->with($notification);
    }


    public function deleteCategory(Request $request)
    {
        $id = $request->id;

        $category = Category::findOrFail($id);
        $categoryName = $category->name; 

        if ($category->category_icon) {
            Storage::disk('public')->delete($category->category_icon);
        }

        $category->delete();

        $notification = [
            'message' => 'Category "' . $categoryName . '" Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    















}
