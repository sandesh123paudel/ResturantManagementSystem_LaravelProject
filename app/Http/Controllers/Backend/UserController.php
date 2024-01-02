<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function users()
    {
        $user = User::orderBy('created_at', 'asc')->where('role', 'user')->paginate(8);

        return view('admin.users.users', compact('user'));



    }


    public function addUsers()
    {
        $user = User::all();
        return view('admin.users.adduser', compact('user'));
    }

    public function storeUsers(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['max:255', 'required'],
            'phone' => ['string', 'max:10', 'min:10', 'required', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]);

        $notification = [
            'message' => 'User " ' . $request->name . ' " Created Successfully',
            'alert-type' => 'success',

        ];

        return redirect()->route('admin.users')->with($notification);

    }


    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.users.edituser', compact('user'));
    }


    public function updateUser(Request $request, $id)
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
            'message' => 'User "' . $request->name . '" Updated Successfully',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('admin.users')->with($notification);
    }

    public function deleteUser(Request $request)
    {
        $id=$request->id;

        $user= User::findOrFail($id);

        $user->delete();

        $notification = [
            'message' => 'Product " ' . $user->name . ' " Deleted Successfully',
            'alert-type' => 'success',
        ];
    
        return redirect()->back()->with($notification);

    }
    


}
