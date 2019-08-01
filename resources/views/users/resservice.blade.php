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
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:auto !important;"> {{--520px--}}
    <div class="row emply-info">
        <div class="row col-md-12" style="display:block-inline;">
            <div class="col-md-3" id="i-fresh" onMouseOver="backgrey(this);" onMouseOut="normalcolor(this);" style="display:block-inline; float:left;">
                <label name="fresh" style="height:100px; text-align:center; vertical-align:middle; border-style:solid; border-width:2px; border-color:lightblue; background-color:lightblue;"><br />Fresher<br />(Exp: 0-2 Years)</label>
                <label>
                <b>Showcase your</b>
                    <ul>
                        <li>Education</li>
                        <li>Academic Achievements</li>
                        <li>Projects/Internship</li>
                        <li>Extra-Curricular Activities</li>
                    </ul>
                <label>
            </div>
            <div class="col-md-3" id="i-mid" style="display:block-inline; float:left;" onMouseOver="backgrey1(this);" onMouseOut="normalcolor1(this);">
                <label name="mid" style="height:100px; text-align:center; vertical-align:middle; border-style:solid; border-width:2px; border-color:lightblue; background-color:lightblue;"><br />Mid<br />(Exp: 2-5 Years)</label>
                <label>
                <b>Get focus in the crowd with</b>
                    <ul>
                        <li>Education</li>
                        <li>Professional Skills</li>
                        <li>Key Achievements</li>
                        <li>Areas of exposure</li>
                    </ul>
                <label>
            </div>
            <div class="col-md-3" id="i-senior" style="display:block-inline; float:left;" onMouseOver="backgrey2(this);" onMouseOut="normalcolor2(this);">
                <label name="senior" style="height:100px; text-align:center; vertical-align:middle; border-style:solid; border-width:2px; border-color:lightblue; background-color:lightblue;"><br />Senior<br />(Exp: 5-8 Years)</label>
                <label>
                <b>Target for specific jobs with</b>
                    <ul>
                        <li>Managerial Skills</li>
                        <li>Management Skills</li>
                        <li>Key Achievements</li>
                        <li>Professional Skills</li>
                    </ul>
                <label>
            </div>
            <div class="col-md-3" id="i-exec" style="display:block-inline; float:left;" onMouseOver="backgrey3(this);" onMouseOut="normalcolor3(this);">
                <label name="exec" style="height:100px; text-align:center; vertical-align:middle; border-style:solid; border-width:2px; border-color:lightblue; background-color:lightblue;"><br />Executive<br />(Exp: Over 8 Years)</label>
                <label>
                <b>Highlight your resume with</b>
                    <ul>
                        <li>Leadership qualities</li>
                        <li>Work History</li>
                        <li>Key Competence</li>
                        <li>Accomplishments & Accolades</li>
                    </ul>
                <label>
            </div>
        </div>
        <div class="row col-md-12" style="display:block-inline; width:100%; margin-left: 15px;">
            <label><b>Benefits of buying resume services from SAMS</b><br />
            <ul>
                <li>Impress recruiters with professionally written resume</li>
                <li>Stand out of the crowd as a right candidate</li>
                <li>Highlight skills valued by recruiters</li>
                <li>Include keywords searched by recruiters</li>
                <li>Error free resume</li>
                <li>Free Cover letter included worth Rs. 250/-</li>
                <li>5-8 working days.</li>
            </ul>
            </label>
        </div>
    </div>
</div>
@endsection
@section('displayads')

<div class="col_3 permit my-4" style="box-shadow: 10px 10px 5px grey;">
    <h3 class="j-b mb-3">Buy SAMS Resume Services</h3>
    <form role="form" action="{{ url('/service_resume')}}" method="post">
    @csrf
        <label style="display:block-inline; width:100%;"> Choose Level:</label>
        <select class="form-control" id="i-level" name="level" style="display:block-inline; line-height:20px; text-align:center; width:160px; height:40px;" Onchange="display1(this);">
            <option value="1" selected>Fresher</option>
            <option value="2">Mid</option>
            <option value="3">Senior</option>
            <option value="4">Executive</option>
        </select>
        <label id="i-ctext" style="display:block; height: 120px; background-color:lightblue; font-size:x-large; text-align:center;"> <br />30 Credits</label>
        <label id="i-ctext" style="display:block; height: 120px; background-color:lightgreen; font-size:large; text-align:center;"> <br /><b>Free Cover letter included</b></label>
        <button type="submit" class="btn btn-primary"  style="display:block;width:160px; height:120px; float:right; line-height: 15px; text-align:center; background-color:LIGHTCORAL; border-color:LIGHTCORAL; font-size:xx-large; box-shadow: 10px 10px 5px grey;">BUY</button>
    </form>
</div>

@endsection

<script language="Javascript" type="text/javascript">

//Change display text for levels
function display1(obj){
    //alert('inside display1');
    //alert($("#i-level").val());
    switch($("#i-level").val()){
        case "1": 
            document.getElementById('i-ctext').innerHTML = '<br />30 Credits';
            $("#i-ctext").val().change();
            break;
        case "2": 
            document.getElementById('i-ctext').innerHTML = '<br />45 Credits';
            $("#i-ctext").val().change();
            break;
        case "3": 
            document.getElementById('i-ctext').innerHTML = '<br />60 Credits';
            $("#i-ctext").val().change();
            break;
        case "4": 
            document.getElementById('i-ctext').innerHTML = '<br />80 Credits';
            $("#i-ctext").val().change();
            break;
    }
}

//Change the label color
function backgrey(obj){
    $("#i-fresh").css( "background", "lightblue" );
}
//Change the label color back to normal
function normalcolor(obj){
    $("#i-fresh").css( "background", "white" );
}
//Change the label color
function backgrey1(obj){
    $("#i-mid").css( "background", "lightblue" );
}
//Change the label color back to normal
function normalcolor1(obj){
    $("#i-mid").css( "background", "white" );
}
//Change the label color
function backgrey2(obj){
    $("#i-senior").css( "background", "lightblue" );
}
//Change the label color back to normal
function normalcolor2(obj){
    $("#i-senior").css( "background", "white" );
}
//Change the label color
function backgrey3(obj){
    $("#i-exec").css( "background", "lightblue" );
}
//Change the label color back to normal
function normalcolor3(obj){
    $("#i-exec").css( "background", "white" );
}
</script>