<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EmployeeTaskController extends Controller
{
    public function createjob()
    {
        return view('employer.jobs.create-jobs');
    }

    public function storejob(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|min:3',
            'category' => 'required',
            'deadline' => 'required|date',
            'description' => 'required|string',
        ]);

        $checkJobexists = Job::where('user_id', auth()->user()->id)->where('name', 'like', '%' . $request->name . '%')->where('description', 'like', '%' . $request->description . '%')->first();

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
            return to_route('employer.alljobs');
        }
    }
    public function alljobs()
    {
        $jobs= Job::all()->where('user_id', auth()->user()->id);
        return view('employer.jobs.my-jobs' ,compact('jobs'));
    }
}
