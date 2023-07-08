<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $role = $user->getRoleNames()->first();
  
        if ($role == 'admin') {
            return to_route('admindashboard');
        } elseif ($role == 'writer') {
            return to_route('writerdashboard');
        }
        elseif($role=='editor'){
            return to_route('editordashboard');
        }
        elseif($role=='employer'){
            return to_route('employerdashboard');
        }
        else {
            return to_route('dashboard');
        }
         // return view('home');
    }
}
