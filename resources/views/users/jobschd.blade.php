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
    $empname=$expyears1=$expmonths1=$expmonths=$desg=$startdt=$enddt=$msal=$resp=$nperiod=$emptime=$msalt=$msall='';
    $addtype1=$addline11=$addline21=$city1=$state1=$zcode1=$country1=$addtime1='';
    $addtype2=$addline12=$addline22=$city2=$state2=$zcode2=$country2=$addtime2='';
    $refnum1=$fname1=$location1=$email1=$mobnum1=$reftime1='';
    $refnum2=$fname2=$location2=$email2=$mobnum2=$reftime2='';

    /*
    $head=PostsController::get_head();
    foreach($head as $key=>$val){
        $head_line=$val["head_line"];
    }
    */
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
{{--Filters to be applied on search results --}}
{{-- <div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Filters</h3>
    <label style="display:block; width:100%;">Freshness</label>
    <select class="form-control" id="i-fresh" name="fresh" style="line-height:10px; text-align:center; width:140px; height:30px; font-size:small;">
        <option value="0" selected>Last 30 days</option>
        <option value="1">Last 15 days</option>
        <option value="2">Last 7 days</option>
        <option value="3">Last 3 days</option>
        <option value="4">Yesterday</option>
        <option value="5">Today</option>
    </select>
</div>
{{--Locations Filter --}}
{{-- <div class="col_3 permit my-4">
    <label style="display:block; width:100%;">Locations</label>
    <div class="form-group" id="i-locmain">
        <div class="form-check-inline">
            <label class="form-check-label" style="display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-loc1" name="n-hireloc[]" value="30" checked>Vijayawada
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label" style="display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-loc2" name="n-hireloc[]" value="11">Guntur
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label" style="display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-loc3" name="n-hireloc[]" value="24">Rajahmundry
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label" style="display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-loc4" name="n-hireloc[]" value="24">Other
            </label>
        </div>
    </div>
</div>
{{--Salary Filter --}}
{{-- <div class="col_3 permit my-4">
    <label style="display:block; width:100%;">Monthly Salary</label>
    <div class="form-group" id="i-salmain">
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal1" name="n-sal[]" value="0k">&lt; 5000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal2" name="n-sal[]" value="5k">5-10000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal3" name="n-sal[]" value="10k">10-15000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal4" name="n-sal[]" value="15k">15-20000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal5" name="n-sal[]" value="20k">20-25000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal6" name="n-sal[]" value="25k">25-30000
            </label>
        </div>
        <div class="form-check-inline" style="float:left; display:block; width:100%;">
            <label class="form-check-label" style="float:left; display:block; width:100%;">
                <input type="checkbox" class="form-check-input" id="i-sal7" name="n-sal[]" value="30k">&gt; 30000
            </label>
        </div>
    </div>
</div> --}}
@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Precisely--}}

{{--@if($jobschd->total()==0) --}}
@if((isset($jobschd)))
@if($jobschd->total()==0)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:auto !important;"> {{-- 100px --}}
    <div class="row emply-info">
        <div class="col-md-12" style="float:left;">
            <label style="width:100%; color:blue;">Interviews not scheduled yet. Please complete all the fields in your profile, to get shortlisted.</label>
        </div>
    </div>
</div>
@else
{{ $jobschd->links() }}
@foreach($jobschd as $job)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:auto !important"> {{-- 210px --}}
    <div class="row emply-info">
        <div class="row col-md-12" style="display:block-inline;">
            <div class="col-md-6" style="display:block-inline; float:left;">    
                <label style="display:block-inline;float:left; width:120px;">Schedule Start:  </label>
                <label style="display:block-inline; float:left;">&emsp;{{$job->schedule_start}}</label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline;float:left; width:130px;">Schedule End:  </label>
                <label style="display:block-inline; float:left;">&emsp;{{$job->schedule_end}}</label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline;float:left; width:120px;">Scheduled At:  </label>
                <label style="display:block-inline; float:left;">&emsp;{{$job->schedule_at}}</label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline; float:left; width:130px;">Scheduled by:  </label>
                <label style="display:block-inline; float:left;">&emsp;
                @if(!($job->schedule_byuser == null))
                    {{Auth::user()->name}}
                @else
                    @php
                        $recname=PostsController::get_recname($job->schedule_byrec);
                        foreach($recname as $key=>$val){
                            $recruiter=$val["name"];
                        }
                        echo $recruiter;
                    @endphp
                @endif
                </label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline; float:left; width:120px;">Schedule Status:  </label>
                <label style="display:block-inline; float:left;">&emsp;
                @switch($job->schedule_stat)
                    @case (1)
                        Scheduled
                        @break
                    @case (2)
                        Accepted
                        @break
                    @case (3)
                        Rescheduled
                        @break
                    @case (4)
                        Not Accepted
                        @break
                    @default
                        NA
                @endswitch
                </label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline;float:left; width:130px;">Scheduled Message:  </label>
                <label style="display:block-inline; float:left;">&emsp;{{$job->schedule_msg}}</label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline;float:left; width:120px;">Interview Type:  </label>
                <label style="display:block-inline; float:left;">&emsp;
                @switch($job->interview_type)
                    @case (1)
                        Face to Face
                        @break
                    @case (2)
                        Telephonic
                        @break
                    @case (3)
                        Video Call
                        @break
                    @default
                        NA
                @endswitch
                </label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                <label style="display:block-inline; float:left; width:130px;">Interview Round:  </label>
                <label style="display:block-inline; float:left;">&emsp;
                @switch($job->interview_round)
                    @case (1)
                        Initial
                        @break
                    @case (2)
                        Technical
                        @break
                    @case (3)
                        Manager
                        @break
                    @case (4)
                        HR
                        @break
                    @default
                        NA
                @endswitch
                </label>
            </div>
            <div class="col-md-6" style="display:block-inline; float:right;">
                <a href="{{ route('viewjobdet', $job->job_id)}}" target="_blank" style="float:right;">
                    <button class="btn btn-primary" style="width:120px; height:30px; float:right; line-height: 15px; text-align:center;">View Job</button>
                </a>
            </div>
            <div class="col-md-6" style="display:block-inline; float:left;">
                {{-- <a href="{{ route('creschd', $job->sch_id)}}" target="_blank" style="float:left;">
                    <button class="btn btn-primary" style="width:120px; height:30px; float:left; line-height: 15px; text-align:center;">Reschedule</button>
                </a> --}}
                <a href="#" data-toggle="modal" data-target="#addschedule">
                    <button class="btn btn-primary" style="width:150px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block; margin:5px;" id="i-schedule" name="schedule">Reschedule</button></a>
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $jobschd->links() }}
@endif
@endif
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
                    <h5 class="text-left mb-4">Re-schedule for Interview</h5>
                    @if(!isset($jobschd))
                    <form role="form" action="{{ route('creschd', ['userid'=>$job->schedule_byuser, 'sch_id'=>$job->sch_id]) }}" method="post">
                        @csrf
                        {{-- <div class="form-group" style="display:block;">
                            <label class="mb-2" style="color:blue;">{{$jtitle}}</label>
                            <label style="display:block; width:100%; font-size:15px;">&emsp;&emsp;{{substr($job->jd,0,105)}}...</label>
                        </div>
                        <div class="form-group" style="display:block;">
                            <label style="display:block-inline;">Experience: </label>
                            {{-- <label class="mb-2">{{$minexp}} - {{$maxexp}} Yrs</label> --}}
                            {{-- @if($maxexp==0)
                                <label class="mb-2">Fresher</label>
                            @else
                                <label class="mb-2">{{$minexp}} - {{$maxexp}} Yrs</label>
                            @endif
                            <label style="display:block-inline;">&emsp;&emsp;Posted: </label>
                            <label style="display:block-inline;">&emsp;{{$days_text}}...</label>
                            <label class="mb-2" style="display:block-inline;">Hiring For:</label>
                            <label style="display:block-inline;">&emsp;{{$comhirefor}}</label>
                        </div>
                        <hr> --}}
                        <div class="form-group">
                            <label for="party" class="mb-2"><u>Reschedule Interview:</u></label>
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
                        <div class="form-group" style="float:left;">
                            <label style="width:90px; display:block-inline">Message</label>
                            <input type="text" id="i-message" name="schedule_msg" style="width:230px;">
                        </div>

                        <div class="form-group" style="float:right;">
                            <button type="reset" class="btn btn-default" style="width:100px; height:30px; line-height: 15px; text-align:center;">RESET</button>
                            <button type="submit" class="btn btn-primary"  style="width:100px; height:30px; line-height: 15px; text-align:center;">SAVE</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection