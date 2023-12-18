<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    

    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    } //End Method


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function Category()
    {
        return view('admin.category.category');
    }

    public function AddCategory()
    {
        return view('admin.category.addcategory');
    }

    public function Item()
    {
        return view('admin.items.item');
    }

    public function AddItem()
    {
        return view('admin.items.additem');
    }

}
