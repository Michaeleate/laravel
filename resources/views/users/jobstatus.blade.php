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
            <a class="dropdown-item" href="{{ url('/buycredits') }}">Buy Credits</a>
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
{{--Filters to be applied on search results --}}
<div class="col_3 permit my-4">
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
<div class="col_3 permit my-4">
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
<div class="col_3 permit my-4">
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
</div>
@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Precisely--}}

{{--@if($jsearchall->total()==0) --}}
@if((isset($jsearchall)))
@if($jsearchall->total()==0)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:100px;">
    <div class="row emply-info">
        <div class="col-md-12" style="float:left;">
            <label style="width:100%; color:blue;">No results. Please apply.</label>
        </div>
    </div>
</div>
@else
{{ $jsearchall->links() }}
@foreach($jsearchall as $job)
<a class="nav-link" href="{{ route('viewjobdet', $job->job_id)}}" target="_blank" style="color:black; cursor: pointer;" alt="Click for complete job details">
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:260px;">
    <div class="row emply-info">
        <div class="col-md-9" style="float:left;">
            <label style="width:100%; color:blue !important;">{{ $job->jtitle}}</label>
            <label style="width:100%;">{{$job->comhirefor}}</label>
            <div style="display:inline-block;">
                <i class="fas fa-briefcase" style="display:inline;"></i>
                <label style="width:20px; display:inline;">&emsp;{{$job->minexp}}</label>
                <span style="width:10px; display:inline;"> - </span>
                <label style="width:20px; display:inline;">{{$job->maxexp}} yrs</label>
            </div>
            <div style="display:inline-block;">
                <span style="width:10px; display:inline;">&emsp;&emsp;&emsp;</span>
                <i class="fas fa-map-marker-alt" style="display:inline;"></i>
                <label style="width:160px; display:inline;">
                {{$job->hireloc1}}
                @if(!($job->hireloc2)=='')
                ,  {{$job->hireloc2}}
                @endif

                @if(!($job->hireloc3)=='')
                ,  {{$job->hireloc3}}
                @endif
                </label>
            </div>
        </div>
        <div class="col-md-3" style="float:right;">
            {{--
            <img src="{{url($fullpath)}}" style="border-radius:80%; width:100%; height:80%">
            --}}
            <img src="{{ URL::asset('/images/favicon-sams.png')}}" style="width:80%; height:30%">
        </div>
        <div class="row col-md-12" style="display:block; float:right;">    
            <label style="display:block; width:100%;"> </label>
            <label style="display:block; width:100%; font-size:15px;">&emsp;<i class="fas fa-key" aria-hidden="true"></i>&emsp;{{$job->keywords}}</label>
            {{--   <label style="display:block; width:100%;"> </label> --}}
        </div>
        <div class="row col-md-12" style="display:block; float:right;">    
            <label style="display:block; width:100%;"> </label>
            <label style="display:block; width:100%; font-size:15px;">&emsp;<i class="far fa-sticky-note"></i>&emsp;{{substr($job->jd,0,105)}}...</label>
        </div>
        <div class="row col-md-12" style="display:block; float:right;">
            <label style="display:inline-block; width:60%;">&emsp;<i class="fas fa-rupee-sign"></i>&emsp;
            @if($job->minsal>0)
                {{$job->minsal}} - {{$job->maxsal}}&nbsp;P.M.&emsp;&emsp;
            @else
                Not Disclosed&emsp;&emsp;
            @endif
            </label>
            <label style="display:inline-block; width:40%; float:right; font-size:15px;">Job Views: 99999&emsp;&emsp;Job Applied: 99999</label>
        </div>
        <div class="row col-md-12" style="display:block; float:left;">
            @if(isset($job->app_status))
            {{-- <span class="appstat applied">Applied</span> --}}
            @if( $job->app_status > 0)
                @switch($job->app_status)
                    @case ("1")
                        <span class="appstat applied">Applied</span>
                        @break
                    @case ("2")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        @break
                    @case ("3")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        @break
                    @case ("4")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        <span class="appstat shortlist">Shortlisted</span>
                        @break
                    @case ("5")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        <span class="appstat notshort">Not shortlisted</span>
                        @break
                    @case ("6")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        <span class="appstat shortlist">Shortlisted</span>
                        <span class="appstat scheduled">Scheduled Interview</span>
                        @break
                    @case ("7")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        <span class="appstat shortlist">Shortlisted</span>
                        <span class="appstat scheduled">Scheduled Interview</span>
                        <span class="appstat interviewed">Interviewed</span>
                        <span class="appstat offer">Interviewed</span>
                        @break
                    @case ("8")
                        <span class="appstat applied">Applied</span>
                        <span class="appstat appsent">Application Sent</span>
                        <span class="appstat appview">Application Viewed</span>
                        <span class="appstat shortlist">Shortlisted</span>
                        <span class="appstat scheduled">Scheduled Interview</span>
                        <span class="appstat interviewed">Interviewed</span>
                        <span class="appstat offer">Offered</span>
                        @break
                    @default
                        Not Applicable
                @endswitch
                @if( $job->app_status == 9)
                     <span class="appstat closed">Closed</span>
                @endif
            @else
                <button class="btn btn-primary" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block; margin:5px;">View Job</button>
            @endif
            @endif
        </div>
    </div>
</div>
</a>
@endforeach
{{ $jsearchall->links() }}
@endif
@endif
@endsection