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

@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{ $recalljobs->links() }}
@foreach($recalljobs as $job)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:230px;">
    <div class="row emply-info">
        <div class="col-md-9" style="float:left;">
            <label style="width:100%; color:blue;">{{ $job->jtitle}}</label>
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
            <label style="display:inline-block; width:60%;">&emsp;<i class="fas fa-rupee-sign"></i>&emsp;{{$job->minsal}} - {{$job->maxsal}}&nbsp;P.M.&emsp;&emsp;</label>
            <label style="display:inline-block; width:40%; float:right; font-size:15px;">Job Views: 99999&emsp;&emsp;Job Applied: 99999</label>
        </div>
        {{--
        <div class="row col-md-12" style="display:block; float:right;">
            <div id="shareRoundIcons" style="float:right;"></div>
        </div>
        --}}
    </div>
</div>
@endforeach
{{ $recalljobs->links() }}
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