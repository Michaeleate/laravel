@extends('recruiter.layouts.userprof')
<?php 
    use \App\Http\Controllers\PostsController; 
    
    $head_line=$user_id='';
    $kskil1=$kskil2=$kskil3=$kskil4=$kskil5='';
    $resutime=NULL;
    $fname=$mob_num=$gender=$dob=$marstat=$eng_lang=$tel_lang=$hin_lang=$oth_lang=$diff_able=$able1=$able2=$able3=$profpic=$picpath=$picname=NULL;
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

    foreach($head as $prof){
        $head_line=$prof->head_line;
        $user_id=$prof->head_id;
        
    }

    foreach($resume as $prof){
        $oldresu=$prof->oldresu;
        $resutime=$prof->updated_at;
    }

    foreach($keyskills as $prof){
        $kskil1=$prof->kskil1;
        $kskil2=$prof->kskil2;
        $kskil3=$prof->kskil3;
        $kskil4=$prof->kskil4;
        $kskil5=$prof->kskil5;
    }

    foreach($perdetails as $prof){
        $fname=$prof->fname;
        $email=$prof->email;
        $mob_num=$prof->mob_num;
        $gender=$prof->gender;
        $dob=$prof->dob;
        $marstat=$prof->marstat;
        $eng_lang=$prof->eng_lang;
        $tel_lang=$prof->tel_lang;
        $hin_lang=$prof->hin_lang;
        $oth_lang=$prof->oth_lang;
        $diff_able=$prof->diff_able;
        $able1=$prof->able1;
        $able2=$prof->able2;
        $able3=$prof->able3;
        $profpic=$prof->profpic;
        $picpath=$prof->picpath;
        $picname=$prof->picname;
    }

    $i=0;
    foreach($edu as $prof){
        if($i==0){
            $qual1=$prof->qual;
            $board1=$prof->board;
            $colname1=$prof->colname;
            $pyear1=$prof->pyear;
            $edulang1=$prof->edulang;
            $percentage1=$prof->percentage;
            $edutime1=$prof->updated_at;
        }
        else if($i==1){
            $qual2=$prof->qual;
            $board2=$prof->board;
            $colname2=$prof->colname;
            $pyear2=$prof->pyear;
            $edulang2=$prof->edulang;
            $percentage2=$prof->percentage;
            $edutime2=$prof->updated_at;
        }
        else if($i==2){
            $qual3=$prof->qual;
            $course3=$prof->course;
            $spec3=$prof->spec;
            $colname3=$prof->colname;
            $district3=$prof->district;
            $cortype3=$prof->cortype;
            $pyear3=$prof->pyear;
            $edulang3=$prof->edulang;
            $percentage3=$prof->percentage;
            $edutime3=$prof->updated_at;
        }
        else if($i==3){
            $qual4=$prof->qual;
            $course4=$prof->course;
            $spec4=$prof->spec;
            $colname4=$prof->colname;
            $district4=$prof->district;
            $cortype4=$prof->cortype;
            $pyear4=$prof->pyear;
            $edulang4=$prof->edulang;
            $percentage4=$prof->percentage;
            $edutime4=$prof->updated_at;
        }
        $i=$i+1;
    }

    foreach($emp as $prof){
        $empname=$prof->emp_name;
        $expmonths=$prof->exp_months;
        $desg=$prof->desg;
        $startdt=$prof->startdt;
        $enddt=$prof->enddt;
        $msal=$prof->msal;
        $resp=$prof->resp;
        $nperiod=$prof->nperiod;
        $emptime=$prof->updated_at;
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

    $i=1;
    foreach($adds as $prof){
        if($i==1){
            $addtype1=$prof->addtype;
            $addline11=$prof->addline1;
            $addline21=$prof->addline2;
            $city1=$prof->city;
            $state1=$prof->state;
            $zcode1=$prof->zcode;
            $country1=$prof->country;
            $addtime1=$prof->updated_at;
        }
        else{
            $addtype2=$prof->addtype;
            $addline12=$prof->addline1;
            $addline22=$prof->addline2;
            $city2=$prof->city;
            $state2=$prof->state;
            $zcode2=$prof->zcode;
            $country2=$prof->country;
            $addtime2=$prof->updated_at;
        }
        $i=$i+1;
    }

    $i=1;
    foreach($refs as $prof){
        if($i==1){
            $refnum1=$prof->refnum;
            $fname1=$prof->fname;
            $location1=$prof->location;
            $email1=$prof->email;
            $mobnum1=$prof->mobnum;
            $reftime1=$prof->updated_at;
        }
        else{
            $refnum2=$prof->refnum;
            $fname2=$prof->fname;
            $location2=$prof->location;
            $email2=$prof->email;
            $mobnum2=$prof->mobnum;
            $reftime2=$prof->updated_at;
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
            <a class="dropdown-item" href="{{ url('/edit-user-visible') }}">Profile Visibility</a>
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
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Status
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/viewjobstatus') }}">Application Status</a>
            <a class="dropdown-item" href="services.html">Interview Schedule</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Credits
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="employer_list.html">Buy Credits</a>
            <a class="dropdown-item" href="employer_list.html">Credits Statement</a>
            <a class="dropdown-item" href="employer_single.html">Invoice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
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
            {{--
            <div class="col-md-6" style="float:right;">
                <label style="width:100%;">+91 {{$job->usermob}} </label>
                <label style="width:100%;">{{$job->usermail}} </label>
            </div>
            --}}
        </div>
        <div class="col-md-3" style="float:right; height:115px !important;">
            <label style="width:100%;">Recruiters Search: 100</label>
            <label style="width:100%;">Jobs Applied: 100</label>
            <label style="width:100%;">Updated: {{substr($resutime, 0, 10)}}</label>
        </div>
    </div>
</div>

<div class="emply-resume-list row mb-1" id="headline1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Experience Summary:</h5></label>
            <textarea id="ta1" name="headline" style="height:120px; width:100%; resize:none; border:0px" readonly></textarea>
        </div>
    </div>
</div>

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

<div class="emply-resume-list row mb-1" id="ref1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Reference Details:</h5></label>
            <table>
                <tr>
                    <td>
                        <label style="width:100%;"><u>Reference 1:</u></label>
                        <label style="width:100%;">{{ $fname1 }}</label>
                        {{-- <label style="width:100%;">+91{{ $mobnum1 }}</label>
                        <label style="width:100%;">{{ $email1 }}</label> --}}
                        <label style="width:100%;">Shared after interview</label>
                        <label style="width:100%;">Shared after interview</label>
                        <label style="width:100%;">{{ $location1 }}</label>
                    </td>
                    <td>
                        <label style="width:100%;"><u>Reference 2:</u></label>
                        <label style="width:100%;">{{ $fname2 }}</label>
                        {{-- <label style="width:100%;">+91{{ $mobnum2 }}</label>
                        <label style="width:100%;">{{ $email2 }}</label> --}}
                        <label style="width:100%;">Shared after interview</label>
                        <label style="width:100%;">Shared after interview</label>
                        <label style="width:100%;">{{ $location2 }}</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection