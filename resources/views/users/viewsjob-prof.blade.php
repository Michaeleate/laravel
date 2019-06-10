@extends('users.layouts.job')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Carbon;

    $currenturl = url()->current();
    //$previousurl = url()->previous();
    $seslink = Session::get('link');
    //if (\Request::is('recruiter/urecprofile') && ($seslink==null)) {
    //    $seslink='init';
    //}

    $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd=$daystext=$jstatus_text=$japp_status=$japp_status_text='';
    
    $lastjobdet=PostsController::get_viewsjob($jobid);

    if(!is_null($lastjobdet)){
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
            $jstatus_text=$val["jstatus_text"];
            $japp_status=$val["japp_status"];
            $japp_status_text=$val["japp_status_text"];
            $daystext=$val["days_text"];
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

        //Testing
        //$message = "jappstatus" . $japp_status;
        //echo "<script type='text/javascript'>alert('$message');</script>";
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
            Search Jobs
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="services.html">By Skillset</a>
            <a class="dropdown-item" href="services.html">By Location</a>
            <a class="dropdown-item" href="candidates_list.html" title="">By Role</a>
            <a class="dropdown-item" href="candidates_list.html" title="">By Experience</a>
            <a class="dropdown-item" href="candidates_single.html" title="">By Salary</a>
        </div>
    </li>
    {{--
    <li class="nav-item">
        <a class="nav-link" href="pricing.html">Pricing</a>
    </li>
    --}}
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
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:230px;">
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
        <div class="row col-md-12" style="display:block; float:right;">
            @auth('web')
                @if( $japp_status > 0)
                    <button class="btn" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block; background-color: #4CAF50; cursor: not-allowed;">{{$japp_status_text}}</button>
                @else
                    <a href="{{ route('user-apply-job',$jobid) }}" onclick="event.preventDefault();                             document.getElementById('job-apply-form').submit();">
                    <button class="btn btn-primary" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block;">Apply</button></a>
                    {{--<label style="display:inline-block; float:right; width:100px;">&nbsp;&emsp;&emsp;&emsp;&emsp;</label> --}}
                    <form id="job-apply-form" action="{{ route('user-apply-job',$job_id) }}" method="POST">
                        @csrf
                    </form>
                @endif
            @else
                <a href="{{ route('user-apply-job',$jobid) }}" onclick="event.preventDefault();                             document.getElementById('job-apply-form').submit();">
                <button class="btn btn-primary" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block;">Apply</button></a>
                {{--<label style="display:inline-block; float:right; width:100px;">&nbsp;&emsp;&emsp;&emsp;&emsp;</label> --}}
                <form id="job-apply-form" action="{{ route('user-apply-job',$job_id) }}" method="POST">
                    @csrf
                </form>
            @endauth
        </div>
        <div class="row col-md-12" style="float:right; line-height:2;">
            <label style="display:inline-block; width:60%; background-color:rgba(99, 57, 116, 0.1); font-size:15px;">&emsp;<i class="fas fa-rupee-sign"></i>&emsp;{{$minsal}} - {{$maxsal}}&nbsp;P.M.&emsp;&emsp;Posted {{$daystext}}</label>
            <label style="display:inline-block; width:40%; background-color:rgba(99, 57, 116, 0.1); float:right; font-size:15px;">Job Views: 99999&emsp;&emsp;Job Applied: 99999</label>
        </div>
        <div class="fb-share-button" 
            data-href="{{$currenturl}}" 
            data-layout="button_count"
            data-size="large"
            data-hashtag="#samsjobs,#vijayawadajobs">
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