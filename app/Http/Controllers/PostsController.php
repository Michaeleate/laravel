<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
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
use App\modjobpost;
use App\mod_userjobstat;
use App\recruiter\modrecpdet;
use App\recruiter\modrecbdet;
use App\recruiter\modrecabout;
use App\recruiter\modrecsarea;
use App\recruiter\modrecedu;
use App\recruiter\modrecemp;
use App\recruiter\modrecref;
use App\recruiter\modrecruiter;

class PostsController extends Controller
{
    protected $dbstatus, $val1, $val2;
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
            $recprof = \App\recruiter\modrecpdet::select('fname', 'lname', 'location', 'email', 'mobnum', 'skype', 'picname','picpath','updated_at')
                    ->where('rec_id', '=', $authid)
                    ->get();
            
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

    //Get Qualifications for Recruiter Profile
    public static function get_recedu() {
        if (Auth::guard('recruiter')->check())
        {
            $authid = Auth::guard('recruiter')->user()->id;

            $recprof = \App\recruiter\modrecedu::select('qual','board','course','spec','colname', 'district','cortype','pyear','edulang','percentage','updated_at')
                    ->where('rec_id', '=', $authid)
                    ->get();
            if (\Request::is('recruiter/vrecprofile')) {
                foreach($recprof as $key=>$val){
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
            
            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }

    //Get Employment for Recruiter Profile
    public static function get_recemp() {
        if (Auth::guard('recruiter')->check())
        {
            $authid = Auth::guard('recruiter')->user()->id;

            $recprof = \App\recruiter\modrecemp::select('emp_name','desg','startdt','enddt','msal', 'resp','nperiod','updated_at')
                    ->where('rec_id', '=', $authid)
                    ->get();

            if (\Request::is('vrecprofile')) {
                foreach($recprof as $key=>$val){
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

            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }
    
    //Get Reference for Recruiter Profile
    public static function get_recref() {
        if (Auth::guard('recruiter')->check())
        {
            $authid = Auth::guard('recruiter')->user()->id;

            $recprof = \App\recruiter\modrecref::select('refnum','fname','location','email','mobnum','updated_at')
                    ->where('rec_id', '=', $authid)
                    ->get();

            return $recprof;
        }
        else {
            return view('recruiter.home');
        }
    }
    
    //Get Maximum Job ID for Jobs.
    public static function get_maxjobid() {
        if (Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            //$authid = Auth::guard('recruiter')->user()->id;

            $maxjobid = \App\modjobpost::max('job_id');
                    //->first();

            if(!$maxjobid==null){
                return $maxjobid;
            }
            else{
                return 0;
            }
        }
        else {
            return view('recruiter');
        }
    }
    //mike
    //Get Admin recruiter id by Admin id.
    public static function get_admrecid($admid) {
        if (Auth::guard('admin')->check())
        {
            $admrecid = \App\recruiter\modrecruiter::select('id')
            ->where('user_type', '=', 3)
            ->where('is_admin', '=', true)
            ->where('admin_id', '=', $admid)
            ->first();

            if(!$admrecid==null){
                return $admrecid;
            }
            else{
                return 0;
            }
        }
        else {
            return view('mikeadmin');
        }
    }
    
    //Get recently posted job details of recruiter.
    public static function get_lastjobdet() {
        if (Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::guard('recruiter')->check()){
                $authid = Auth::guard('recruiter')->user()->id;
                //$message = "User ID is" . $authid;
                //echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                $authid = Auth::guard('admin')->user()->id;
                //get recruiter id, as admin is posting as recruiter now.
                $admrecid=0;
                $admrecid=PostsController::get_admrecid($authid);
                $authid=$admrecid->id;
            }

            $jobdet = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at')
                    ->where('rec_id', '=', $authid)
                    ->orderBy('job_id','asc')
                    ->get();


            if (\Request::is('recruiter/vlastjob'|| 'admin/vlastjob')) {
                foreach($jobdet as $key=>$val){
                    if(!(empty($val["hireloc1"]))){
                        switch($val["hireloc1"]){
                            case "30":
                                $val["hireloc1"]="Vijayawada";  
                                break;                        
                            case "11":
                                $val["hireloc1"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc1"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc1"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc1"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc1"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc1"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc1"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc1"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc1"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc1"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc1"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc1"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc1"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc1"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc1"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc1"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc1"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc1"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc1"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc1"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc1"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc1"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc1"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc1"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc1"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc1"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc1"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc1"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc1"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc1"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc2"]))){
                        switch($val["hireloc2"]){
                            case "30":
                                $val["hireloc2"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc2"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc2"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc2"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc2"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc2"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc2"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc2"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc2"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc2"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc2"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc2"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc2"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc2"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc2"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc2"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc2"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc2"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc2"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc2"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc2"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc2"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc2"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc2"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc2"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc2"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc2"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc2"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc2"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc2"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc2"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc3"]))){
                        switch($val["hireloc3"]){
                            case "30":
                                $val["hireloc3"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc3"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc3"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc3"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc3"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc3"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc3"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc3"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc3"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc3"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc3"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc3"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc3"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc3"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc3"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc3"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc3"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc3"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc3"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc3"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc3"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc3"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc3"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc3"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc3"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc3"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc3"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc3"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc3"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc3"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc3"]="Vizianagaram";
                                break;                        
                        }
                    }
                }
            }
            return $jobdet;
        }
        else {
            return view('recruiter');
        }
    }
    
    //Get recently posted job details of recruiter.
    public static function get_viewsjob($jobid) {
        //if (Auth::check()) {
        //    $authid = Auth::id();
            //$message = "Inside get viewsjob with job id" . $jobid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

            $jobdet = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at');
            $jobdet->addselect(DB::raw("'sampletext' as jstatus_text, 'daystext' as days_text, '0' as japp_status, 'no' as japp_status_text"));
            $jobdet = $jobdet
                    ->where('job_id', '=', $jobid)
                    ->get();

            //if (\Request::is('recruiter/vlastjob')) {
                foreach($jobdet as $key=>$val){
                    if(!(empty($val["hireloc1"]))){
                        switch($val["hireloc1"]){
                            case "30":
                                $val["hireloc1"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc1"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc1"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc1"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc1"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc1"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc1"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc1"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc1"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc1"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc1"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc1"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc1"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc1"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc1"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc1"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc1"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc1"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc1"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc1"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc1"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc1"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc1"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc1"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc1"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc1"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc1"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc1"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc1"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc1"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc1"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc2"]))){
                        switch($val["hireloc2"]){
                            case "30":
                                $val["hireloc2"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc2"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc2"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc2"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc2"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc2"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc2"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc2"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc2"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc2"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc2"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc2"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc2"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc2"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc2"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc2"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc2"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc2"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc2"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc2"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc2"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc2"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc2"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc2"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc2"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc2"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc2"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc2"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc2"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc2"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc2"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc3"]))){
                        switch($val["hireloc3"]){
                            case "30":
                                $val["hireloc3"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc3"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc3"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc3"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc3"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc3"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc3"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc3"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc3"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc3"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc3"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc3"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc3"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc3"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc3"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc3"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc3"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc3"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc3"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc3"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc3"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc3"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc3"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc3"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc3"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc3"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc3"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc3"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc3"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc3"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc3"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if (Auth::check()) {
                        $authid = Auth::id();
                        
                        //Initializing
                        $appstat=0;
                        //check job applied status
                        $applied_status = \App\mod_userjobstat::select('app_status')
                                            ->where('rec_id', '=', $authid)
                                            ->where('job_id', '=', $val['job_id'])
                                            ->get();
                        
                        foreach($applied_status as $key1=>$val1){
                            $appstat=$val1["app_status"];
                        }

                        if(is_null($appstat)){
                            $appstat=0;
                            $val['japp_status']=0;
                        }
                        else{
                            $val['japp_status']=$appstat;
                        }

                        switch($appstat){
                            case 0:
                                $val['japp_status_text']="Not Applied";
                                break;
                            case 1:
                                $val['japp_status_text']="Applied";
                                break;
                            case 2:
                                $val['japp_status_text']="Application Sent";
                                break;
                            case 3:
                                $val['japp_status_text']="Shortlisted";
                                break;
                            case 4:
                                $val['japp_status_text']="Not shortlisted";
                                break;
                            case 5:
                                $val['japp_status_text']="Scheduled Interview";
                                break;
                            case 6:
                                $val['japp_status_text']="Interview Status";
                                break;
                            case 6:
                                $val['japp_status_text']="Offer Status";
                                break;
                            case 6:
                                $val['japp_status_text']="Job Closed";
                                break;
                        }
                    }
                
                    //Count days when the job posted
                    $ntimestamp= strtotime(Carbon::now());
                    $valtstamp = strtotime($val['created_at']);
                    //$daysdiff=$val['created_at']->diffInDays(Carbon::now());
                    $cdate = date('Y-m-d', $valtstamp);
                    $ndate = date('Y-m-d', $ntimestamp);
                    //$daysdiff=$cdate->diffInDays($ndate);

                    $cdate1 = strtotime($cdate);
                    $ndate1 = strtotime($ndate);
                    $secsdiff = $ndate1 - $cdate1;
                    $daysdiff = $secsdiff / 86400;
                    
                    //Testing
                    //$message = "3Days difference" . $daysdiff;
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    
                    switch($daysdiff){
                        case 0:
                            $val["days_text"]="Today";
                            break;
                        case 1:
                            $val["days_text"]="Yesterday";
                            break;
                        default:
                            $val["days_text"]=$daysdiff . " days ago";
                    }

                    //Job Status text as per value
                    switch($val['jstatus']){
                        case 0:
                            $val['jstatus_text']="Approval Pending";
                            break;
                        case 1:
                            $val['jstatus_text']="Active";
                            break;
                        case 2:
                            $val['jstatus_text']="Rejected";
                            break;
                        case 3:
                            $val['jstatus_text']="Closed";
                            break;
                        case 4:
                            $val['jstatus_text']="Hold";
                            break;
                        case 5:
                            $val['jstatus_text']="Expired";
                            break;
                        case 6:
                            $val['jstatus_text']="Archieved";
                            break;
                    }
                }
            //}
            return $jobdet;
        //}
        //else {
            //return redirect()->route('login');
        //}
    }
    
    //Get recently posted job details of recruiter.
    public static function get_recalljobs() {
        if (Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::guard('recruiter')->check()){
                $authid = Auth::guard('recruiter')->user()->id;
                //$message = "User ID is" . $authid;
                //echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                $authid = Auth::guard('admin')->user()->id;
                //get recruiter id, as admin is posting as recruiter now.
                $admrecid=0;
                $admrecid=PostsController::get_admrecid($authid);
                $authid=$admrecid->id;
            }

            //$message = "User ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $recalljobs = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at');
            $recalljobs = $recalljobs->addselect(DB::raw("'sampletext' as jstatus_text, 'daystext' as days_text"));
            $recalljobs = $recalljobs->where('rec_id', '=', $authid)
                    ->orderBy('job_id','asc')
                    ->paginate(3);
            
            if (\Request::is('recruiter/valljobs' || 'admin/valljobs')) {
                foreach($recalljobs as $key=>$val){
                    if(!(empty($val["hireloc1"]))){
                        switch($val["hireloc1"]){
                            case "30":
                                $val["hireloc1"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc1"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc1"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc1"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc1"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc1"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc1"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc1"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc1"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc1"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc1"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc1"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc1"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc1"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc1"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc1"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc1"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc1"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc1"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc1"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc1"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc1"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc1"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc1"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc1"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc1"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc1"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc1"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc1"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc1"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc1"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc2"]))){
                        switch($val["hireloc2"]){
                            case "30":
                                $val["hireloc2"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc2"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc2"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc2"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc2"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc2"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc2"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc2"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc2"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc2"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc2"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc2"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc2"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc2"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc2"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc2"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc2"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc2"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc2"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc2"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc2"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc2"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc2"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc2"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc2"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc2"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc2"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc2"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc2"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc2"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc2"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc3"]))){
                        switch($val["hireloc3"]){
                            case "30":
                                $val["hireloc3"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc3"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc3"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc3"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc3"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc3"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc3"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc3"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc3"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc3"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc3"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc3"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc3"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc3"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc3"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc3"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc3"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc3"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc3"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc3"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc3"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc3"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc3"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc3"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc3"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc3"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc3"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc3"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc3"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc3"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc3"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(isset($val['hireloc2']))){
                        $val['hireloc2']='';
                        $val['hireloc3']='';
                    }
                    
                    //Count days when the job posted
                    $ntimestamp= strtotime(Carbon::now());
                    $valtstamp = strtotime($val['created_at']);
                    //$daysdiff=$val['created_at']->diffInDays(Carbon::now());
                    $cdate = date('Y-m-d', $valtstamp);
                    $ndate = date('Y-m-d', $ntimestamp);
                    //$daysdiff=$cdate->diffInDays($ndate);

                    $cdate1 = strtotime($cdate);
                    $ndate1 = strtotime($ndate);
                    $secsdiff = $ndate1 - $cdate1;
                    $daysdiff = $secsdiff / 86400;
                    
                    //Testing
                    //$message = "3Days difference" . $daysdiff;
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    
                    switch($daysdiff){
                        case 0:
                            $val["days_text"]="Today";
                            break;
                        case 1:
                            $val["days_text"]="Yesterday";
                            break;
                        default:
                            $val["days_text"]=$daysdiff . " days ago";
                    }

                    //Job Status text as per value
                    switch($val['jstatus']){
                        case 0:
                            $val['jstatus_text']="Approval Pending";
                            break;
                        case 1:
                            $val['jstatus_text']="Active";
                            break;
                        case 2:
                            $val['jstatus_text']="Rejected";
                            break;
                        case 3:
                            $val['jstatus_text']="Closed";
                            break;
                        case 4:
                            $val['jstatus_text']="Hold";
                            break;
                        case 5:
                            $val['jstatus_text']="Expired";
                            break;
                        case 6:
                            $val['jstatus_text']="Archieved";
                            break;
                    }
                }
            }
            return $recalljobs;
        }
        else {
            return view('recruiter');
        }
    }
    
    //Get all jobs based on search criteria.
    public static function get_jsearchall($request) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check()) {
            $authid = Auth::id();
            $skey=$request->input('skey');
            $sloc=$request->input('sloc');
            $sminexp=$request->input('sminexp');
            
            if($sminexp==null){
                $sminexp=0;
            }


            $jsearchall = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at');
            $jsearchall = $jsearchall->addselect(DB::raw("'sampletext' as jstatus_text, '0' as japp_status, 'no' as japp_status_text"));
            if(!($skey==null)){
            $jsearchall = $jsearchall
                    ->where('keywords', 'like', '%' . $skey . '%')
                    ->orwhere('jtitle', 'like', '%' . $skey . '%')
                    ->orwhere('jd', 'like', '%' . $skey . '%');
            }
            if(!($sloc==null)){
            $jsearchall = $jsearchall
                    ->orwhere('hireloc1', 'like', '%' . $sloc . '%')
                    ->orwhere('hireloc2', 'like', '%' . $sloc . '%')
                    ->orwhere('hireloc3', 'like', '%' . $sloc . '%');
            }
            if(!($sminexp==null)){
            $jsearchall = $jsearchall
                    ->orwhere(function ($query) use ($sminexp) {
                        $query->where('minexp', '<=', $sminexp)
                              ->where('maxexp', '>', $sminexp);
                    });
            }
            $jsearchall = $jsearchall
                    ->orderBy('job_id','asc')
                    ->paginate(3);
            
            foreach($jsearchall as $key=>$val){
                if(!(empty($val["hireloc1"]))){
                    switch($val["hireloc1"]){
                        case "30":
                            $val["hireloc1"]="Vijayawada";
                            break;                        
                        case "11":
                            $val["hireloc1"]="Guntur";
                            break;                        
                        case "24":
                            $val["hireloc1"]="Rajahmundry";
                            break;                        
                        case "1":
                            $val["hireloc1"]="Adoni";
                            break;                        
                        case "2":
                            $val["hireloc1"]="Amaravati";
                            break;                        
                        case "3":
                            $val["hireloc1"]="Anantapur";
                            break;                        
                        case "4":
                            $val["hireloc1"]="Bhimavaram";
                            break;                        
                        case "5":
                            $val["hireloc1"]="Chilakaluripet";
                            break;                        
                        case "6":
                            $val["hireloc1"]="Chittoor";
                            break;                        
                        case "7":
                            $val["hireloc1"]="Dharmavaram";
                            break;                        
                        case "8":
                            $val["hireloc1"]="Eluru";
                            break;                        
                        case "9":
                            $val["hireloc1"]="Gudivada";
                            break;                        
                        case "10":
                            $val["hireloc1"]="Guntakal";
                            break;                        
                        case "12":
                            $val["hireloc1"]="Hindupur";
                            break;                        
                        case "13":
                            $val["hireloc1"]="Kadapa";
                            break;                        
                        case "14":
                            $val["hireloc1"]="Kakinada";
                            break;                        
                        case "15":
                            $val["hireloc1"]="Kavali";
                            break;                        
                        case "16":
                            $val["hireloc1"]="Kurnool";
                            break;                        
                        case "18":
                            $val["hireloc1"]="Machilipatnam";
                            break;                        
                        case "19":
                            $val["hireloc1"]="Madanepalli";
                            break;                        
                        case "20":
                            $val["hireloc1"]="Narsaraopet";
                            break;                        
                        case "21":
                            $val["hireloc1"]="Nellore";
                            break;                        
                        case "22":
                            $val["hireloc1"]="Ongole";
                            break;                        
                        case "23":
                            $val["hireloc1"]="Proddatur";
                            break;                        
                        case "25":
                            $val["hireloc1"]="Srikakulam";
                            break;                        
                        case "26":
                            $val["hireloc1"]="Tadepalligudem";
                            break;                        
                        case "27":
                            $val["hireloc1"]="Tadipatri";
                            break;                        
                        case "28":
                            $val["hireloc1"]="Tenali";
                            break;                        
                        case "29":
                            $val["hireloc1"]="Tirupati";
                            break;                        
                        case "31":
                            $val["hireloc1"]="Visakhapatnam";
                            break;                        
                        case "32":
                            $val["hireloc1"]="Vizianagaram";
                            break;                        
                    }
                }
                if(!(empty($val["hireloc2"]))){
                    switch($val["hireloc2"]){
                        case "30":
                            $val["hireloc2"]="Vijayawada";
                            break;                        
                        case "11":
                            $val["hireloc2"]="Guntur";
                            break;                        
                        case "24":
                            $val["hireloc2"]="Rajahmundry";
                            break;                        
                        case "1":
                            $val["hireloc2"]="Adoni";
                            break;                        
                        case "2":
                            $val["hireloc2"]="Amaravati";
                            break;                        
                        case "3":
                            $val["hireloc2"]="Anantapur";
                            break;                        
                        case "4":
                            $val["hireloc2"]="Bhimavaram";
                            break;                        
                        case "5":
                            $val["hireloc2"]="Chilakaluripet";
                            break;                        
                        case "6":
                            $val["hireloc2"]="Chittoor";
                            break;                        
                        case "7":
                            $val["hireloc2"]="Dharmavaram";
                            break;                        
                        case "8":
                            $val["hireloc2"]="Eluru";
                            break;                        
                        case "9":
                            $val["hireloc2"]="Gudivada";
                            break;                        
                        case "10":
                            $val["hireloc2"]="Guntakal";
                            break;                        
                        case "12":
                            $val["hireloc2"]="Hindupur";
                            break;                        
                        case "13":
                            $val["hireloc2"]="Kadapa";
                            break;                        
                        case "14":
                            $val["hireloc2"]="Kakinada";
                            break;                        
                        case "15":
                            $val["hireloc2"]="Kavali";
                            break;                        
                        case "16":
                            $val["hireloc2"]="Kurnool";
                            break;                        
                        case "18":
                            $val["hireloc2"]="Machilipatnam";
                            break;                        
                        case "19":
                            $val["hireloc2"]="Madanepalli";
                            break;                        
                        case "20":
                            $val["hireloc2"]="Narsaraopet";
                            break;                        
                        case "21":
                            $val["hireloc2"]="Nellore";
                            break;                        
                        case "22":
                            $val["hireloc2"]="Ongole";
                            break;                        
                        case "23":
                            $val["hireloc2"]="Proddatur";
                            break;                        
                        case "25":
                            $val["hireloc2"]="Srikakulam";
                            break;                        
                        case "26":
                            $val["hireloc2"]="Tadepalligudem";
                            break;                        
                        case "27":
                            $val["hireloc2"]="Tadipatri";
                            break;                        
                        case "28":
                            $val["hireloc2"]="Tenali";
                            break;                        
                        case "29":
                            $val["hireloc2"]="Tirupati";
                            break;                        
                        case "31":
                            $val["hireloc2"]="Visakhapatnam";
                            break;                        
                        case "32":
                            $val["hireloc2"]="Vizianagaram";
                            break;                        
                    }
                }
                if(!(empty($val["hireloc3"]))){
                    switch($val["hireloc3"]){
                        case "30":
                            $val["hireloc3"]="Vijayawada";
                            break;                        
                        case "11":
                            $val["hireloc3"]="Guntur";
                            break;                        
                        case "24":
                            $val["hireloc3"]="Rajahmundry";
                            break;                        
                        case "1":
                            $val["hireloc3"]="Adoni";
                            break;                        
                        case "2":
                            $val["hireloc3"]="Amaravati";
                            break;                        
                        case "3":
                            $val["hireloc3"]="Anantapur";
                            break;                        
                        case "4":
                            $val["hireloc3"]="Bhimavaram";
                            break;                        
                        case "5":
                            $val["hireloc3"]="Chilakaluripet";
                            break;                        
                        case "6":
                            $val["hireloc3"]="Chittoor";
                            break;                        
                        case "7":
                            $val["hireloc3"]="Dharmavaram";
                            break;                        
                        case "8":
                            $val["hireloc3"]="Eluru";
                            break;                        
                        case "9":
                            $val["hireloc3"]="Gudivada";
                            break;                        
                        case "10":
                            $val["hireloc3"]="Guntakal";
                            break;                        
                        case "12":
                            $val["hireloc3"]="Hindupur";
                            break;                        
                        case "13":
                            $val["hireloc3"]="Kadapa";
                            break;                        
                        case "14":
                            $val["hireloc3"]="Kakinada";
                            break;                        
                        case "15":
                            $val["hireloc3"]="Kavali";
                            break;                        
                        case "16":
                            $val["hireloc3"]="Kurnool";
                            break;                        
                        case "18":
                            $val["hireloc3"]="Machilipatnam";
                            break;                        
                        case "19":
                            $val["hireloc3"]="Madanepalli";
                            break;                        
                        case "20":
                            $val["hireloc3"]="Narsaraopet";
                            break;                        
                        case "21":
                            $val["hireloc3"]="Nellore";
                            break;                        
                        case "22":
                            $val["hireloc3"]="Ongole";
                            break;                        
                        case "23":
                            $val["hireloc3"]="Proddatur";
                            break;                        
                        case "25":
                            $val["hireloc3"]="Srikakulam";
                            break;                        
                        case "26":
                            $val["hireloc3"]="Tadepalligudem";
                            break;                        
                        case "27":
                            $val["hireloc3"]="Tadipatri";
                            break;                        
                        case "28":
                            $val["hireloc3"]="Tenali";
                            break;                        
                        case "29":
                            $val["hireloc3"]="Tirupati";
                            break;                        
                        case "31":
                            $val["hireloc3"]="Visakhapatnam";
                            break;                        
                        case "32":
                            $val["hireloc3"]="Vizianagaram";
                            break;                        
                    }
                }
                if(!(isset($val['hireloc2']))){
                    $val['hireloc2']='';
                    $val['hireloc3']='';
                }
                
                /*
                //Count days when the job posted
                $daysdiff=$val['created_at']->diffInDays(Carbon::now());
                switch($daysdiff){
                    case 0:
                        $daystext="Today";
                        break;
                    case 1:
                        $daystext="Yesterday";
                        break;
                    default:
                        $daystext=$daysdiff . " days ago";
                }
                */

                //Job Status text as per value
                switch($val['jstatus']){
                    case 0:
                        $val['jstatus_text']="Approval Pending";
                        break;
                    case 1:
                        $val['jstatus_text']="Active";
                        break;
                    case 2:
                        $val['jstatus_text']="Rejected";
                        break;
                    case 3:
                        $val['jstatus_text']="Closed";
                        break;
                    case 4:
                        $val['jstatus_text']="Hold";
                        break;
                    case 5:
                        $val['jstatus_text']="Expired";
                        break;
                    case 6:
                        $val['jstatus_text']="Archieved";
                        break;
                }
                
                $appstat=0; //initializing
                //check job applied status
                $applied_status = \App\mod_userjobstat::select('app_status')
                    ->where('rec_id', '=', $authid)
                    ->where('job_id', '=', $val['job_id'])
                    ->get();
                
                foreach($applied_status as $key1=>$val1){
                    $appstat=$val1["app_status"];
                }

                if(is_null($appstat)){
                    $appstat=0;
                    $val['japp_status']=0;
                }
                else{
                    $val['japp_status']=$appstat;
                }
                
                switch($appstat){
                    case 0:
                        $val['japp_status_text']="Not Applied";
                        break;
                    case 1:
                        $val['japp_status_text']="Applied";
                        break;
                    case 2:
                        $val['japp_status_text']="Application Sent";
                        break;
                    case 3:
                        $val['japp_status_text']="Shortlisted";
                        break;
                    case 4:
                        $val['japp_status_text']="Not shortlisted";
                        break;
                    case 5:
                        $val['japp_status_text']="Scheduled Interview";
                        break;
                    case 6:
                        $val['japp_status_text']="Interview Status";
                        break;
                    case 6:
                        $val['japp_status_text']="Offer Status";
                        break;
                    case 6:
                        $val['japp_status_text']="Job Closed";
                        break;
                }
            }
            return $jsearchall;
        }
        else {
            return redirect()->route('login');
        }
    }

    //Update user job stat table with status applied.
    public static function user_apply_job($jobid) {
        if (Auth::check())
        {
            $authid = Auth::id();
            $app_status=$viewed_at=$applied_at=$schedule_id=$interview_id='';

            $app_status=1; //applied status
            //following change later when in search results.
            $viewed_at=Carbon::now()->toDateTimeString();
            $applied_at=Carbon::now()->toDateTimeString();
            $schedule_id=0;
            $interview_id=0;
            return self::dbapplyjob($authid, $jobid, $app_status, $viewed_at,$applied_at, $schedule_id, $interview_id);
            //echo "In get_profile function- ".$head;
            if(!($dbstatus==true)){
                return true;    
            }
            else{
                return false;
            }
        }
        else {
            return redirect()->route('login');
        }
    }

    protected static function dbapplyjob($authid, $jobid, $app_status, $viewed_at,$applied_at, $schedule_id, $interview_id)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $dbrec = \App\mod_userjobstat::updateOrCreate(
                [
                 'rec_id' => $authid,
                 'job_id' => $jobid
                ], 
                [
                 'app_status'   => $app_status,
                 'viewed_at'    => $viewed_at,
                 'applied_at'   => $applied_at,
                 'schedule_id'  => $schedule_id,
                 'interview_id' => $interview_id
                ]
            );
            
            DB::commit();
            $dbstatus=true;
            return $dbstatus;
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
            $dbstatus=false;
            return $dbstatus;
        }
    }

    
    //Get all jobs posted by all recruiters.
    public static function get_alljobs() {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            // if(Auth::guard('recruiter')->check()){
            //     $authid = Auth::guard('recruiter')->user()->id;
            //     //$message = "User ID is" . $authid;
            //     //echo "<script type='text/javascript'>alert('$message');</script>";
            // }
            // else{
            //     $authid = Auth::guard('admin')->user()->id;
            //     //get recruiter id, as admin is posting as recruiter now.
            //     $admrecid=0;
            //     $admrecid=PostsController::get_admrecid($authid);
            //     $authid=$admrecid->id;
            // }

            //$message = "User ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $recalljobs = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at');
            $recalljobs = $recalljobs->addselect(DB::raw("'sampletext' as jstatus_text, 'daystext' as days_text"));
            $recalljobs = $recalljobs->where('jstatus', '=', 1)
                    ->orderBy('job_id','desc')
                    ->paginate(3);
            
            // if (\Request::is('recruiter/valljobs' || 'admin/valljobs')) {
                foreach($recalljobs as $key=>$val){
                    if(!(empty($val["hireloc1"]))){
                        switch($val["hireloc1"]){
                            case "30":
                                $val["hireloc1"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc1"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc1"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc1"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc1"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc1"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc1"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc1"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc1"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc1"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc1"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc1"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc1"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc1"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc1"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc1"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc1"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc1"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc1"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc1"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc1"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc1"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc1"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc1"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc1"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc1"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc1"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc1"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc1"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc1"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc1"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc2"]))){
                        switch($val["hireloc2"]){
                            case "30":
                                $val["hireloc2"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc2"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc2"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc2"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc2"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc2"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc2"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc2"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc2"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc2"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc2"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc2"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc2"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc2"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc2"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc2"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc2"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc2"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc2"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc2"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc2"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc2"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc2"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc2"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc2"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc2"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc2"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc2"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc2"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc2"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc2"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($val["hireloc3"]))){
                        switch($val["hireloc3"]){
                            case "30":
                                $val["hireloc3"]="Vijayawada";
                                break;                        
                            case "11":
                                $val["hireloc3"]="Guntur";
                                break;                        
                            case "24":
                                $val["hireloc3"]="Rajahmundry";
                                break;                        
                            case "1":
                                $val["hireloc3"]="Adoni";
                                break;                        
                            case "2":
                                $val["hireloc3"]="Amaravati";
                                break;                        
                            case "3":
                                $val["hireloc3"]="Anantapur";
                                break;                        
                            case "4":
                                $val["hireloc3"]="Bhimavaram";
                                break;                        
                            case "5":
                                $val["hireloc3"]="Chilakaluripet";
                                break;                        
                            case "6":
                                $val["hireloc3"]="Chittoor";
                                break;                        
                            case "7":
                                $val["hireloc3"]="Dharmavaram";
                                break;                        
                            case "8":
                                $val["hireloc3"]="Eluru";
                                break;                        
                            case "9":
                                $val["hireloc3"]="Gudivada";
                                break;                        
                            case "10":
                                $val["hireloc3"]="Guntakal";
                                break;                        
                            case "12":
                                $val["hireloc3"]="Hindupur";
                                break;                        
                            case "13":
                                $val["hireloc3"]="Kadapa";
                                break;                        
                            case "14":
                                $val["hireloc3"]="Kakinada";
                                break;                        
                            case "15":
                                $val["hireloc3"]="Kavali";
                                break;                        
                            case "16":
                                $val["hireloc3"]="Kurnool";
                                break;                        
                            case "18":
                                $val["hireloc3"]="Machilipatnam";
                                break;                        
                            case "19":
                                $val["hireloc3"]="Madanepalli";
                                break;                        
                            case "20":
                                $val["hireloc3"]="Narsaraopet";
                                break;                        
                            case "21":
                                $val["hireloc3"]="Nellore";
                                break;                        
                            case "22":
                                $val["hireloc3"]="Ongole";
                                break;                        
                            case "23":
                                $val["hireloc3"]="Proddatur";
                                break;                        
                            case "25":
                                $val["hireloc3"]="Srikakulam";
                                break;                        
                            case "26":
                                $val["hireloc3"]="Tadepalligudem";
                                break;                        
                            case "27":
                                $val["hireloc3"]="Tadipatri";
                                break;                        
                            case "28":
                                $val["hireloc3"]="Tenali";
                                break;                        
                            case "29":
                                $val["hireloc3"]="Tirupati";
                                break;                        
                            case "31":
                                $val["hireloc3"]="Visakhapatnam";
                                break;                        
                            case "32":
                                $val["hireloc3"]="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(isset($val['hireloc2']))){
                        $val['hireloc2']='';
                        $val['hireloc3']='';
                    }
                    
                    //Count days when the job posted
                    $ntimestamp= strtotime(Carbon::now());
                    $valtstamp = strtotime($val['created_at']);
                    //$daysdiff=$val['created_at']->diffInDays(Carbon::now());
                    $cdate = date('Y-m-d', $valtstamp);
                    $ndate = date('Y-m-d', $ntimestamp);
                    //$daysdiff=$cdate->diffInDays($ndate);

                    $cdate1 = strtotime($cdate);
                    $ndate1 = strtotime($ndate);
                    $secsdiff = $ndate1 - $cdate1;
                    $daysdiff = $secsdiff / 86400;
                    
                    //Testing
                    //$message = "3Days difference" . $daysdiff;
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    
                    switch($daysdiff){
                        case 0:
                            $val["days_text"]="Today";
                            break;
                        case 1:
                            $val["days_text"]="Yesterday";
                            break;
                        default:
                            $val["days_text"]=$daysdiff . " days ago";
                    }

                    //Job Status text as per value
                    switch($val['jstatus']){
                        case 0:
                            $val['jstatus_text']="Approval Pending";
                            break;
                        case 1:
                            $val['jstatus_text']="Active";
                            break;
                        case 2:
                            $val['jstatus_text']="Rejected";
                            break;
                        case 3:
                            $val['jstatus_text']="Closed";
                            break;
                        case 4:
                            $val['jstatus_text']="Hold";
                            break;
                        case 5:
                            $val['jstatus_text']="Expired";
                            break;
                        case 6:
                            $val['jstatus_text']="Archieved";
                            break;
                    }
                }
            return $recalljobs;
        }
        else {
            return view('home');
        }
    }
}