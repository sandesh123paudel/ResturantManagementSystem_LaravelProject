<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;


class UserController extends Controller
{
    public function Users()
    {
        $user = User::orderBy('created_at', 'asc')->where('role','user')->paginate(8);
    
        return view('admin.users.users', compact('user'));


        
    }

}
