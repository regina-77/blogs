<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WriterDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
return view('writer.writerdashboard');
    }
}
