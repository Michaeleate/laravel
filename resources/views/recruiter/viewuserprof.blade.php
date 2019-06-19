@extends('recruiter.layouts.userprof')
<?php 
    use \App\Http\Controllers\PostsController; 
    
    $head_line=$user_id=$jobid=$appstat='';
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
    $jtitle=$jd=$qty=$minexp=$maxexp=$comhirefor=$days_text='';

    $jobid=$others["jobid"];
    $appstat=$others["appstat"];

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

    foreach($jobdet as $job){
        $jtitle=$job->jtitle;
        $jd=$job->jd;
        $qty=$job->qty;
        $minexp=$job->minexp;
        $maxexp=$job->maxexp;
        $comhirefor=$job->comhirefor;
        $days_text=$job->days_text;
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

<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:220px !important;">
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
            @if($appstat < 4)
                @if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
                    <a href="{{ route('shortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" onclick="event.preventDefault(); document.getElementById('shortlist_form').submit();">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:block;margin:5px; background-color:#A9DFBF; border-color:#A9DFBF; color:black;" id="i-shortlist" name="shortlist">Shortlist</button></a>
                    {{--<label style="display:inline-block; float:right; width:100px;">&nbsp;&emsp;&emsp;&emsp;&emsp;</label> --}}
                    <form id="shortlist_form" action="{{ route('shortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" method="POST">
                        @csrf
                    </form>

                    <a href="{{ route('notshortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" onclick="event.preventDefault(); document.getElementById('notshortlist_form').submit();">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; margin:5px; display:block; background-color:#E67E7E; border-color:#E67E7E;color:black;" id="i-notshortlist" name="notshortlist">Dont Shortlist</button></a>
                    {{--<label style="display:inline-block; float:right; width:100px;">&nbsp;&emsp;&emsp;&emsp;&emsp;</label> --}}
                    <form id="notshortlist_form" action="{{ route('notshortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" method="POST">
                        @csrf
                    </form>
                @endif
            @else
                @if($appstat == 4)
                @if(Auth::guard('recruiter')->check() || Auth::guard('admin')->check())
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:block;margin:5px; background-color:#7DCEA0; border-color:#7DCEA0; color:white; cursor:not-allowed;" id="i-shortlisted" name="shortlisted" readonly>Shortlisted</button>
                    {{-- Testing this --}}
                    <a href="#" data-toggle="modal" data-target="#addschedule">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block; margin:5px;" id="i-schedule" name="schedule">Schedule Interview</button></a>
                    
                    {{--
                    <a href="{{ route('schinterview', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" onclick="event.preventDefault(); document.getElementById('schedule_form').submit();">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block; margin:5px;" id="i-schedule" name="schedule">Schedule Interview</button></a>
                    <form id="schedule_form" action="{{ route('schinterview', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" method="POST">
                        @csrf
                    </form>
                    --}}
                @endif
                @elseif($appstat == 5)
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; margin:5px; display:block; background-color:#D98880; border-color:#D98880;color:black; cursor:not-allowed;" id="i-notshortlisted" name="notshortlisted">Not Shortlisted</button>
                    
                    <a href="{{ route('shortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" onclick="event.preventDefault(); document.getElementById('shortlist_form').submit();">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:block;margin:5px; background-color:#A9DFBF; border-color:#A9DFBF; color:black;" id="i-shortlist" name="shortlist">Please shortlist</button></a>
                    {{--<label style="display:inline-block; float:right; width:100px;">&nbsp;&emsp;&emsp;&emsp;&emsp;</label> --}}
                    <form id="shortlist_form" action="{{ route('shortlist', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" method="POST">
                        @csrf
                    </form>
                @endif  
            @endif
        </div>
    </div>
</div>

<div class="emply-resume-list row mb-1" id="headline1" style="display:inline-block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Experience Summary:</h5></label>
            <textarea id="ta1" name="headline" style="height:120px; width:100%; resize:none; border:0px; cursor:not-allowed;" readonly></textarea>
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
<!--/Add Schedule for interview Modal-->
<div class="modal fade" id="addschedule" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Schedule for Interview</h5>
                    <form role="form" action="{{ route('schinterview', ['userid'=>$user_id, 'jobid'=>$jobid]) }}" method="post">
                        @csrf
                        <div class="form-group" style="display:block;">
                            <label class="mb-2" style="color:blue;">{{$jtitle}}</label>
                            <label style="display:block; width:100%; font-size:15px;">&emsp;&emsp;{{substr($job->jd,0,105)}}...</label>
                        </div>
                        <div class="form-group" style="display:block;">
                            <label style="display:block-inline;">Experience: </label>
                            <label class="mb-2">{{$minexp}} - {{$maxexp}} Yrs</label>
                            <label style="display:block-inline;">&emsp;&emsp;Posted: </label>
                            <label style="display:block-inline;">&emsp;{{$days_text}}...</label>
                            <label class="mb-2" style="display:block-inline;">Hiring For:</label>
                            <label style="display:block-inline;">&emsp;{{$comhirefor}}</label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="party" class="mb-2"><u>Schedule Interview:</u></label>
                            <div class="nativeDateTimePicker">
                                <label for="party" class="mb-2" style="width:90px"> Start Time:</label>
                                <input type="datetime-local" id="party" name="starttime">
                                <span class="validity"></span>
                            </div>
                            <p class="fallbackLabel">Start Time:</p>
                            <div class="fallbackDateTimePicker">
                                <div>
                                <span>
                                    <label for="day">Day:</label>
                                    <select id="day" name="day">
                                    </select>
                                </span>
                                <span>
                                    <label for="month">Month:</label>
                                    <select id="month" name="month">
                                        <option selected>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </span>
                                <span>
                                    <label for="year">Year:</label>
                                    <select id="year" name="year" disabled>
                                    </select>
                                </span>
                                </div>
                                <div>
                                <span>
                                    <label for="hour">Hour:</label>
                                    <select id="hour" name="hour">
                                    </select>
                                </span>
                                <span>
                                    <label for="minute">Minute:</label>
                                    <select id="minute" name="minute">
                                    </select>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display:block;">
                            <label style="display:block-inline; width:90px;">Duration: </label>
                                <select id="i-duration" name="duration" style="width:230px; height:32px;">
                                    <option value="1">1 Hour</option>
                                    <option value="2">2 Hours</option>
                                    <option value="3">3 Hours</option>
                                    <option value="4">4 Hours</option>
                                    <option value="5">5 Hours</option>
                                </select>
                        </div>
                        <div class="form-group" style="display:block;">
                            <label style="display:block-inline; width:90px;">Interview Type: </label>
                                <select id="i-intertype" name="intertype" style="width:230px; height:32px;" readonly>
                                    <option value="1" selected>Face to Face</option>
                                    <option value="2">Telephonic</option>
                                    <option value="3">Skype</option>
                                    <option value="4">Other</option>
                                </select>
                        </div>
                        <div class="form-group" style="display:block;">
                            <label style="display:block-inline; width:90px;">Interview Round: </label>
                                <select id="i-round" name="round" style="width:230px; height:32px;">
                                    <option value="1">Initial</option>
                                    <option value="2" selected>Technical</option>
                                    <option value="3">Manager</option>
                                    <option value="4">HR</option>
                                    <option value="5">Other</option>
                                </select>
                        </div>
                        {{-- <div class="form-group">
                            <div class="nativeDateTimePicker1">
                                <label for="party1" class="mb-2" style="width:90px;">End Time:</label>
                                <input type="datetime-local" id="party1" name="endtime">
                                <span class="validity"></span>
                            </div>
                            <p class="fallbackLabel1" style="display:none;">End Time:</p>
                            <div class="fallbackDateTimePicker1" style="display:none;">
                                <div>
                                <span>
                                    <label for="day1">Day:</label>
                                    <select id="day1" name="day1">
                                    </select>
                                </span>
                                <span>
                                    <label for="month1">Month:</label>
                                    <select id="month1" name="month1">
                                        <option selected>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </span>
                                <span>
                                    <label for="year1">Year:</label>
                                    <select id="year1" name="year1" disabled>
                                    </select>
                                </span>
                                </div>
                                <div>
                                <span>
                                    <label for="hour1">Hour:</label>
                                    <select id="hour1" name="hour1">
                                    </select>
                                </span>
                                <span>
                                    <label for="minute1">Minute:</label>
                                    <select id="minute1" name="minute1">
                                    </select>
                                </span>
                                </div>
                            </div>
                        </div>         --}}
                        <div class="form-group" style="float:left;">
                            <label style="width:90px; display:block-inline">Message</label>
                            <input type="text" id="i-message" name="schedule_msg" style="width:230px;">
                        </div>

                        <div class="form-group" style="float:right;">
                            <button type="reset" class="btn btn-default" style="width:100px; height:30px; line-height: 15px; text-align:center;">RESET</button>
                            <button type="submit" class="btn btn-primary"  style="width:100px; height:30px; line-height: 15px; text-align:center;">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script language="javascript" type="text/javascript"> --}}
