<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;





class AdminController extends Controller
{
    

    public function AdminDashboard()
    {
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count();

        $totalAmountEarned = Order::where('status', 1)->sum('totalPrice');
    
        return view('admin.admin_dashboard', compact('totalOrders', 'totalUsers', 'totalAmountEarned'));
    } //End Method


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



}
