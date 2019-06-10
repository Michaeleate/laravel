<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class JobsController extends Controller
{
    //Post job by Recruiter
    public function postjob(Request $request){
        $auth = Auth::guard('recruiter');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('recruiter.CRjob-rprof');
        }
        else {
            return redirect('/recruiter');
        }
    }
    
    //Post Job by Admin
    public function pjbyadm(Request $request){
        $auth = Auth::guard('admin');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('admin.CRjob-ajob');
        }
        else {
            return redirect('/mikeadmin');
        }
    }
    
    //Search results are shown here
    public function searchjobs(Request $request){
        //$message = "Inside searchjobs of RecprofController - Before If";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        if (Auth::check() || Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
            //return view('users.RDsearch');

            $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';
    
            $jsearchall=PostsController::get_jsearchall($request);
        
            return view('users.RDsearch',compact('jsearchall'));
        }
        else {
            return redirect('/login');
        }
    }

    //Show full job details with parameter jobid
    public function viewjobdet($jobid){
        if (Auth::check() || Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
        //$message = "In viewjobdet of JobsController with Jobid" . $jobid;
        //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('users.viewsjob-prof')->with('jobid', $jobid);
        }
        else{
            return view('users.viewsjob-prof')->with('jobid', $jobid);
        }
    }
}