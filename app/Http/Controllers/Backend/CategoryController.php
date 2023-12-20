<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function Category()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.category.category', compact('category'));
    }


    public function AddCategory()
    {
        return view('admin.category.addcategory');
    }

    public function SearchCategory(Request $request)
    {
        $searchQuery = $request->input('table_search');

    // Use the query to filter your categories
    $categories = Category::when($searchQuery, function ($query) use ($searchQuery) {
        return $query->where('name', 'like', '%' . $searchQuery . '%');
    })->paginate(10);

    return view('admin.category.category', compact('categories'));
    }



    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:20',
            'category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('category_icon')) {
            $imagePath = $request->file('category_icon')->store('category_icons', 'public');
        } else {
            $imagePath = null;
        }

        // Save to database
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


    public function EditCategory($id)
    {

        $category = Category::findOrFail($id);

        return view('admin.category.editcategory', compact('category'));
    }



    public function UpdateCategory(Request $request)
    {
        $pid = $request->id;

        $request->validate([
            'name' => 'required|unique:categories,name,' . $pid . '|max:20',
            'category_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        $category = Category::findOrFail($pid);

        // Handle file upload
        if ($request->hasFile('category_icon')) {
            // Delete the old file if it exists
            if ($category->category_icon) {
                Storage::disk('public')->delete($category->category_icon);
            }

            // Upload the new file
            $imagePath = $request->file('category_icon')->store('category_icons', 'public');
        } else {
            $imagePath = $category->category_icon;
        }

        // Update category
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


    public function DeleteCategory(Request $request)
    {
        $id = $request->id;

        $category = Category::findOrFail($id);
        $categoryName = $category->name; // Get the category name before deletion

        // Delete the category icon file if it exists
        if ($category->category_icon) {
            Storage::disk('public')->delete($category->category_icon);
        }

        // Delete the category from the database
        $category->delete();

        $notification = [
            'message' => 'Category "' . $categoryName . '" Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }















}
