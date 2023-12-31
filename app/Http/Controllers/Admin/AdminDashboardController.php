<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admindashboard');
    }
    public function createjob()
    {
        return view('admin.createjob');
    }
    public function adminstorejob(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|min:3',
            'category' => 'required',
            'deadline' => 'required|date',
            'description' => 'required|string',
        ]);

        $checkJobexists = Job::where('user_id', auth()->user()->id)->where('name', 'like', '%' . $request->name . '%')->first();

        if ($checkJobexists) {

            Toastr::warning('Seems you already have another task under the same name. Please confirm before trying again.', 'Hey', ["positionClass" => "toast-top-center"]);
            return redirect()->back();
        } else {
            $timenows = time();
            $checknums = "1234567898746351937463790";
            $checkstrings = "QWERTYUIOPLKJHGFDSAZXCVBNMmanskqpwolesurte191827273jkskalqKNJAHSGETWIOWKSNXJNEUDNEKDKSMKIDNUENDNXKSKEJNEJHCBRFGEWVJHBKWJEBFRNKWJENFECKWLERKJFNRKEHBJWEiwjWSIWMSWISWQOQOAWSAMJENEJEEDEWSSRFRFTHUJOKMNZBXVCX";
            $checktimelengths = 10;
            $checksnumlengths = 5;
            $checkstringlength = 5;
            $randnums = substr(str_shuffle($timenows), 0, $checktimelengths);
            $randstrings = substr(str_shuffle($checknums), 0, $checksnumlengths);
            $randcheckstrings = substr(str_shuffle($checkstrings), 0, $checkstringlength);
            $totalstring = str_shuffle($randcheckstrings . "" . $randnums . "" . $randstrings);

            $add = new Job();
            $add->user_id = auth()->user()->id;
            $add->name = $request->name;
            $add->category = $request->category;
            $add->deadline = $request->deadline;
            $add->description = $request->description;
            $add->slug = $totalstring;
            $add->status = "pending";
            $add->save();

            Toastr::success('You have successfully uploaded your job.',  ["positionClass" => "toast-top-right"]);
            // i guess the most appropriate page to redirect after adding new job is to the list of ther jobs,, other than taking the user to home page, then again he has to click to view the list of all jobs
            return to_route('admin.adminviewjobs');
        }
    }
    public function adminviewjob()
    {
        $jobs = Job::all();
        return view('admin.viewjobs', compact('jobs'));
    }
}
