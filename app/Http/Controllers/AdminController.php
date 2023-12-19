<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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



    public function Item()
    {
        return view('admin.items.item');
    }

    public function AddItem()
    {
        return view('admin.items.additem');
    }

    public function Products()
    {
        return view('admin.products.products');
    }

    public function AddProducts()
    {

        return view('admin.products.addproducts');
    }

    public function Orders()
    {

        return view('admin.orders.orders');
    }

    public function Users()
    {

        return view('admin.users.users');
    }
    public function AddUsers()
    {

        return view('admin.users.adduser');
    }


}
