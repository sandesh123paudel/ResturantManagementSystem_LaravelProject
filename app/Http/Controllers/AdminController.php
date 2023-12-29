<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;






class AdminController extends Controller
{



    public function AdminDashboard()
    {
        // Fetch daily orders and earnings data for the current month
        $dailyData = $this->getDailyData();

        // Rest of the code remains the same
        $totalOrders = Order::where('status', 1)->count();
        $totalUsers = User::where('role', 'user')->count();
        $totalAmountEarned = Order::where('status', 1)->sum('totalPrice');

        return view('admin.admin_dashboard', compact('totalOrders', 'totalUsers', 'totalAmountEarned', 'dailyData'));
    }

    private function getDailyData()
    {
        $currentMonth = Carbon::now()->month;
        $daysInMonth = Carbon::now()->daysInMonth;

        $labels = [];
        $ordersData = [];
        $earnedData = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create(null, $currentMonth, $day);
            $ordersCount = Order::whereDate('created_at', $date)->where('status', 1)->count();
            $earnedAmount = Order::whereDate('created_at', $date)->where('status', 1)->sum('totalPrice');

            $labels[] = $date->format('M d'); // Format the date as per your requirement
            $ordersData[] = $ordersCount;
            $earnedData[] = $earnedAmount;
        }

        return ['labels' => $labels, 'ordersData' => $ordersData, 'earnedData' => $earnedData];
    }


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



}
