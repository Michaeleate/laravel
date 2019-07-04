@extends('users.layouts.prof')
<?php 
    use \App\Http\Controllers\PostsController; 
    
    $head_line=$oldresu='';
    $kskil1=$kskil2=$kskil3=$kskil4=$kskil5='';
    $resutime=NULL;
    $fname=$email=$mob_num=$gender=$dob=$marstat=$eng_lang=$tel_lang=$hin_lang=$oth_lang=$diff_able=$able1=$able2=$able3=$profpic=$picpath=$picname=NULL;
    $picload="Uploaded - ";
    $qual1=$board1=$pyear1=$colname1=$edulang1=$percentage1=$edutime1='';
    $qual2=$board2=$pyear2=$colname2=$edulang2=$percentage2=$edutime2='';
    $qual3=$course3=$spec3=$colname3=$district3=$cortype3=$pyear3=$edulang3=$percentage3=$edutime3='';
    $qual4=$course4=$spec4=$colname4=$district4=$cortype4=$pyear4=$edulang4=$percentage4=$edutime4='';
    $empname=$expyears=$expyears1=$expmonths1=$expmonths=$desg=$startdt=$enddt=$msal=$resp=$nperiod=$emptime=$msalt=$msall='';
    $addtype1=$addline11=$addline21=$city1=$state1=$zcode1=$country1=$addtime1='';
    $addtype2=$addline12=$addline22=$city2=$state2=$zcode2=$country2=$addtime2='';
    $refnum1=$fname1=$location1=$email1=$mobnum1=$reftime1='';
    $refnum2=$fname2=$location2=$email2=$mobnum2=$reftime2='';

    $head=PostsController::get_head();
    foreach($head as $key=>$val){
        $head_line=$val["head_line"];
    }

    $resume=PostsController::get_resume();
    foreach($resume as $key=>$val){
        $oldresu=$val["oldresu"];
        $resutime=$val["updated_at"];
    }

    $keyskills=PostsController::get_kskill();
    foreach($keyskills as $key=>$val){
        $kskil1=$val["kskil1"];
        $kskil2=$val["kskil2"];
        $kskil3=$val["kskil3"];
        $kskil4=$val["kskil4"];
        $kskil5=$val["kskil5"];
    }

    $perdetails=PostsController::get_pdet();
    foreach($perdetails as $key=>$val){
        $fname=$val["fname"];
        $email=$val["email"];
        $mob_num=$val["mob_num"];
        $gender=$val["gender"];
        $dob=$val["dob"];
        $marstat=$val["marstat"];
        $eng_lang=$val["eng_lang"];
        $tel_lang=$val["tel_lang"];
        $hin_lang=$val["hin_lang"];
        $oth_lang=$val["oth_lang"];
        $diff_able=$val["diff_able"];
        $able1=$val["able1"];
        $able2=$val["able2"];
        $able3=$val["able3"];
        $profpic=$val["profpic"];
        $picpath=$val["picpath"];
        $picname=$val["picname"];
    }

    $edu=PostsController::get_edu1();
    $i=0;
    foreach($edu as $key=>$val){
        if($i==0){
            $qual1=$val["qual"];
            $board1=$val["board"];
            $colname1=$val["colname"];
            $pyear1=$val["pyear"];
            $edulang1=$val["edulang"];
            $percentage1=$val["percentage"];
            $edutime1=$val["updated_at"];
        }
        else if($i==1){
            $qual2=$val["qual"];
            $board2=$val["board"];
            $colname2=$val["colname"];
            $pyear2=$val["pyear"];
            $edulang2=$val["edulang"];
            $percentage2=$val["percentage"];
            $edutime2=$val["updated_at"];
        }
        else if($i==2){
            $qual3=$val["qual"];
            $course3=$val["course"];
            $spec3=$val["spec"];
            $colname3=$val["colname"];
            $district3=$val["district"];
            $cortype3=$val["cortype"];
            $pyear3=$val["pyear"];
            $edulang3=$val["edulang"];
            $percentage3=$val["percentage"];
            $edutime3=$val["updated_at"];
        }
        else if($i==3){
            $qual4=$val["qual"];
            $course4=$val["course"];
            $spec4=$val["spec"];
            $colname4=$val["colname"];
            $district4=$val["district"];
            $cortype4=$val["cortype"];
            $pyear4=$val["pyear"];
            $edulang4=$val["edulang"];
            $percentage4=$val["percentage"];
            $edutime4=$val["updated_at"];
        }
        $i=$i+1;
    }

    $emp=PostsController::get_emp();
    foreach($emp as $key=>$val){
        $empname=$val["emp_name"];
        $expmonths=$val["exp_months"];
        $desg=$val["desg"];
        $startdt=$val["startdt"];
        $enddt=$val["enddt"];
        $msal=$val["msal"];
        $resp=$val["resp"];
        $nperiod=$val["nperiod"];
        $emptime=$val["updated_at"];
    }

    if($expmonths>12){
        $expyears1=(int)floor($expmonths/12);
        $expmonths1=$expmonths % 12;
        $expyears=$expyears1.".".$expmonths1." Yrs";
    }
    else{
        $expyears1=0;
        if($expmonths>0){
            $expyears=$expmonths." Months";
        }
        else{
            $expyears="Fresher";
        }
    }

    $msal_length=strlen($msal);
    $smsal=(string) $msal;
    switch($msal_length){
        case 4:
            $msalt=substr($smsal, 0, 1);
            break;
        case 5:
            $msalt=substr($smsal, 0, 2);
            break;
        case 6:
            $msalt=substr($smsal, 1, 2);
            $msall=substr($smsal, 0, 1);
            break;
        case 7:
            $msalt=substr($smsal, 2, 2);
            $msall=substr($smsal, 0, 2);
            break;
    }
    $msalt=(int) $msalt;
    $msall=(int) $msall;

    $adds=PostsController::get_add();
    $i=1;
    foreach($adds as $key=>$val){
        if($i==1){
            $addtype1=$val["addtype"];
            $addline11=$val["addline1"];
            $addline21=$val["addline2"];
            $city1=$val["city"];
            $state1=$val["state"];
            $zcode1=$val["zcode"];
            $country1=$val["country"];
            $addtime1=$val["updated_at"];
        }
        else{
            $addtype2=$val["addtype"];
            $addline12=$val["addline1"];
            $addline22=$val["addline2"];
            $city2=$val["city"];
            $state2=$val["state"];
            $zcode2=$val["zcode"];
            $country2=$val["country"];
            $addtime2=$val["updated_at"];
        }
        $i=$i+1;
    }

    $refs=PostsController::get_ref();
    $i=1;
    foreach($refs as $key=>$val){
        if($i==1){
            $refnum1=$val["refnum"];
            $fname1=$val["fname"];
            $location1=$val["location"];
            $email1=$val["email"];
            $mobnum1=$val["mobnum"];
            $reftime1=$val["updated_at"];
        }
        else{
            $refnum2=$val["refnum"];
            $fname2=$val["fname"];
            $location2=$val["location"];
            $email2=$val["email"];
            $mobnum2=$val["mobnum"];
            $reftime2=$val["updated_at"];
        }
        $i=$i+1;
    }

