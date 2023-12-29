<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class FUserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();

        return view('user.myorders', compact('orders'));
    }


    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('user.vieworder', compact('orders'));
    }


    public function viewprofile()
    {

        return view('user.viewprofile');

    }


    public function editprofile($id)
    {

        $user = User::find($id);
        return view('user.editprofile', compact('user'));
    }

    public function updateprofile(Request $request,$id)
    {
        $user = User::findOrFail($id);
    
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'address' => ['max:255', 'required'],
            'phone' => [
                'string',
                'max:10',
                'min:10',
                'required',
                Rule::unique(User::class)->ignore($user->id),
            ],
        ];
    
        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }
    
        $request->validate($rules);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->update();
    
        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('my-profile')->with($notification);
    }


   
}
