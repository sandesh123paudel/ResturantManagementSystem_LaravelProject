<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Category()
    {
        $category= Category::latest()->get();
        return view('admin.category.category',compact('category'));
    }


    public function AddCategory()
    {
        return view('admin.category.addcategory');
    }


    public function StoreCategory(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:categories|max:20',
            'category_icon'=>'required'


        ]);


        Category::insert([
            'name'=>$request->name,
            'category_icon'=>$request->category_icon

        ]);

        $notification = array(
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('admin.category')->with($notification);
        

    }

    public function EditCategory($id)
    {

        $category=Category::findOrFail($id);

        return view('admin.category.editcategory',compact('category'));
    }



    public function UpdateCategory(Request $request)
    {
        $pid = $request->id;


        Category::findOrFail($pid)->update([
            'name'=>$request->name,
            'category_icon'=>$request->category_icon

        ]);

        $notification = array(
            'message' => 'Category "' . $request->name . '" Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('admin.category')->with($notification);
        

    }
}