?>
{{-- Build Main Menu for Registered Candidates --}}
@section('buildMenu')
<ul class="navbar-nav ml-lg-auto text-center">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home')}}">Home
            <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('/user-profile') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/user-profile') }}">Create Profile</a>
            <a class="dropdown-item" href="{{ url('/view-user-profile') }}">View Profile</a>
            <a class="dropdown-item" href="{{ url('/edit-user-profile') }}">Modify Profile</a>
            {{-- <a class="dropdown-item" href="{{ url('/edit-user-visible') }}">Profile Visibility</a> --}}
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Jobs
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/uvalljobs') }}">View all jobs</a>
            <a class="dropdown-item" href="{{ url('/applyjobs') }}">Apply Jobs</a>
            <a class="dropdown-item" href="{{ url('/viewjobstatus') }}">Application Status</a>
            <a class="dropdown-item" href="{{ url('/checkschd') }}">Interview Schedule</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Services
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/resume_service') }}">Resume Writing</a>
            <a class="dropdown-item" href="{{ url('/int_prep') }}">Interview Preparation</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Credits
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/buycredits') }}">Buy Credits</a>
            <a class="dropdown-item" href="#">Credits Statement</a>
            <a class="dropdown-item" href="#">Invoice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
    </li>
</ul>
@endsection

{{-- Build Sub Menu for Create Profile for Registered Candidates --}}
@section('CreateProfileMenu')
{{--Can have left menu afterwards --}}
@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Precisely--}}
<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:180px !important;">
    <div class="row emply-info">
        <div class="col-md-3">
        <img src="{{url($picpath)}}" style="border-radius:80%; width:100%; height:120px;">
        </div>
        <div class="col-md-6" style="float:left; height:200px;">
            <label style="width:100%;">{{$fname}}</label>
            <label style="width:100%;">{{$desg}} in {{$empname}}</label>
            <div class="col-md-6" style="float:left;">
                <label style="width:100%;">{{$city1}}</label>
                <label style="width:100%;">{{$expyears}}</label>
            </div>
            <div class="col-md-6" style="float:right;">
                <label style="width:100%;">+91 {{$mob_num}} </label>
                <label style="width:100%;">{{$email}} </label>
            </div>
        </div>
        <div class="col-md-3" style="float:right; height:115px !important;">
            <label style="width:100%;">Recruiters Search: 100</label>
            <label style="width:100%;">Jobs Applied: 100</label>
            <label style="width:100%;">Updated: {{substr($resutime, 0, 10)}}</label>
        </div>
    </div>
