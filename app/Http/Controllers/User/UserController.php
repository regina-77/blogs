<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller

{



    public function storeuser(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|digits:10|unique:users,phone',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',

            ]
        );
        $add = new User();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->password = bcrypt($request->password);
        $add->save();
        $add->assignRole('employer');

        return to_route('login');
    }

    public function index()
    {
        return view('user.dashboard');
    }
}
