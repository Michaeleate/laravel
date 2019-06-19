<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use DateTime;
use DateInterval;

class JobsController extends Controller
{
    //Post job by Recruiter
    public function postjob(Request $request){
        $auth = Auth::guard('recruiter');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('recruiter.CRjob_rprof');
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
            return view('admin.CRjob_ajob');
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
            return view('users.viewsjob_prof')->with('jobid', $jobid);
        }
        else{
            return view('users.viewsjob_prof')->with('jobid', $jobid);
        }
    }

    //Get complete user profile for recruiter
    public function viewuserprof($userid,$jobid=null){
        if (Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
        //Testing

            $head=PostsController::get_head($userid);
            $resume=PostsController::get_resume($userid);
            $keyskills=PostsController::get_kskill($userid);
            $perdetails=PostsController::get_pdet($userid);
            $edu=PostsController::get_edu1($userid);
            $emp=PostsController::get_emp($userid);
            $adds=PostsController::get_add($userid);
            $refs=PostsController::get_ref($userid);
            $appstat=PostsController::get_appstatus($userid,$jobid);
            $jobdet=PostsController::get_viewsjob($jobid);
            $jobid=(int)($jobid);
            $appstat=(int)($appstat);

            $others=array('jobid'=>$jobid,'appstat'=>$appstat);

            return view('recruiter.viewuserprof',compact('others','head','resume','keyskills','perdetails','edu','emp','adds','refs','jobdet'));
        }
        else{
            return redirect()->route('recruiter');
        }
    }

    //Schedule interview for recruiter or admin
    public function schinterview(Request $request, $userid,$jobid=null){
        if (Auth::check() || Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
            //Testing
            // $message = "In viewjobdet of JobsController with Jobid" . $jobid;
            // echo "<script type='text/javascript'>alert('$message');</script>";
            $schid=PostsController::get_maxschid();
            if(isset($schid)){
                $schid=$schid + 1;
            }
            $starttime=$request->input('starttime'); //schedule start time
            $duration=$request->input('duration');
            
            $starttime1=new DateTime($starttime);
            $starttime1->add(new DateInterval('PT1H'));
            $endtime=$starttime1; //schedule end time
            $schedule_at=Carbon::now()->toDateTimeString();
            $schedule_byuser=$schedule_byrec=null;
            
            if(Auth::check()){
                $schedule_byuser=Auth::id();
            }
            else if(Auth::guard('recruiter')->check()){
                $schedule_byrec=Auth::guard('recruiter')->user()->id;
            }

            $schedule_stat=1;   //Initial schedule
            $schmsg=$request->input('schedule_msg');
            $interview_type=$request->input('intertype'); //Face to Face Interview
            $interview_round=$request->input('round'); //Initial
            $interview_stat=null;
            $interview_msg=null;
            $approve=1;         //Admin need to approve change to 0 in production

            $schedule=PostsController::upd_schedule($userid, $jobid, $schid, $starttime, $endtime, $schedule_at, $schedule_byuser, $schedule_byrec, $schedule_stat, $schmsg, $interview_type, $interview_round, $interview_stat, $interview_msg, $approve);

            $scheduleid=PostsController::upd_scheduleid($userid, $jobid, $schid);

            dd("Successfully inserted");
            // return view('recruiter.viewuserprof',compact('jobid','head','resume','keyskills','perdetails','edu','emp','adds','refs'));
        }
        else{
            return back();
        }
    }

    //Updated applied status by recruiter or admin
    public function shortlist($userid,$jobid=null){
        if (Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
        //Testing
        // $message = "In viewjobdet of JobsController with Jobid" . $jobid;
        // echo "<script type='text/javascript'>alert('$message');</script>";
            // $shortlisted=PostsController::get_shortlist($userid,$jobid);
            $appstat=4;
            $shortlisted=PostsController::upd_appstatus($userid,$jobid,$appstat);

            if($shortlisted==true){
                return back();
            }
            // return view('recruiter.viewuserprof',compact('jobid','head','resume','keyskills','perdetails','edu','emp','adds','refs'));
        }
        else{
            return back();
        }
    }

    //Shortlist for interview by recruiter or admin
    public function notshortlist($userid,$jobid=null){
        if (Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {
        //Testing
        // $message = "In viewjobdet of JobsController with Jobid" . $jobid;
        // echo "<script type='text/javascript'>alert('$message');</script>";
            $appstat=5;
            $notshortlist=PostsController::upd_appstatus($userid,$jobid,$appstat);

            if($notshortlist==true){
                return back();
            }
            // return view('recruiter.viewuserprof',compact('jobid','head','resume','keyskills','perdetails','edu','emp','adds','refs'));
        }
        else{
            return back();
        }
    }

    //Show full job details with parameter jobid
    public function userappjob($jobid){
        if (Auth::check()) {
        //$message = "In viewjobdet of JobsController with Jobid" . $jobid;
        //echo "<script type='text/javascript'>alert('$message');</script>";
            $authid = Auth::id();
            //$jobid=$jobid;
            //$check_val_credit=PostsController::check_val_credit();
            $apply_job=PostsController::user_apply_job($jobid);
            if($apply_job == true){
                return redirect()->back()->with('link',$apply_job);
                //dd("Job applied successfully");
            }
            //else{
                //dd("Job applied failed");
            //}

            //return view('users.viewsjob_prof')->with('jobid', $jobid);
        }
        else{
            return redirect()->route('login');
        }
    }

    //Auth candidate view all jobs
    public function uvalljobs(){
        $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';
        if (Auth::check() || Auth::guard('admin')->check() || Auth::guard('recruiter')->check()) {

            $jsearchall=PostsController::get_alljobs();
            return view('users.RDsearch',compact('jsearchall'));
        }
        else{
            return redirect()->route('login');
        }
    }

    //Auth candidate search and apply jobs
    public function uaplyjobs(){
        if (Auth::check() || Auth::guard('admin')->check()) {

            $jsearchall=PostsController::get_alljobs();
            return view('users.RDsearch',compact('jsearchall'));
        }
        else{
            return redirect()->route('login');
        }
    }

    //View application status of all jobs applied.
    public function ujallapplied(){
        if (Auth::check() || Auth::guard('admin')->check()) {
            //Testing
            // $message = "In ujallapplied of JobsController";
            // echo "<script type='text/javascript'>alert('$message');</script>";
            $jsearchall=PostsController::get_jallapplied();
            return view('users.jobstatus',compact('jsearchall'));
        }
        else{
            return redirect()->route('login');
        }
    }
}