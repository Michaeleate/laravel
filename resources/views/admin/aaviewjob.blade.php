@extends('admin.layouts.ajob')
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
        <a class="nav-link" href="{{ route('admin.home')}}">Home
            <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('cadmprofile') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('cadmprofile') }}">Create Candidate Profile</a>
            <a class="dropdown-item" href="{{ route('vadmprofile') }}">View Candidate Profile</a>
            <a class="dropdown-item" href="{{ route('uadmprofile') }}">Modify Candidate Profile</a>
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
            <a class="dropdown-item" href="{{ route('admin.postjob') }}" title="Post Requirements">Post Jobs</a>
            <a class="dropdown-item" href="{{ route('admin.valljobs') }}" title="View all posted Jobs">View Jobs</a>
            <a class="dropdown-item" href="#" title="Update posted jobs">Update Jobs</a>
            <a class="dropdown-item" href="#" title="Archieve Jobs">Archive Jobs</a>
        </div>
    </li>
 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Applications
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Received</a>
            <a class="dropdown-item" href="#">Processed</a>
            <a class="dropdown-item" href="#">Status</a>
        </div>
    </li>
 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Functions
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.ctoday') }}">Candidates Today</a>
            <a class="dropdown-item" href="{{ route('admin.rtoday') }}">Recruiters Today</a>
            <a class="dropdown-item" href="{{ route('admin.rregister') }}">Register Recruiter</a>
            <a class="dropdown-item" href="{{ route('admin.capplied') }}">Candidates Applied</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
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
<h3 class="tittle text-center mb-xl-4 mb-lg-4 mb-3">
<span>Total Jobs: {{ $recalljobs->total() }} </span></h3>
@if($recalljobs->total()==0)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:100px;">
    <div class="row emply-info">
        <div class="col-md-12" style="float:left;">
            <label style="width:100%; color:blue;">You haven't posted any jobs yet.</label>
        </div>
    </div>
</div>
@else
{{ $recalljobs->links() }}
@foreach($recalljobs as $job)
<a class="nav-link" href="{{ route('viewjobdet', $job->job_id)}}" target="_blank" style="color:black; cursor: pointer;">
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:230px;">
    <div class="row emply-info">
        <div class="col-md-9" style="float:left;">
            <label style="width:100%; color:blue;">{{ $job->jtitle}}</label>
            <label style="width:100%;">{{$job->comhirefor}}</label>
            <div style="display:inline-block;">
                <i class="fas fa-briefcase" style="display:inline;"></i>
                {{-- <label style="width:20px; display:inline;">&emsp;{{$job->minexp}}</label>
                <span style="width:10px; display:inline;"> - </span>
                <label style="width:20px; display:inline;">{{$job->maxexp}} yrs</label> --}}
                @if($job->maxexp==0)
                    <label style="width:50px; display:inline;">Fresher</label>
                @else
                    <label style="width:20px; display:inline;">{{$job->minexp}}</label>
                    <span style="width:10px; display:inline;"> - </span>
                    <label style="width:20px; display:inline;">{{$job->maxexp}} yrs</label>
                @endif
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
        {{--
        <div class="row col-md-12" style="display:block; float:right;">
            <div id="shareRoundIcons" style="float:right;"></div>
        </div>
        --}}
    </div>
</div>
</a>
@endforeach
{{ $recalljobs->links() }}
@endif
@endsection

@section('displayads')
@endsection

<script language="Javascript" type="text/javascript">
/*Function for counting characters for textarea */
function countChars(obj,elid,talen){
    var maxLength = talen;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    var charOver = (strLength - maxLength);
    
    if(charRemain < 0){
        document.getElementById(elid).innerHTML = '<label style="justify:right; width:100%; color: red;">Please remove '+charOver+' characters</label>';
    }else{
        document.getElementById(elid).innerHTML = '<label style="justify:right; width:100%; color: green;">'+charRemain+' character(s) left';
    }
}

//Change the textarea color
function backgrey(obj){
    //alert("mike");
    //document.getElementById("i-jobdesc").style.backgroundcolor = "red";
    $("#i-jobdesc").css( "background", "#f8f9fa" );
}
//Change the textarea color back to normal
function normalcolor(obj){
    //alert("mike");
    //document.getElementById("i-jobdesc").style.backgroundcolor = "red";
    $("#i-jobdesc").css( "background", "white" );
}
</script>