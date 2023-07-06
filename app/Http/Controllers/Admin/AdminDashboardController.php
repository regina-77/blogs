<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.admindashboard');
    }
    public function createjob(){
        return view('admin.createjob');
    }
    public function adminstorejob(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'deadline'=>'required',
            'name'=>'required',
            
        ]);
        
$checkJobexists= Job::where('name', 'name')->where('description')

    
        

        return view('admin.createjob');
    }
}