<script>
    // define variables
    //alert('In the script');
    var nativePicker = document.querySelector('.nativeDateTimePicker');
    var fallbackPicker = document.querySelector('.fallbackDateTimePicker');
    var fallbackLabel = document.querySelector('.fallbackLabel');

    var nativePicker1 = document.querySelector('.nativeDateTimePicker1');
    var fallbackPicker1 = document.querySelector('.fallbackDateTimePicker1');
    var fallbackLabel1 = document.querySelector('.fallbackLabel1');

    var yearSelect = document.querySelector('#year');
    var monthSelect = document.querySelector('#month');
    var daySelect = document.querySelector('#day');
    var hourSelect = document.querySelector('#hour');
    var minuteSelect = document.querySelector('#minute');

    var yearSelect1 = document.querySelector('#year1');
    var monthSelect1 = document.querySelector('#month1');
    var daySelect1 = document.querySelector('#day1');
    var hourSelect1 = document.querySelector('#hour1');
    var minuteSelect1 = document.querySelector('#minute1');

    // hide fallback initially
    fallbackPicker.style.display = 'none';
    fallbackLabel.style.display = 'none';

    fallbackPicker1.style.display = 'none';
    fallbackLabel1.style.display = 'none';

    // test whether a new datetime-local input falls back to a text input or not
    var test = document.createElement('input');
    test.type = 'datetime-local';
    // if it does, run the code inside the if() {} block
    if(test.type === 'text') {
        // hide the native picker and show the fallback
        nativePicker.style.display = 'none';
        fallbackPicker.style.display = 'block';
        fallbackLabel.style.display = 'block';
        
        nativePicker1.style.display = 'none';
        fallbackPicker1.style.display = 'block';
        fallbackLabel1.style.display = 'block';
        
        //alert('test type is text');
        // populate the days and years dynamically
        // (the months are always the same, therefore hardcoded)
        populateDays(monthSelect.value);
        populateYears();
        populateHours();
        populateMinutes();
        
        populateDays1(monthSelect1.value);
        populateYears1();
        populateHours1();
        populateMinutes1();
    }
    else {
        //alert('test type is datetime-local');
    }

    function populateDays(month) {
        // delete the current set of <option> elements out of the
        // day <select>, ready for the next set to be injected
        while(daySelect.firstChild){
            daySelect.removeChild(daySelect.firstChild);
        }

        // Create variable to hold new number of days to inject
        var dayNum;

        // 31 or 30 days?
        if(month === 'January' | month === 'March' | month === 'May' | month === 'July' | month === 'August' | month === 'October' | month === 'December') {
            dayNum = 31;
        } else if(month === 'April' | month === 'June' | month === 'September' | month === 'November') {
            dayNum = 30;
        } else {
        // If month is February, calculate whether it is a leap year or not
            var year = yearSelect.value;
            var isLeap = new Date(year, 1, 29).getMonth() == 1;
            isLeap ? dayNum = 29 : dayNum = 28;
        }

        // inject the right number of new <option> elements into the day <select>
        for(i = 1; i <= dayNum; i++) {
            var option = document.createElement('option');
            option.textContent = i;
            daySelect.appendChild(option);
        }

        // if previous day has already been set, set daySelect's value
        // to that day, to avoid the day jumping back to 1 when you
        // change the year
        if(previousDay) {
            daySelect.value = previousDay;

            // If the previous day was set to a high number, say 31, and then
            // you chose a month with less total days in it (e.g. February),
            // this part of the code ensures that the highest day available
            // is selected, rather than showing a blank daySelect
            if(daySelect.value === "") {
            daySelect.value = previousDay - 1;
            }

            if(daySelect.value === "") {
            daySelect.value = previousDay - 2;
            }

            if(daySelect.value === "") {
            daySelect.value = previousDay - 3;
            }
        }
    }

    function populateDays1(month1) {
        // delete the current set of <option> elements out of the
        // day <select>, ready for the next set to be injected
        while(daySelect1.firstChild){
            daySelect1.removeChild(daySelect1.firstChild);
        }

        // Create variable to hold new number of days to inject
        var dayNum1;

        // 31 or 30 days?
        if(month1 === 'January' | month1 === 'March' | month1 === 'May' | month1 === 'July' | month1 === 'August' | month1 === 'October' | month1 === 'December') {
            dayNum1 = 31;
        } else if(month1 === 'April' | month1 === 'June' | month1 === 'September' | month1 === 'November') {
            dayNum1 = 30;
        } else {
        // If month is February, calculate whether it is a leap year or not
            var year1 = yearSelect1.value;
            var isLeap = new Date(year1, 1, 29).getMonth() == 1;
            isLeap ? dayNum1 = 29 : dayNum1 = 28;
        }    

        // inject the right number of new <option> elements into the day <select>
        for(i = 1; i <= dayNum1; i++) {
            var option = document.createElement('option');
            option.textContent = i;
            daySelect1.appendChild(option);
        }

        // if previous day has already been set, set daySelect's value
        // to that day, to avoid the day jumping back to 1 when you
        // change the year
        if(previousDay1) {
            daySelect1.value = previousDay1;

            // If the previous day was set to a high number, say 31, and then
            // you chose a month with less total days in it (e.g. February),
            // this part of the code ensures that the highest day available
            // is selected, rather than showing a blank daySelect
            if(daySelect1.value === "") {
                daySelect1.value = previousDay1 - 1;
            }

            if(daySelect1.value === "") {
                daySelect1.value = previousDay1 - 2;
            }

            if(daySelect1.value === "") {
                daySelect1.value = previousDay1 - 3;
            }
        }
    }

    function populateYears() {
        // get this year as a number
        var date = new Date();
        var year = date.getFullYear();

        // Make this year, and the 100 years before it available in the year <select>
        for(var i = 0; i <= 100; i++) {
            var option = document.createElement('option');
            option.textContent = year-i;
            yearSelect.appendChild(option);
        }
    }

    function populateYears1() {
        // get this year as a number
        var date1 = new Date();
        var year1 = date1.getFullYear();

        // Make this year, and the 100 years before it available in the year <select>
        for(var i = 0; i <= 100; i++) {
            var option = document.createElement('option');
            option.textContent = year1-i;
            yearSelect1.appendChild(option);
        }
    }

    function populateHours() {
        // populate the hours <select> with the 24 hours of the day
        for(var i = 0; i <= 23; i++) {
            var option = document.createElement('option');
            option.textContent = (i < 10) ? ("0" + i) : i;
            hourSelect.appendChild(option);
        }
    }

    function populateHours1() {
        // populate the hours <select> with the 24 hours of the day
        for(var i = 0; i <= 23; i++) {
            var option = document.createElement('option');
            option.textContent = (i < 10) ? ("0" + i) : i;
            hourSelect1.appendChild(option);
        }
    }

    function populateMinutes() {
        // populate the minutes <select> with the 60 hours of each minute
        for(var i = 0; i <= 59; i++) {
            var option = document.createElement('option');
            option.textContent = (i < 10) ? ("0" + i) : i;
            minuteSelect.appendChild(option);
        }
    }

    function populateMinutes1() {
        // populate the minutes <select> with the 60 hours of each minute
        for(var i = 0; i <= 59; i++) {
            var option = document.createElement('option');
            option.textContent = (i < 10) ? ("0" + i) : i;
            minuteSelect1.appendChild(option);
        }
    }

    // when the month or year <select> values are changed, rerun populateDays()
    // in case the change affected the number of available days
    yearSelect.onchange = function() {
        populateDays(monthSelect.value);
    }

    // when the month or year <select> values are changed, rerun populateDays()
    // in case the change affected the number of available days
    yearSelect1.onchange = function() {
        populateDays1(monthSelect1.value);
    }

    monthSelect.onchange = function() {
        populateDays(monthSelect.value);
    }

    monthSelect1.onchange = function() {
        populateDays1(monthSelect1.value);
    }

    //preserve day selection
    var previousDay, previousDay1;

    // update what day has been set to previously
    // see end of populateDays() for usage
    daySelect.onchange = function() {
        previousDay = daySelect.value;
    }

    // update what day has been set to previously
    // see end of populateDays() for usage
    daySelect1.onchange = function() {
        previousDay1 = daySelect1.value;
    }
</script>
@endsection