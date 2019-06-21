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
use App\mod_schedule;
use App\mod_transact;
use App\mod_credits;
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
    public static function get_head($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $head = \App\modresuhead::select('head_line', 'head_id')
                    ->where('head_id', '=', $authid)
                    ->get();
            
            return $head;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_resume($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $resume = \App\modresuload::select('oldresu','updated_at')
                    ->where('resu_id', '=', $authid)
                    ->get();
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }
    
    public static function get_kskill($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $resume = \App\modresukskil::select('kskil1','kskil2','kskil3','kskil4','kskil5')
                    ->where('kskil_id', '=', $authid)
                    ->get();

            //if (\Request::is('view-user-profile')) {
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
            //}

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_pdet($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

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

    public static function get_edu1($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $resume = \App\modresuedu::select('qual','board','course','spec','colname', 'district','cortype','pyear','edulang','percentage','updated_at')
                    ->where('edu_id', '=', $authid)
                    ->get();

            //if (\Request::is('view-user-profile')) {
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
            //}
            
            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_emp($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $resume = \App\modresuemp::select('emp_name','exp_months','desg','startdt','enddt','msal', 'resp','nperiod','updated_at')
                    ->where('emp_id', '=', $authid)
                    ->get();

            //if (\Request::is('view-user-profile')) {
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
            //}

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_add($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

            $resume = \App\modresuadd::select('addtype','addline1','addline2','city','state', 'zcode','country','updated_at')
                    ->where('add_id', '=', $authid)
                    ->get();

            return $resume;
        }
        else {
            return redirect()->route('login');
        }
    }

    public static function get_ref($userid=null) {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
            }
            else if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
                $authid = $userid;
            }

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
            //get last jobid
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

            //get all jobs posted by the recruiter only.
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

            //Get recently posted job by the recruiter
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
                                $val['japp_status_text']="Application Viewed";
                                break;
                            case 4:
                                $val['japp_status_text']="Shortlisted";
                                break;
                            case 5:
                                $val['japp_status_text']="Not shortlisted";
                                break;
                            case 6:
                                $val['japp_status_text']="Scheduled Interview";
                                break;
                            case 7:
                                $val['japp_status_text']="Interviewed";
                                break;
                            case 8:
                                $val['japp_status_text']="Offer Status";
                                break;
                            case 9:
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
            //get all jobs posted by recruiter pagination purpose.
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

            //Get all Jobs based on search
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
                        $val['japp_status_text']="Application Viewed";
                        break;
                    case 4:
                        $val['japp_status_text']="Shortlisted";
                        break;
                    case 5:
                        $val['japp_status_text']="Not shortlisted";
                        break;
                    case 6:
                        $val['japp_status_text']="Scheduled Interview";
                        break;
                    case 7:
                        $val['japp_status_text']="Interviewed";
                        break;
                    case 8:
                        $val['japp_status_text']="Offered";
                        break;
                    case 9:
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
            $jobid=$jobid;
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

    public static function upd_schedule($userid, $jobid, $schid, $starttime, $endtime, $schedule_at, $schedule_byuser, $schedule_byrec, $schedule_stat, $schmsg, $interview_type, $interview_round, $interview_stat, $interview_msg, $approve)
    {
        try{
            DB::beginTransaction();
            //updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $dbrec = \App\mod_schedule::updateOrCreate(
                [
                 'rec_id' => $userid,
                 'job_id' => $jobid,
                 'sch_id' => $schid,
                ], 
                [
                 'schedule_start'   => $starttime,
                 'schedule_end'     => $endtime,
                 'schedule_at'      => $schedule_at,
                 'schedule_byuser'  => $schedule_byuser,
                 'schedule_byrec'   => $schedule_byrec,
                 'schedule_stat'    => $schedule_stat,
                 'schedule_msg'     => $schmsg,
                 'interview_type'   => $interview_type,
                 'interview_round'  => $interview_round,
                 'interview_stat'   => $interview_stat,
                 'interview_msg'    => $interview_msg,
                 'approve'          => $approve
                ]
            );
            
            DB::commit();
            return $dbrec;
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
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
            //get all jobs posted by all recruiters.
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

    //Get all jobs posted by all recruiters for guest for homepage.
    public static function get_alljobs_forguest() {
        
        $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';

        $recalljobs = \App\modjobpost::select('job_id', 'jtitle', 'jd',  'qty', 'keywords', 'minexp', 'maxexp', 'minsal', 'maxsal', 'hireloc1', 'hireloc2', 'hireloc3', 'comhirefor', 'jstatus', 'valid_till', 'auto_aprove', 'auto_upd', 'created_at', 'updated_at');
        $recalljobs = $recalljobs->addselect(DB::raw("'sampletext' as jstatus_text, 'daystext' as days_text"));
        $recalljobs = $recalljobs->where('jstatus', '=', 1)
                ->orderBy('job_id','desc')
                ->paginate(3);
        
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
       
    //Get all jobs posted by all recruiters.
    public static function get_jallapplied() {
        if (Auth::check() || Auth::guard('admin')->check())
        {
            if(Auth::check()){
                $authid = Auth::id();
                //Testing
                // $message = "User ID is" . $authid;
                // echo "<script type='text/javascript'>alert('$message');</script>";
            }

            //Testing
            // $message = "User ID is" . $authid;
            // echo "<script type='text/javascript'>alert('$message');</script>";
            //get all jobs applied by Candidate.
            $ujallapplied = DB::table('jobpost')
                    ->join('userjobstat',function($join) use ($authid){
                        $join->on('jobpost.job_id','=','userjobstat.job_id')
                            ->where('jobpost.rec_id','=', $authid);
                    })
                    ->select('jobpost.job_id as job_id', 'jobpost.jtitle as jtitle', 'jobpost.jd as jd',  'jobpost.qty as qty', 'jobpost.keywords as keywords', 'jobpost.minexp as minexp', 'jobpost.maxexp as maxexp', 'jobpost.minsal as minsal', 'jobpost.maxsal as maxsal', 'jobpost.hireloc1 as hireloc1', 'jobpost.hireloc2 as hireloc2', 'jobpost.hireloc3 as hireloc3', 'jobpost.comhirefor as comhirefor', 'jobpost.jstatus as jstatus', 'jobpost.valid_till as valid_till', 'jobpost.auto_aprove as auto_aprove', 'jobpost.auto_upd as auto_upd', 'jobpost.created_at as created_at', 'jobpost.updated_at as updated_at','userjobstat.app_status as app_status', 'userjobstat.viewed_at as viewed_at', 'userjobstat.applied_at as applied_at', 'userjobstat.schedule_id as schedule_id', 'userjobstat.interview_id as interview_id');
            $ujallapplied = $ujallapplied->addselect(DB::raw("'sampletext' as jstatus_text, 'daystext' as days_text"));
            //$ujallapplied = $ujallapplied->where('jstatus', '=', 1);
            $ujallapplied = $ujallapplied->orderBy('userjobstat.job_id','desc')
                                        ->paginate(3);

            // if (\Request::is('recruiter/valljobs' || 'admin/valljobs')) {
                foreach($ujallapplied as $job){
                    if(!(empty($job->hireloc1))){
                        switch($job->hireloc1){
                            case "30":
                                $job->hireloc1="Vijayawada";
                                break;                        
                            case "11":
                                $job->hireloc1="Guntur";
                                break;                        
                            case "24":
                                $job->hireloc1="Rajahmundry";
                                break;                        
                            case "1":
                                $job->hireloc1="Adoni";
                                break;                        
                            case "2":
                                $job->hireloc1="Amaravati";
                                break;                        
                            case "3":
                                $job->hireloc1="Anantapur";
                                break;                        
                            case "4":
                                $job->hireloc1="Bhimavaram";
                                break;                        
                            case "5":
                                $job->hireloc1="Chilakaluripet";
                                break;                        
                            case "6":
                                $job->hireloc1="Chittoor";
                                break;                        
                            case "7":
                                $job->hireloc1="Dharmavaram";
                                break;                        
                            case "8":
                                $job->hireloc1="Eluru";
                                break;                        
                            case "9":
                                $job->hireloc1="Gudivada";
                                break;                        
                            case "10":
                                $job->hireloc1="Guntakal";
                                break;                        
                            case "12":
                                $job->hireloc1="Hindupur";
                                break;                        
                            case "13":
                                $job->hireloc1="Kadapa";
                                break;                        
                            case "14":
                                $job->hireloc1="Kakinada";
                                break;                        
                            case "15":
                                $job->hireloc1="Kavali";
                                break;                        
                            case "16":
                                $job->hireloc1="Kurnool";
                                break;                        
                            case "18":
                                $job->hireloc1="Machilipatnam";
                                break;                        
                            case "19":
                                $job->hireloc1="Madanepalli";
                                break;                        
                            case "20":
                                $job->hireloc1="Narsaraopet";
                                break;                        
                            case "21":
                                $job->hireloc1="Nellore";
                                break;                        
                            case "22":
                                $job->hireloc1="Ongole";
                                break;                        
                            case "23":
                                $job->hireloc1="Proddatur";
                                break;                        
                            case "25":
                                $job->hireloc1="Srikakulam";
                                break;                        
                            case "26":
                                $job->hireloc1="Tadepalligudem";
                                break;                        
                            case "27":
                                $job->hireloc1="Tadipatri";
                                break;                        
                            case "28":
                                $job->hireloc1="Tenali";
                                break;                        
                            case "29":
                                $job->hireloc1="Tirupati";
                                break;                        
                            case "31":
                                $job->hireloc1="Visakhapatnam";
                                break;                        
                            case "32":
                                $job->hireloc1="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($job->hireloc2))){
                        switch($job->hireloc2){
                            case "30":
                                $job->hireloc2="Vijayawada";
                                break;                        
                            case "11":
                                $job->hireloc2="Guntur";
                                break;                        
                            case "24":
                                $job->hireloc2="Rajahmundry";
                                break;                        
                            case "1":
                                $job->hireloc2="Adoni";
                                break;                        
                            case "2":
                                $job->hireloc2="Amaravati";
                                break;                        
                            case "3":
                                $job->hireloc2="Anantapur";
                                break;                        
                            case "4":
                                $job->hireloc2="Bhimavaram";
                                break;                        
                            case "5":
                                $job->hireloc2="Chilakaluripet";
                                break;                        
                            case "6":
                                $job->hireloc2="Chittoor";
                                break;                        
                            case "7":
                                $job->hireloc2="Dharmavaram";
                                break;                        
                            case "8":
                                $job->hireloc2="Eluru";
                                break;                        
                            case "9":
                                $job->hireloc2="Gudivada";
                                break;                        
                            case "10":
                                $job->hireloc2="Guntakal";
                                break;                        
                            case "12":
                                $job->hireloc2="Hindupur";
                                break;                        
                            case "13":
                                $job->hireloc2="Kadapa";
                                break;                        
                            case "14":
                                $job->hireloc2="Kakinada";
                                break;                        
                            case "15":
                                $job->hireloc2="Kavali";
                                break;                        
                            case "16":
                                $job->hireloc2="Kurnool";
                                break;                        
                            case "18":
                                $job->hireloc2="Machilipatnam";
                                break;                        
                            case "19":
                                $job->hireloc2="Madanepalli";
                                break;                        
                            case "20":
                                $job->hireloc2="Narsaraopet";
                                break;                        
                            case "21":
                                $job->hireloc2="Nellore";
                                break;                        
                            case "22":
                                $job->hireloc2="Ongole";
                                break;                        
                            case "23":
                                $job->hireloc2="Proddatur";
                                break;                        
                            case "25":
                                $job->hireloc2="Srikakulam";
                                break;                        
                            case "26":
                                $job->hireloc2="Tadepalligudem";
                                break;                        
                            case "27":
                                $job->hireloc2="Tadipatri";
                                break;                        
                            case "28":
                                $job->hireloc2="Tenali";
                                break;                        
                            case "29":
                                $job->hireloc2="Tirupati";
                                break;                        
                            case "31":
                                $job->hireloc2="Visakhapatnam";
                                break;                        
                            case "32":
                                $job->hireloc2="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(empty($job->hireloc3))){
                        switch($job->hireloc3){
                            case "30":
                                $job->hireloc3="Vijayawada";
                                break;                        
                            case "11":
                                $job->hireloc3="Guntur";
                                break;                        
                            case "24":
                                $job->hireloc3="Rajahmundry";
                                break;                        
                            case "1":
                                $job->hireloc3="Adoni";
                                break;                        
                            case "2":
                                $job->hireloc3="Amaravati";
                                break;                        
                            case "3":
                                $job->hireloc3="Anantapur";
                                break;                        
                            case "4":
                                $job->hireloc3="Bhimavaram";
                                break;                        
                            case "5":
                                $job->hireloc3="Chilakaluripet";
                                break;                        
                            case "6":
                                $job->hireloc3="Chittoor";
                                break;                        
                            case "7":
                                $job->hireloc3="Dharmavaram";
                                break;                        
                            case "8":
                                $job->hireloc3="Eluru";
                                break;                        
                            case "9":
                                $job->hireloc3="Gudivada";
                                break;                        
                            case "10":
                                $job->hireloc3="Guntakal";
                                break;                        
                            case "12":
                                $job->hireloc3="Hindupur";
                                break;                        
                            case "13":
                                $job->hireloc3="Kadapa";
                                break;                        
                            case "14":
                                $job->hireloc3="Kakinada";
                                break;                        
                            case "15":
                                $job->hireloc3="Kavali";
                                break;                        
                            case "16":
                                $job->hireloc3="Kurnool";
                                break;                        
                            case "18":
                                $job->hireloc3="Machilipatnam";
                                break;                        
                            case "19":
                                $job->hireloc3="Madanepalli";
                                break;                        
                            case "20":
                                $job->hireloc3="Narsaraopet";
                                break;                        
                            case "21":
                                $job->hireloc3="Nellore";
                                break;                        
                            case "22":
                                $job->hireloc3="Ongole";
                                break;                        
                            case "23":
                                $job->hireloc3="Proddatur";
                                break;                        
                            case "25":
                                $job->hireloc3="Srikakulam";
                                break;                        
                            case "26":
                                $job->hireloc3="Tadepalligudem";
                                break;                        
                            case "27":
                                $job->hireloc3="Tadipatri";
                                break;                        
                            case "28":
                                $job->hireloc3="Tenali";
                                break;                        
                            case "29":
                                $job->hireloc3="Tirupati";
                                break;                        
                            case "31":
                                $job->hireloc3="Visakhapatnam";
                                break;                        
                            case "32":
                                $job->hireloc3="Vizianagaram";
                                break;                        
                        }
                    }
                    if(!(isset($job->hireloc2))){
                        $job->hireloc2 ='';
                        $job->hireloc3 ='';
                    }
                    
                    //Count days when the job posted
                    $ntimestamp= strtotime(Carbon::now());
                    $valtstamp = strtotime($job->created_at);
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
                            $job->days_text="Today";
                            break;
                        case 1:
                            $job->days_text="Yesterday";
                            break;
                        default:
                            $job->days_text=$daysdiff . " days ago";
                    }

                    //Job Status text as per value
                    switch($job->jstatus){
                        case 0:
                            $job->jstatus_text="Approval Pending";
                            break;
                        case 1:
                            $job->jstatus_text="Active";
                            break;
                        case 2:
                            $job->jstatus_text="Rejected";
                            break;
                        case 3:
                            $job->jstatus_text="Closed";
                            break;
                        case 4:
                            $job->jstatus_text="Hold";
                            break;
                        case 5:
                            $job->jstatus_text="Expired";
                            break;
                        case 6:
                            $job->jstatus_text="Archieved";
                            break;
                    }
                }
            return $ujallapplied;
        }
        else {
            return view('home');
        }
    }
    //Mike
    //Get all job applications applied by users.
    public static function get_recgetjapp() {
        if (Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            $authid=0; //initializing auth id
            if(Auth::guard('recruiter')->check()){
                $authid = Auth::guard('recruiter')->user()->id;
            }

            //Testing
            // $message = "User ID is" . $authid;
            // echo "<script type='text/javascript'>alert('$message');</script>";
            
            $getuserjapp = DB::table('jobpost')
                ->join('userjobstat',function($join) use ($authid){
                        $join->on('jobpost.job_id','=','userjobstat.job_id')
                            ->where('jobpost.rec_id','=', $authid);
                })
                ->join('users',function($join){
                        $join->on('userjobstat.rec_id','=','users.id');
                })
                ->join('resupdet',function($join){
                        $join->on('users.id','=','resupdet.pdet_id');
                })
                ->join('resuemp',function($join){
                        $join->on('users.id','=','resuemp.emp_id');
                })
                ->join('resuedu',function($join){
                        $join->on('users.id','=','resuedu.edu_id')
                            ->on('resuedu.id','=',DB::raw("(select max(id) from resuedu)"));
                })
                ->select('jobpost.job_id as job_id', 'jobpost.jtitle as jtitle', 'jobpost.comhirefor as comhirefor', 'userjobstat.app_status as app_status', 'userjobstat.schedule_id as schedule_id', 'userjobstat.interview_id as interview_id', 'users.id as userid', 'users.name as name', 'users.email as email', 'users.mob_num as mobnum','resupdet.profpic as profpic','resupdet.picpath as picpath','resupdet.picname as picname', 'resuemp.emp_name as emp_name','resuemp.desg as desg', 'resuemp.exp_months as exp_months', 'resuemp.msal as msal', 'resuedu.colname as colname', 'resuedu.pyear as pyear', 'resuedu.cortype as cortype', 'resuedu.qual as qual', 'resuedu.board as board', 'resuedu.course as course', 'resuedu.spec as spec');

            $getuserjapp = $getuserjapp->addselect(DB::raw("'8.2 Yrs' as expyears_text"));
            //$ujallapplied = $ujallapplied->where('jstatus', '=', 1);
            $getuserjapp = $getuserjapp->orderBy('userjobstat.job_id','desc')
                                        ->paginate(3);

            // if (\Request::is('recruiter/valljobs' || 'admin/valljobs')) {
                foreach($getuserjapp as $job){
                    if($job->profpic == 1){
                        list($name11, $ext11) = explode('.', $job->picname);
                        $job->picpath=$job->picpath."/".$job->userid.".".$ext11;
                    }
                    //converting months to years and then to text
                    if($job->exp_months>12){
                        $expyears1=(int)floor($job->exp_months/12);
                        $expmonths1=$job->exp_months % 12;
                        $job->expyears_text=$expyears1.".".$expmonths1." Yrs";
                    }
                    else{
                        $expyears1=0;
                        if($job->exp_months>0){
                            $job->expyears_text=$job->exp_months." Months";
                        }
                        else{
                            $job->expyears_text="Fresher";
                        }
                    }

                    if($job->cortype=="full"){
                        $job->cortype="Full Time";
                    }
                    else if($job->cortype=="part"){
                        $job->cortype="Part Time";
                    }
                    else{
                        $job->cortype="Distance";
                    }

                    //Course to Text
                    if ($job->qual=="ssc"){
                        $qual_text="SSC";
                    }
                    else if($job->qual=="inter"){
                        $qual_text="Intermediate";
                    }
                    else if($job->qual=="grad"){
                        switch ($job->course){
                            case "0":
                                $qual_text1="B.A";
                                break;
                            case "1":
                                $qual_text1="B.Arch";
                                break;
                            case "2":
                                $qual_text1="B.B.A/B.M.S";
                                break;
                            case "3":
                                $qual_text1="B.Com";
                                break;
                            case "4":
                                $qual_text1="B.Des.";
                                break;
                            case "5":
                                $qual_text1="B.Ed";
                                break;
                            case "6":
                                $qual_text1="B.EI.Ed";
                                break;
                            case "7":
                                $qual_text1="B.P.Ed";
                                break;
                            case "8":
                                $qual_text1="B.Pharma";
                                break;
                            case "9":
                                $qual_text1="B.Sc";
                                break;
                            case "10":
                                $qual_text1="B.Tech/B.E.";
                                break;
                            case "11":
                                $qual_text1="B.U.M.S";
                                break;
                            case "12":
                                $qual_text1="BAMS";
                                break;
                            case "13":
                                $qual_text1="BCA";
                                break;
                            case "14":
                                $qual_text1="BDS";
                                break;
                            case "15":
                                $qual_text1="BFA";
                                break;
                            case "16":
                                $qual_text1="BHM";
                                break;
                            case "17":
                                $qual_text1="BHMS";
                                break;
                            case "18":
                                $qual_text1="BVSC";
                                break;
                            case "19":
                                $qual_text1="Diploma";
                                break;
                            case "20":
                                $qual_text1="LLB";
                                break;
                            case "21":
                                $qual_text1="MBBS";
                                break;
                            case "22":
                                $qual_text1="Other";
                                break;
                        }
                        $qual_text=$qual_text1;
                    }
                    else if($job->qual=="pg"){
                        switch ($job->course){
                            case "1":
                                $qual_text1="CA";
                                break;
                            case "2":
                                $qual_text1="CS";
                                break;
                            case "3":
                                $qual_text1="DM";
                                break;
                            case "4":
                                $qual_text1="ICWA (CMA)";
                                break;
                            case "5":
                                $qual_text1="Integrated PG";
                                break;
                            case "6":
                                $qual_text1="LLM";
                                break;
                            case "7":
                                $qual_text1="M.A";
                                break;
                            case "8":
                                $qual_text1="M.Arch";
                                break;
                            case "9":
                                $qual_text1="M.Ch";
                                break;
                            case "10":
                                $qual_text1="M.Com";
                                break;
                            case "11":
                                $qual_text1="M.Des.";
                                break;
                            case "12":
                                $qual_text1="M.Ed";
                                break;
                            case "13":
                                $qual_text1="M.Pharma";
                                break;
                            case "14":
                                $qual_text1="MS/ M.Sc(Science)";
                                break;
                            case "15":
                                $qual_text1="M.Tech";
                                break;
                            case "16":
                                $qual_text1="MBA/PGDM";
                                break;
                            case "17":
                                $qual_text1="MCA";
                                break;
                            case "18":
                                $qual_text1="MCM";
                                break;
                            case "19":
                                $qual_text1="MDS";
                                break;
                            case "20":
                                $qual_text1="MFA";
                                break;
                            case "21":
                                $qual_text1="Medical-MS/MD";
                                break;
                            case "22":
                                $qual_text1="MVSC";
                                break;
                            case "23":
                                $qual_text1="PG Diploma";
                                break;
                            case "24":
                                $qual_text1="Other";
                                break;
                        }
                        $qual_text=$qual_text1;
                    }
                    $job->qual=$qual_text;
                }    
                // }
            return $getuserjapp;
        }
        else {
            return view('recruiter');
        }
    }

    // Get only application status.
    public static function get_appstatus($userid,$jobid) {
         if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
         {
            $authid=$userid;
            
            //Initializing
            $appstat=0;
            //check job applied status
            $app_status = \App\mod_userjobstat::select('app_status')
                            ->where('rec_id', '=', $authid)
                            ->where('job_id', '=', $jobid)
                            ->get();
            
            foreach($app_status as $key=>$val){
                $appstat=$val["app_status"];
            }
            
            return $appstat;
         }
         else {
            return view('recruiter');
         }
    }

    // Update all application status.
    public static function upd_appstatus($userid,$jobid,$appstat) {
         if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
         {
            $authid=$userid;
            $app_status=$appstat;
            //check job applied status
            $app_status = DB::table('userjobstat')
                            ->where('rec_id', '=', $authid)
                            ->where('job_id', '=', $jobid)
                            ->limit(1)
                            ->update(['app_status'=>$app_status]);
            
            return true;
         }
         else {
            return view('recruiter');
         }
    }
    
    //Get Maximum Sch ID for Jobs.
    public static function get_maxschid() {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
        {
            //$authid = Auth::guard('recruiter')->user()->id;
            //get last jobid
            $maxschid=null;
            $maxschid = \App\mod_schedule::max('sch_id');
                    //->first();

            if(!$maxschid==null){
                return $maxschid;
            }
            else{
                return 0;
            }
        }
        else {
            return back();
        }
    }
    
    // Update Schedule ID.
    public static function upd_scheduleid($userid,$jobid,$schid,$appstat) {
         if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
         {
            $authid=$userid;
            //check job applied status
            $app_status = DB::table('userjobstat')
                            ->where('rec_id', '=', $authid)
                            ->where('job_id', '=', $jobid)
                            ->limit(1)
                            ->update(['schedule_id'=>$schid]);
            
            return true;
         }
         else {
            return back();
         }
    }
    
    //Update Transaction Table before going to payment gateway.
    public static function upd_itransact($intrans_id, $extrans_id, $trans_type, $trans_amnt, $prod_id, $prod_info, $trans_with, $trans_validto, $trans_stat, $trans_msg) {
         if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
         {
            $userid=$recid=null;

            if(Auth::check()){
                $userid=Auth::id();    
            }
            else{
                $recid=Auth::guard('recruiter')->user()->id;
            }
            
            //Update transact table
            return self::dbitransact($intrans_id, $extrans_id, $trans_type, $trans_amnt, $prod_id, $prod_info, $trans_with, $trans_validto, $trans_stat, $trans_msg, $userid, $recid);
            //echo "In get_profile function- ".$head;
            if(!($dbstatus==true)){
                return true;    
            }
            else{
                return false;
            }
         }
         else {
            return back();
         }
    }

    public static function dbitransact($intrans_id, $extrans_id, $trans_type, $trans_amnt, $prod_id, $prod_info, $trans_with, $trans_validto, $trans_stat, $trans_msg, $userid, $recid)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $dbrec = \App\mod_transact::updateOrCreate(
                [
                 'intrans_id' => $intrans_id,
                 'extrans_id' => $extrans_id
                ], 
                [
                 'trans_type'   => $trans_type,
                 'trans_amnt'   => $trans_amnt,
                 'prod_id'      => $prod_id,
                 'prod_info'    => $prod_info,
                 'trans_with'   => $trans_with,
                 'trans_validto' => $trans_validto,
                 'trans_stat'   => $trans_stat,
                 'trans_msg'    => $trans_msg,
                 'trans_byuser' => $userid,
                 'trans_byrec'  => $recid
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

    public static function upd_stransact($intrans_id, $trans_stat, $trans_msg)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $dbrec = DB::table('transact')
                        ->where('intrans_id', '=', $intrans_id)
                        ->limit(1)
                        ->update(['trans_stat'=>$trans_stat, 'trans_msg'=>$trans_msg]);
            
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

    //Get Maximum internal Transaction ID for transactions.
    public static function get_maxintransid() {
        $intrans_id = \App\mod_transact::max('intrans_id');
                //->first();

        if(!$intrans_id==null){
            return $intrans_id;
        }
        else{
            return 1000;
        }
    }

    public static function upd_credit($user_id, $rec_id, $credit_id, $intrans_id, $credits, $credit_type, $status)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $dbrec = \App\mod_credits::updateOrCreate(
                [
                 'credit_id'  => $credit_id,
                 'intrans_id' => $intrans_id
                ], 
                [
                 'user_id'      => $user_id,
                 'rec_id'       => $rec_id,
                 'credits'      => $credits,
                 'credit_type'  => $credit_type,
                 'status'       => $status
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
    
    //Get Maximum credit ID for transactions.
    public static function get_maxcreditid() {
        $credit_id = \App\mod_credits::max('credit_id');

        if(!$credit_id==null){
            return $credit_id;
        }
        else{
            return 1000;
        }
    }
    
    //Get Total number of valid credits.
    public static function get_allcredits() {
        if (Auth::check() || Auth::guard('recruiter')->check() || Auth::guard('admin')->check()){
            $userid=$recid=null;

            if(Auth::check()){
                $userid=Auth::id();    
                
                $total_credits = DB::table('credits')
                            ->where('user_id', '=', $userid)
                            ->where('status', '=', 1)
                            ->sum('credits');
            }
            else{
                $recid=Auth::guard('recruiter')->user()->id;
                
                $total_credits = DB::table('credits')
                            ->where('rec_id', '=', $recid)
                            ->where('status', '=', 1)
                            ->sum('credits');
            }

            return $total_credits;
        }
        else {
            return back();
        }
    }
}