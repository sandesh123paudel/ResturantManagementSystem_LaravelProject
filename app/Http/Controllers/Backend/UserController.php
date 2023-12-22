<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\User;


class UserController extends Controller
{
    public function Users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.users.users', compact('users'));

    }
}
