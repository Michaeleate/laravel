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
use App\modresuhead;
use App\modresuload;
use App\modresukskil;
use App\modresupdet;
use App\modresuedu;
use App\modresuemp;
use App\modresuadd;
use App\modresuref;
use App\recruiter\modrecpdet;
use App\recruiter\modrecbdet;
use App\recruiter\modrecabout;
use App\recruiter\modrecsarea;

class PostsController extends Controller
{
    public static function get_head() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $head = \App\modresuhead::select('head_line')
                    ->where('head_id', '=', $authid)
                    ->get();
            //echo "In get_profile function- ".$head;
            return $head;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_resume() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuload::select('oldresu','updated_at')
                    ->where('resu_id', '=', $authid)
                    ->get();
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }
    
    public static function get_kskill() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresukskil::select('kskil1','kskil2','kskil3','kskil4','kskil5')
                    ->where('kskil_id', '=', $authid)
                    ->get();

            if (\Request::is('view-user-profile')) {
                foreach($resume as $key=>$val){
                    
                    $skill=$val["kskil1"];
                    switch ($skill){
                        case "1":
                        $skill="Marketing";
                            break;
                        case "2":
                        $skill="Data Entry Operator";
                            break;
                        case "3":
                        $skill="Telecaller";
                            break;
                        case "4":
                        $skill="Computer Operator";
                            break;
                        case "5":
                        $skill="Front Office Executive";
                            break;
                        case "6":
                        $skill="Sales";
                            break;
                        case "7":
                        $skill="Admin";
                            break;
                        case "8":
                        $skill="Driver";
                            break;
                        case "9":
                        $skill="Accountant";
                            break;
                        case "10":
                        $skill="Security";
                            break;
                        case "11":
                        $skill="Delivery Boy";
                            break;
                        case "12":
                        $skill="Housekeeping";
                            break;
                        case "13":
                        $skill="Maid";
                            break;
                        case "14":
                        $skill="Cook";
                            break;
                        case "15":
                        $skill="Receptionist";
                            break;
                        case "16":
                        $skill="Teacher";
                            break;
                        case "17":
                        $skill="Office Boy";
                            break;
                        case "18":
                        $skill="Civil Engineer";
                            break;
                        case "19":
                        $skill="Mechanical Engineer";
                            break;
                        case "20":
                        $skill="Information Technology";
                            break;
                    }
                    $val["kskil1"]=$skill;
                    
                    $skill=$val["kskil2"];
                    switch ($skill){
                        case "1":
                        $skill="Marketing";
                            break;
                        case "2":
                        $skill="Data Entry Operator";
                            break;
                        case "3":
                        $skill="Telecaller";
                            break;
                        case "4":
                        $skill="Computer Operator";
                            break;
                        case "5":
                        $skill="Front Office Executive";
                            break;
                        case "6":
                        $skill="Sales";
                            break;
                        case "7":
                        $skill="Admin";
                            break;
                        case "8":
                        $skill="Driver";
                            break;
                        case "9":
                        $skill="Accountant";
                            break;
                        case "10":
                        $skill="Security";
                            break;
                        case "11":
                        $skill="Delivery Boy";
                            break;
                        case "12":
                        $skill="Housekeeping";
                            break;
                        case "13":
                        $skill="Maid";
                            break;
                        case "14":
                        $skill="Cook";
                            break;
                        case "15":
                        $skill="Receptionist";
                            break;
                        case "16":
                        $skill="Teacher";
                            break;
                        case "17":
                        $skill="Office Boy";
                            break;
                        case "18":
                        $skill="Civil Engineer";
                            break;
                        case "19":
                        $skill="Mechanical Engineer";
                            break;
                        case "20":
                        $skill="Information Technology";
                            break;
                    }
                    $val["kskil2"]=$skill;
                    
                    $skill=$val["kskil3"];
                    switch ($skill){
                        case "1":
                        $skill="Marketing";
                            break;
                        case "2":
                        $skill="Data Entry Operator";
                            break;
                        case "3":
                        $skill="Telecaller";
                            break;
                        case "4":
                        $skill="Computer Operator";
                            break;
                        case "5":
                        $skill="Front Office Executive";
                            break;
                        case "6":
                        $skill="Sales";
                            break;
                        case "7":
                        $skill="Admin";
                            break;
                        case "8":
                        $skill="Driver";
                            break;
                        case "9":
                        $skill="Accountant";
                            break;
                        case "10":
                        $skill="Security";
                            break;
                        case "11":
                        $skill="Delivery Boy";
                            break;
                        case "12":
                        $skill="Housekeeping";
                            break;
                        case "13":
                        $skill="Maid";
                            break;
                        case "14":
                        $skill="Cook";
                            break;
                        case "15":
                        $skill="Receptionist";
                            break;
                        case "16":
                        $skill="Teacher";
                            break;
                        case "17":
                        $skill="Office Boy";
                            break;
                        case "18":
                        $skill="Civil Engineer";
                            break;
                        case "19":
                        $skill="Mechanical Engineer";
                            break;
                        case "20":
                        $skill="Information Technology";
                            break;
                    }
                    $val["kskil3"]=$skill;

                }
            }

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_pdet() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresupdet::select('fname','email','mob_num','gender','dob', 'marstat','eng_lang','tel_lang','hin_lang','oth_lang','diff_able','able1','able2','able3','profpic','picpath','picname')
                    ->where('pdet_id', '=', $authid)
                    ->get();

            foreach($resume as $key=>$val){
                if ($val["gender"]=='M'){
                    $val["gender"]='0';
                }
                else{
                    $val["gender"]='1';
                }

                if ($val["marstat"]=='S'){
                    $val["marstat"]='0';
                }
                else{
                    $val["marstat"]='1';
                }

                if ($val["diff_able"]=='yes'){
                    $val["diff_able"]='0';
                }
                else{
                    $val["diff_able"]='1';
                }

                list($name11, $ext11) = explode('.', $val["picname"]);
                $val["picpath"]=$val["picpath"]."/".$authid.".".$ext11;

            }
            
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_edu() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuedu::select('qual','board','course','spec','colname', 'district','cortype','pyear','edulang','percentage','updated_at')
                    ->where('edu_id', '=', $authid)
                    ->get();

            if (\Request::is('view-user-profile')) {
                foreach($resume as $key=>$val){
                
                }
            }
            
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_edu1() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuedu::select('qual','board','course','spec','colname', 'district','cortype','pyear','edulang','percentage','updated_at')
                    ->where('edu_id', '=', $authid)
                    ->get();

            if (\Request::is('view-user-profile')) {
                foreach($resume as $key=>$val){
                    if (true){
                        switch ($val["percentage"]){
                            case "1":
                            $val["percentage"]="&lt; 40%";
                                break;
                            case "2":
                            $val["percentage"]="40-44.9%";
                                break;
                            case "3":
                            $val["percentage"]="45-49.9%";
                                break;
                            case "4":
                            $val["percentage"]="50-54.9%";
                                break;
                            case "5":
                            $val["percentage"]="55-59.9%";
                                break;
                            case "6":
                            $val["percentage"]="60-64.9%";
                                break;
                            case "7":
                            $val["percentage"]="65-69.9%";
                                break;
                            case "8":
                            $val["percentage"]="70-74.9%";
                                break;
                            case "9":
                            $val["percentage"]="75-79.9%";
                                break;
                            case "10":
                            $val["percentage"]="80-84.9%";
                                break;
                            case "11":
                            $val["percentage"]="85-89.9%";
                                break;
                            case "12":
                            $val["percentage"]="90-94.9%";
                                break;
                            case "13":
                            $val["percentage"]="95-99.9%";
                                break;
                            case "14":
                            $val["percentage"]="100%";
                                break;
                            case "15":
                            $val["percentage"]="studying";
                                break;
                        }
                    }

                    if($val["qual"]=="grad"){
                        switch ($val["course"]){
                            case "0":
                                $val["course"]="B.A";
                                break;
                            case "1":
                                $val["course"]="B.Arch";
                                break;
                            case "2":
                                $val["course"]="B.B.A/B.M.S";
                                break;
                            case "3":
                                $val["course"]="B.Com";
                                break;
                            case "4":
                                $val["course"]="B.Des.";
                                break;
                            case "5":
                                $val["course"]="B.Ed";
                                break;
                            case "6":
                                $val["course"]="B.EI.Ed";
                                break;
                            case "7":
                                $val["course"]="B.P.Ed";
                                break;
                            case "8":
                                $val["course"]="B.Pharma";
                                break;
                            case "9":
                                $val["course"]="B.Sc";
                                break;
                            case "10":
                                $val["course"]="B.Tech/B.E.";
                                break;
                            case "11":
                                $val["course"]="B.U.M.S";
                                break;
                            case "12":
                                $val["course"]="BAMS";
                                break;
                            case "13":
                                $val["course"]="BCA";
                                break;
                            case "14":
                                $val["course"]="BDS";
                                break;
                            case "15":
                                $val["course"]="BFA";
                                break;
                            case "16":
                                $val["course"]="BHM";
                                break;
                            case "17":
                                $val["course"]="BHMS";
                                break;
                            case "18":
                                $val["course"]="BVSC";
                                break;
                            case "19":
                                $val["course"]="Diploma";
                                break;
                            case "20":
                                $val["course"]="LLB";
                                break;
                            case "21":
                                $val["course"]="MBBS";
                                break;
                            case "22":
                                $val["course"]="Other";
                                break;
                        }
                    }

                    if($val["qual"]=="pg"){
                        switch ($val["course"]){
                            case "1":
                                $val["course"]="CA";
                                break;
                            case "2":
                                $val["course"]="CS";
                                break;
                            case "3":
                                $val["course"]="DM";
                                break;
                            case "4":
                                $val["course"]="ICWA (CMA)";
                                break;
                            case "5":
                                $val["course"]="Integrated PG";
                                break;
                            case "6":
                                $val["course"]="LLM";
                                break;
                            case "7":
                                $val["course"]="M.A";
                                break;
                            case "8":
                                $val["course"]="M.Arch";
                                break;
                            case "9":
                                $val["course"]="M.Ch";
                                break;
                            case "10":
                                $val["course"]="M.Com";
                                break;
                            case "11":
                                $val["course"]="M.Des.";
                                break;
                            case "12":
                                $val["course"]="M.Ed";
                                break;
                            case "13":
                                $val["course"]="M.Pharma";
                                break;
                            case "14":
                                $val["course"]="MS/ M.Sc(Science)";
                                break;
                            case "15":
                                $val["course"]="M.Tech";
                                break;
                            case "16":
                                $val["course"]="MBA/PGDM";
                                break;
                            case "17":
                                $val["course"]="MCA";
                                break;
                            case "18":
                                $val["course"]="MCM";
                                break;
                            case "19":
                                $val["course"]="MDS";
                                break;
                            case "20":
                                $val["course"]="MFA";
                                break;
                            case "21":
                                $val["course"]="Medical-MS/MD";
                                break;
                            case "22":
                                $val["course"]="MVSC";
                                break;
                            case "23":
                                $val["course"]="PG Diploma";
                                break;
                            case "24":
                                $val["course"]="Other";
                                break;
                        }
                    }
                }
            }
            
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_emp() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuemp::select('emp_name','desg','startdt','enddt','msal', 'resp','nperiod','updated_at')
                    ->where('emp_id', '=', $authid)
                    ->get();

            if (\Request::is('view-user-profile')) {
                foreach($resume as $key=>$val){
                    switch($val["nperiod"]){
                        case "now":
                            $val["nperiod"]="Immediate";
                            break;                        
                        case "15d":
                            $val["nperiod"]="15 days";
                            break;                        
                        case "1mon":
                            $val["nperiod"]="1 Month";
                            break;                        
                        case "2mon":
                            $val["nperiod"]="2 Months";
                            break;
                        case "3mon":
                            $val["nperiod"]="3 Months";
                            break;
                        case "short":
                            $val["nperiod"]="Serving Notice Period";
                            break;
                    }
                }
            }

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_add() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuadd::select('addtype','addline1','addline2','city','state', 'zcode','country','updated_at')
                    ->where('add_id', '=', $authid)
                    ->get();

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_ref() {
        if (Auth::check())
        {
            $authid = Auth::id();

            $resume = \App\modresuref::select('refnum','fname','location','email','mobnum','updated_at')
                    ->where('ref_id', '=', $authid)
                    ->get();

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    //Get Initial Data for Recruiter Profile
    public static function get_initial() {
        if (Auth::guard('recruiter')->check()) 
        {
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $recprof = \App\recruiter\modrecpdet::select('fname', 'lname', 'location', 'email', 'mobnum', 'skype', 'picname','picpath')
                    ->where('rec_id', '=', $authid)
                    ->get();
            
            //$message = "pic name is " . $recprof['picname'];
            //echo "<script type='text/javascript'>alert('$message');</script>";
            /*
            list($name11, $ext11) = explode('.', $val["picname"]);
            $val["picpath"]=$val["picpath"]."/".$authid.".".$ext11;
            $recprof['fullpath']=$recprof['picpath'].'/'.$recprof['picname'];
            */
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }

    //Get Initial Data for Recruiter Profile
    public static function get_bdetails() {
        if (Auth::guard('recruiter')->check()) 
        {
            $authid = Auth::guard('recruiter')->user()->id;
            $recprof = \App\recruiter\modrecbdet::select('orgname', 'weburl', 'addline1', 'addline2', 'city', 'state', 'country')
                    ->where('rec_id', '=', $authid)
                    ->get();
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }

    //Get About you info for Recruiter Profile
    public static function get_aboutu() {
        if (Auth::guard('recruiter')->check()) 
        {
            $authid = Auth::guard('recruiter')->user()->id;
            $recprof = \App\recruiter\modrecabout::select('profname', 'profurl', 'shortprof', 'servcity', 'servstate', 'servcountry', 'remote')
                    ->where('rec_id', '=', $authid)
                    ->get();
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }

    //Get Social Links info for Recruiter Profile
    public static function get_socio() {
        if (Auth::guard('recruiter')->check()) 
        {
            $authid = Auth::guard('recruiter')->user()->id;
            $recprof = \App\recruiter\modrecsocio::select('linkurl', 'fburl', 'tweeturl', 'instaurl', 'lang1', 'lang2', 'lang3')
                    ->where('rec_id', '=', $authid)
                    ->get();
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }

    //Get Specialized areas for Recruiter Profile
    public static function get_sarea() {
        if (Auth::guard('recruiter')->check()) 
        {
            $authid = Auth::guard('recruiter')->user()->id;
            $recprof = \App\recruiter\modrecsarea::select('sarea1', 'sarea2', 'sarea3', 'sainfo', 'sapos', 'saclients')
                    ->where('rec_id', '=', $authid)
                    ->get();
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }
 
}