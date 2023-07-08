<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function writerregister(){
        return view('auth.create-writer-account');
    }
    public function storewriter(Request $request)
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
        $add->assignRole('writer');

        return to_route('login');
    }

    
}
