@extends('admin.layouts.aJob')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Carbon;

    //$previousurl = url()->previous();
    $seslink = Session::get('link');
    //if (\Request::is('recruiter/urecprofile') && ($seslink==null)) {
    //    $seslink='init';
    //}

    $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';
    
    $lastjobdet=PostsController::get_lastjobdet();

    foreach($lastjobdet as $key=>$val){
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
            <a class="dropdown-item" href="services.html" title="Update posted jobs">Update Jobs</a>
            <a class="dropdown-item" href="candidates_list.html" title="Archieve Jobs">Archive Jobs</a>
        </div>
    </li>
 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Applications
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="employer_list.html">Received</a>
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
            <a class="dropdown-item" href="#">Buy Credits</a>
            <a class="dropdown-item" href="#">Credits Statement</a>
            <a class="dropdown-item" href="#">Invoice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
    </li>
</ul>
@endsection

{{-- Build Sub Menu for Create Profile for Registered Candidates --}}
@section('CreateProfileMenu')

@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:200px;">
    <div class="row emply-info">
        <div class="col-md-9" style="float:left;">
            <label style="width:100%; color:blue;">{{$jtitle}}</label>
            <label style="width:100%;">{{$comhirefor}}</label>
            <div style="display:inline-block;">
                <i class="fas fa-briefcase" style="display:inline;"></i>
                <label style="width:20px; display:inline;">{{$minexp}}</label>
                <span style="width:10px; display:inline;"> - </span>
                <label style="width:20px; display:inline;">{{$maxexp}} yrs</label>
            </div>
            <div style="display:inline-block;">
                <span style="width:10px; display:inline;">&emsp;&emsp;&emsp;</span>
                <i class="fas fa-map-marker-alt" style="display:inline;"></i>
                <label style="width:160px; display:inline;">{{$hireloc1}}</label>
            </div>
        </div>
        <div class="col-md-3" style="float:right;">
            {{--
            <img src="{{url($fullpath)}}" style="border-radius:80%; width:100%; height:80%">
            --}}
            <img src="{{ URL::asset('/images/favicon-sams.png')}}" style="width:80%; height:30%">
        </div>
        <div class="row col-md-12" style="float:right; line-height:2;">
            <label style="display:inline-block; width:60%; background-color:rgba(99, 57, 116, 0.1); font-size:15px;">&emsp;<i class="fas fa-rupee-sign"></i>&emsp;{{$minsal}} - {{$maxsal}}&nbsp;P.M.&emsp;&emsp;Posted {{$daystext}}</label>
            <label style="display:inline-block; width:40%; background-color:rgba(99, 57, 116, 0.1); float:right; font-size:15px;">Job Views: 99999&emsp;&emsp;Job Applied: 99999</label>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-jdmain" style="display:block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><b><u>Job Description</u></b></label>
            <textarea id="i-jobdesc" name="jobdesc" style="height:280px; width:100%; resize:none; border:0px;" onMouseOver="backgrey(this)" onMouseOut="normalcolor(this);" readonly></textarea>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-omain" style="display:block; width:100%;">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><b><u>Other Information</u></b></label>
            <label style="width:20%; float:left; display:block;">Vacant Positions:</label>
            <label style="width:80%; float:left; display:block-inline;">{{$qty}}</label>
            <label style="width:20%; float:left; display:block;">Hiring for Locations:</label>
            <label style="width:80%; float:left; display:block-inline;">{{$hireloc1}}, {{$hireloc2}}, {{$hireloc3}}</label>
            <label style="width:20%; float:left; display:block;">Keywords:</label>
            <label style="width:80%; float:left; display:block-inline;">{{$keywords}}</label>
            <label style="width:20%; float:left; display:block;">Valid Till:</label>
            <label style="width:80%; float:left; display:block-inline;">{{$valid_till}}</label>
            <label style="width:20%; float:left; display:block;">Job Status:</label>
            <label style="width:80%; float:left; display:block-inline;">{{$jstatus_text}}</label>
        </div>
    </div>
</div>
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