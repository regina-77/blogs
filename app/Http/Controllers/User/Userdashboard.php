<?php

namespace App\Http\Controllers\USer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Userdashboard extends Controller
{
    public function index(){
    return view('user.dashboard');
    }
}
