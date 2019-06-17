@extends('recruiter.layouts.rJob')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Carbon;
    //use Illuminate\Pagination\LengthAwarePaginator;
    //$previousurl = url()->previous();
    //$seslink = Session::get('link');
    //if (\Request::is('recruiter/urecprofile') && ($seslink==null)) {
    //    $seslink='init';
    //}

    
    $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';
    $i=0;
    /*    
    $recalljobs=PostsController::get_recalljobs();

    foreach($recalljobs as $key=>$val){
        $job_id=$val["job_id"];
        $jtitle=$val["jtitle"];
        $jd=$val["jd"];
        $qty=$val["qty"];
        $keywords=$val["keywords"];
        $minexp=$val["minexp"];
        $maxexp=$val["maxexp"];
        $minsal=$val["minsal"];
        $maxsal=$val["maxsal"];
        $hireloc1=$val["hireloc1"];
        $hireloc2=$val["hireloc2"];
        $hireloc3=$val["hireloc3"];
        $comhirefor=$val["comhirefor"];
        $jstatus=$val["jstatus"];
        $valid_till=$val["valid_till"];
        $auto_aprove=$val["auto_aprove"];
        $auto_upd=$val["auto_upd"];
        $created_at=$val["created_at"];
        $updated_at=$val["updated_at"];
    }
    
    if(!(isset($hireloc2))){
        $hireloc2='';
        $hireloc3='';
    }

    //Count days when the job posted
    $daysdiff=$created_at->diffInDays(Carbon::now());
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

    //Job Status text as per value
    switch($jstatus){
        case 0:
            $jstatus_text="Approval Pending";
            break;
        case 1:
            $jstatus_text="Active";
            break;
        case 2:
            $jstatus_text="Rejected";
            break;
        case 3:
            $jstatus_text="Closed";
            break;
        case 4:
            $jstatus_text="Hold";
            break;
        case 5:
            $jstatus_text="Expired";
            break;
        case 6:
            $jstatus_text="Archieved";
            break;
    }
    */
    //$message = "Hireloc1 is" . {{$job->hireloc2}};
    //echo "<script type='text/javascript'>alert('$message');</script>";
?>
{{-- Build Main Menu for Registered Candidates --}}
@section('buildMenu')
<ul class="navbar-nav ml-lg-auto text-center">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('recruiter.home')}}">Home
            <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('crecprofile') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('crecprofile') }}">Create Profile</a>
            <a class="dropdown-item" href="{{ route('vrecprofile') }}">View Profile</a>
            <a class="dropdown-item" href="{{ route('urecprofile') }}">Modify Profile</a>
            {{--
            <a class="dropdown-item" href="{{ url('/edit-user-visible') }}">Profile Visibility</a>
            --}}
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Jobs
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('postjob') }}" title="Post Requirements">Post Jobs</a>
            <a class="dropdown-item" href="{{ route('valljobs') }}" title="View all posted Jobs">View Jobs</a>
            <a class="dropdown-item" href="services.html" title="Update posted jobs">Update Jobs</a>
        </div>
    </li>
 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Applications
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('recgetjapp') }}">Received</a>
            <a class="dropdown-item" href="employer_list.html">Processed</a>
            <a class="dropdown-item" href="employer_list.html">Status</a>
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
@if($recalljapps->total()==0)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:100px;">
    <div class="row emply-info">
        <div class="col-md-12" style="float:left;">
            <label style="width:100%; color:blue;">You haven't applied to any jobs yet.</label>
            <label style="width:100%; color:blue;">View and Search Link</label>
        </div>
    </div>
</div>
@else
{{ $recalljapps->links() }}
@foreach($recalljapps as $job)
{{-----------------------}}
<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:240px !important;">
    <div class="row emply-info">
        <div class="col-md-3">
            <img src="{{url($job->picpath)}}" style="border-radius:80%; width:100px; height:100px;margin-left:10px;">
            <a href="{{ route('viewuserprof', ['userid'=>$job->userid, 'jobid'=>$job->job_id])}}" target="_blank" style="color:black; cursor: pointer;">
                <button class="btn btn-primary" style="width:130px; height:30px; float:left; line-height: 15px; text-align:center; display:inline-block; margin:5px;">Complete Profile</button>
            </a>
            <a href="{{ route('viewjobdet', $job->job_id)}}" target="_blank" style="color:black; cursor: pointer;">
                <button class="btn btn-primary" style="width:130px; height:30px; float:left; line-height: 15px; text-align:center; display:inline-block; margin:5px;">View Job Details</button>
            </a>
        </div>
        <div class="col-md-9" style="float:left; height:200px; font-size:small;border-left-style: solid; border-width: 1px; border-color: rgba(99, 57, 116, 0.1)">
            <label style="width:100%; color:blue; font-size:medium !important"><b>{{$job->name}}</b></label>
            @if(!($job->expyears_text=="Fresher"))
                <label style="width:100%;">working as {{$job->desg}} in {{$job->emp_name}}</label>
            @endif
            <div class="col-md-7" style="float:left;">
                <label style="width:100%;">Exp: {{$job->expyears_text}}</label>
                @if(!($job->expyears_text=="Fresher"))
                    <label style="width:100%;">Sal: Rs. {{$job->msal}} P.A</label>
                    <label style="width:100%;">Current Role: {{$job->desg}}</label>
                    <label style="width:100%;">Current Company: {{$job->emp_name}}.</label>
                @endif
            </div>
            <div class="col-md-5" style="float:right;">
                <label style="width:100%;">Qual: {{$job->qual}}</label>
                <label style="width:100%;">Col:  {{$job->colname}}</label>
                <label style="width:100%;">Year: {{$job->pyear}}</label>
                <label style="width:100%;">Type: {{$job->cortype}}</label>
            </div>
            <label style="width:100%;">Applied for {{$job->jtitle}} in {{$job->comhirefor}}</label>
            {{-- Enable only for premium recruiters
            <div class="col-md-6" style="float:right;">
                <label style="width:100%;">+91 {{$mob_num}} </label>
                <label style="width:100%;">{{$email}} </label>
            </div> --}}
        </div>
    </div>
</div>
{{-- ------------------- --}}

@endforeach
{{ $recalljapps->links() }}
@endif
@endsection

@section('displayads')
@endsection

<script language="Javascript" type="text/javascript">
/*Function for counting characters for textarea */
</script>