</div>

{{-- Resume Headline--}}
<div class="emply-resume-list row mb-1" id="headline1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Experience Summary:</h5></label>
            <textarea id="ta1" name="headline" style="height:120px; width:100%; resize:none; border:0px" readonly></textarea>
        </div>
    </div>
</div>

{{-- Qualification--}}
<div class="emply-resume-list row mb-1" id="qual1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Qualification:</h5></label>
            <ul>
                <li>
                    SSC - 
                    @if(!($colname1==''))
                        from {{$colname1}} in {{$pyear1}} with {{$percentage1}}
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Under graduation - 
                    @if(!($colname2==''))
                        from {{$colname2}} in {{$pyear2}} with {{$percentage2}}</li>
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Graduation - 
                    @if(!($colname3==''))
                        ({{$course3}}) from {{$colname3}} in {{$pyear3}} with {{$percentage3}}
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Post graduation - 
                    @if(!($colname4==''))
                        ({{$course4}}) from {{$colname4}} in {{$pyear4}} with {{$percentage4}}
                    @else
                        Not shared with us.
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- Key Skills --}}
<div class="emply-resume-list row mb-1" id="keyskills1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Key Skills:</h5></label>
            <ul>
                <li>{{$kskil1}}</li>
                <li>{{$kskil2}}</li>
                <li>{{$kskil3}}</li>
            </ul>
        </div>
    </div>
</div>

{{-- Employment Details --}}
<div class="emply-resume-list row mb-1" id="emp1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Professional Experience:</h5></label>
            <table style="width:30%">
            <tr>
                <td><b>Company:</b></td>
                <td>&emsp;{{ $empname }}</td> 
            </tr>
            <tr>
                <td><b>Start date:</b></td>
                <td>&emsp;{{ $startdt }}</td> 
            </tr>
            <tr>
                <td><b>End date:</b></td>
                <td>&emsp;{{ $enddt }}</td> 
            </tr>
            <tr>
                <td><b>Notice Period:</b></td>
                <td>&emsp;{{ $nperiod }}</td> 
            </tr>
            <tr>
                <td><b>Role:</b></td>
                <td>&emsp;{{ $desg }}</td> 
            </tr>
            </table>
            <label style="width:100%;"><b>Responsibilities:</b>&emsp;{{ $resp }}</label>
        </div>
    </div>
</div>

{{-- Address Details --}}
<div class="emply-resume-list row mb-1" id="add1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Address:</h5></label>
            <table>
                <tr>
                    <td>
                        <label style="width:100%;"><u>Current Address:</u></label>
                        <label style="width:100%;">{{ $addline11 }}</label>
                        <label style="width:100%;">{{ $addline21 }}</label>
                        <label style="width:100%;">{{ $city1 }}</label>
                        <label style="width:100%;">{{ $state1 }}</label>
                        <label style="width:100%;">{{ $zcode1 }}</label>
                        <label style="width:100%;">{{ $country1 }}</label>
                    </td>
                    <td>
                        <label style="width:100%;"><u>Permanent Address:</u></label>
                        <label style="width:100%;">{{ $addline12 }}</label>
                        <label style="width:100%;">{{ $addline22 }}</label>
                        <label style="width:100%;">{{ $city2 }}</label>
                        <label style="width:100%;">{{ $state2 }}</label>
                        <label style="width:100%;">{{ $zcode2 }}</label>
                        <label style="width:100%;">{{ $country2 }}</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

{{-- Reference Details --}}
<div class="emply-resume-list row mb-1" id="ref1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Reference Details:</h5></label>
            <table>
                <tr>
                    <td>
                        <label style="width:100%;"><u>Reference 1:</u></label>
                        <label style="width:100%;">{{ $fname1 }}</label>
                        <label style="width:100%;">+91{{ $mobnum1 }}</label>
                        <label style="width:100%;">{{ $email1 }}</label>
                        <label style="width:100%;">{{ $location1 }}</label>
                    </td>
                    <td>
                        <label style="width:100%;"><u>Reference 2:</u></label>
                        <label style="width:100%;">{{ $fname2 }}</label>
                        <label style="width:100%;">+91{{ $mobnum2 }}</label>
                        <label style="width:100%;">{{ $email2 }}</label>
                        <label style="width:100%;">{{ $location2 }}</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
window.load = function(){
    document.getElementById("head1").value = head_line;
}
</script>
@endsection