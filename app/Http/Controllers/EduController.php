<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Debugbar;
use App\modresuedu;

class EduController extends Controller
{
    public function updatexth(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $qual=$request->input('qual1');
            $board=$request->input('board1');
            $pyear=$request->input('passyear1');
            $edulang=$request->input('medium1');
            $percentage=$request->input('marks1');
            $colname=$request->input('college1');
            $course='';
            $spec='';
            $district='';
            $cortype='';
            
            $this->updatedb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aed10'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updatexiith(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $qual=$request->input('qual2');
            $board=$request->input('board2');
            $pyear=$request->input('passyear2');
            $edulang=$request->input('medium2');
            $percentage=$request->input('marks2');
            $colname=$request->input('college2');
            $course='';
            $spec='';
            $district='';
            $cortype='';
            
            $this->updatedb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aed12'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updategrad(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $qual=$request->input('qual3');
            $board='';
            $course=$request->input('course3');
            $spec=$request->input($course);
            $colname=$request->input('college3');
            $district=$request->input('district3');
            $cortype=$request->input('coursetype3');
            $pyear=$request->input('passyear3');
            $edulang=$request->input('medium3');
            $percentage=$request->input('marks3');

            $this->updatedb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aedgrad'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updatepg(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $qual=$request->input('qual4');
            $board='';
            $course=$request->input('course4');
            $spec=$request->input($course);
            $colname=$request->input('college4');
            $district=$request->input('district4');
            $cortype=$request->input('coursetype4');
            $pyear=$request->input('passyear4');
            $edulang=$request->input('medium4');
            $percentage=$request->input('marks4');

            $this->updatedb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aedpg'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    private function updatedb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuedu::updateOrCreate(
               [
                'edu_id'    => $authid,
                'qual'      => $qual
               ],
               [ 
                'board'     => $board,
                'course'    => $course,
                'spec'      => $spec,
                'colname'   => $colname,
                'district'  => $district,
                'cortype'   => $cortype,
                'pyear'     => $pyear,
                'edulang'   => $edulang,
                'percentage' => $percentage
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }
}