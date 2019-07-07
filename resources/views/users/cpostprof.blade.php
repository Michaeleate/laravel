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

    $head=PostsController::get_head();
    foreach($head as $key=>$val){
        $head_line=$val["head_line"];
    }

    $resume=PostsController::get_resume();
    foreach($resume as $key=>$val){
        $oldresu=$val["oldresu"];
        $resutime=$val["updated_at"];
    }

    $keyskills=PostsController::get_kskill();
    foreach($keyskills as $key=>$val){
        $kskil1=$val["kskil1"];
        $kskil2=$val["kskil2"];
        $kskil3=$val["kskil3"];
        $kskil4=$val["kskil4"];
        $kskil5=$val["kskil5"];
    }

    $perdetails=PostsController::get_pdet();
    foreach($perdetails as $key=>$val){
        $fname=$val["fname"];
        $email=$val["email"];
        $mob_num=$val["mob_num"];
        $gender=$val["gender"];
        $dob=$val["dob"];
        $marstat=$val["marstat"];
        $eng_lang=$val["eng_lang"];
        $tel_lang=$val["tel_lang"];
        $hin_lang=$val["hin_lang"];
        $oth_lang=$val["oth_lang"];
        $diff_able=$val["diff_able"];
        $able1=$val["able1"];
        $able2=$val["able2"];
        $able3=$val["able3"];
        $profpic=$val["profpic"];
        $picpath=$val["picpath"];
        $picname=$val["picname"];
    }

    $edu=PostsController::get_edu();
    $i=0;
    foreach($edu as $key=>$val){
        if($i==0){
            $qual1=$val["qual"];
            $board1=$val["board"];
            $colname1=$val["colname"];
            $pyear1=$val["pyear"];
            $edulang1=$val["edulang"];
            $percentage1=$val["percentage"];
            $edutime1=$val["updated_at"];
        }
        else if($i==1){
            $qual2=$val["qual"];
            $board2=$val["board"];
            $colname2=$val["colname"];
            $pyear2=$val["pyear"];
            $edulang2=$val["edulang"];
            $percentage2=$val["percentage"];
            $edutime2=$val["updated_at"];
        }
        else if($i==2){
            $qual3=$val["qual"];
            $course3=$val["course"];
            
            $spec3=$val["spec"];
            $colname3=$val["colname"];
            $district3=$val["district"];
            $cortype3=$val["cortype"];
            $pyear3=$val["pyear"];
            $edulang3=$val["edulang"];
            $percentage3=$val["percentage"];
            $edutime3=$val["updated_at"];
        }
        else if($i==3){
            $qual4=$val["qual"];
            $course4=$val["course"];
            $spec4=$val["spec"];
            $colname4=$val["colname"];
            $district4=$val["district"];
            $cortype4=$val["cortype"];
            $pyear4=$val["pyear"];
            $edulang4=$val["edulang"];
            $percentage4=$val["percentage"];
            $edutime4=$val["updated_at"];
        }
        $i=$i+1;
    }

    $emp=PostsController::get_emp();
    foreach($emp as $key=>$val){
        $empname=$val["emp_name"];
        $expmonths=$val["exp_months"];
        $desg=$val["desg"];
        $startdt=$val["startdt"];
        $enddt=$val["enddt"];
        $msal=$val["msal"];
        $resp=$val["resp"];
        $nperiod=$val["nperiod"];
        $emptime=$val["updated_at"];
    }

    if($expmonths>12){
        $expyears1=(int)floor($expmonths/12);
        $expmonths1=$expmonths % 12;
    }
    else{
        $expyears1=0;
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

    $adds=PostsController::get_add();
    $i=1;
    foreach($adds as $key=>$val){
        if($i==1){
            $addtype1=$val["addtype"];
            $addline11=$val["addline1"];
            $addline21=$val["addline2"];
            $city1=$val["city"];
            $state1=$val["state"];
            $zcode1=$val["zcode"];
            $country1=$val["country"];
            $addtime1=$val["updated_at"];
        }
        else{
            $addtype2=$val["addtype"];
            $addline12=$val["addline1"];
            $addline22=$val["addline2"];
            $city2=$val["city"];
            $state2=$val["state"];
            $zcode2=$val["zcode"];
            $country2=$val["country"];
            $addtime2=$val["updated_at"];
        }
        $i=$i+1;
    }

    $refs=PostsController::get_ref();
    $i=1;
    foreach($refs as $key=>$val){
        if($i==1){
            $refnum1=$val["refnum"];
            $fname1=$val["fname"];
            $location1=$val["location"];
            $email1=$val["email"];
            $mobnum1=$val["mobnum"];
            $reftime1=$val["updated_at"];
        }
        else{
            $refnum2=$val["refnum"];
            $fname2=$val["fname"];
            $location2=$val["location"];
            $email2=$val["email"];
            $mobnum2=$val["mobnum"];
            $reftime2=$val["updated_at"];
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
{{--
<div class="widget_search">
    <h3 class="j-b mb-3">Search</h3>
    <div class="widget-content">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2">I'm looking for a ...</label>

                <select class="form-control jb_1">
                    <option value="0">Job</option>
                    <option value="">Category1</option>
                    <option value="">Category2</option>
                    <option value="">Category3</option>
                    <option value="">Category4</option>
                </select>
            </div>
            <div class="form-group">
                <label class="mb-2">in</label>

                <input type="text" class="form-control jb_2" placeholder="Location" required="">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control jb_2" placeholder="Industry / Role" required="">
            </div>
            <input type="submit" value="Search">
        </form>
    </div>
</div>
--}}

<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Resume Details</h3>
    <ul class="list_2">
        <li>
            <a href="#head1">Resume Headline</a>
        </li>
        <li>
            <a href="#attach1">Attach Resume</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Skills</h3>
    <ul class="list_2">
        <li>
            <a href="#key1">ADD Keyskills</a>
        </li>
        <li>
            <a href="#" class="not-active">ADD IT Skills</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Personal Details</h3>
    <ul class="list_2">
        <li>
            <a href="#" class="not-active">Full Name</a>
        </li>
        <li>
            <a href="#" class="not-active">E-mail ID</a>
        </li>
        <li>
            <a href="#" class="not-active">Mobile Number</a>
        </li>
        <li>
            <a href="#gender-link">Gender</a>
        </li>
        <li>
            <a href="#dob-link">Date of Birth</a>
        </li>
        <li>
            <a href="#marstat-link">Marital Status</a>
        </li>
        <li>
            <a href="#lang-link">Languages Known</a>
        </li>
        <li>
            <a href="#abled-link">Differently Abled</a>
        </li>
        <li>
            <a href="#profpic-link">Upload Photo</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Education Details</h3>
    <ul class="list_2">
        <li>
            <a href="#edu1">ADD Education</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Employment Details</h3>
    <ul class="list_2">
        <li>
            <a href="#" data-toggle="modal" data-target="#addempmodal">ADD Employment</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">Address</h3>
    <ul class="list_2">
        <li>
            <a href="#" data-toggle="modal" data-target="#addcaddmodal">Present Address</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#addpaddmodal">Parmanent Address</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h4 class="j-b mb-3">References</h4>
    <ul class="list_2">
        <li>
            <a href="#addref1">ADD Reference</a>
        </li>
    </ul>
</div>
@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Headline Div--}}
<div class="emply-resume-list row mb-1" id="head1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{url('/resumehead')}}" method="post">
                @csrf
                <h4>Resume Headline <label style="color:lightgreen">{{ session('hl') }}</label></h4>
                <label>Resume Headline is the first point of contact with Recruiters, so make it striking to get noticed.</label>
                <textarea id="ta1" class="form-control" name="headline" style="height:120px; width:100%; resize:none;" onkeyup="countChars(this,'lab1',250);"></textarea>
                <label id="lab1" style="float:left">250 Character(s) Left</label>
                <button type="submit" class="btn btn-primary"  style="float:right;">Save</button>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

{{-- Attach Resume Div--}}
<div class="emply-resume-list row mb-3" id="attach1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <h4>Attach Resume <label style="color:lightgreen">{{ session('ares') }}</label></h4>
            <span>Resume shows your capabilities and skills, so keep upto date.</span>
            <form role="form" action="{{url('/uploadresume')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="file" name="resume" id="resume">
                @if (!($oldresu == ''))
                    <label id="resname1" style="visibility:visible; float:left;">{{$oldresu}}- Uploaded on {{$resutime}}</label>
                @endif
                @if (Request::is('user-profile')) 
                    <button type="submit" class="btn btn-primary" style="float:right;">Upload</button>
                @endif
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

{{--
@if (\Route::current()->getName() == 'createprofile')
    @if (session('rt') == 'attachresume') --}}
        <div class="emply-resume-list row mb-3" id="key1" style="display:inline-block; width:100%">
            <div class="col-md-12 emply-info">
                <div class="emply-resume-info-sams">
                    <h4>Update Keyskills <label style="color:lightgreen">{{ session('uk') }}</label></h4>
                    <span>Based on this, your profile will appear in Recruiters search list.</span>
                    <form role="form" action="{{url('/updatekskills')}}" method="post">
                        @csrf
                        <select multiple class="form-control" id="keyskill" name="keyskill[]" style="width:30%;">
                            <option value="1">Marketing</option>
                            <option value="2">Data Entry Operator</option>
                            <option value="3">Telecaller</option>
                            <option value="4">Computer Operator</option>
                            <option value="5">Front Office Executive</option>
                            <option value="6">Sales</option>
                            <option value="7">Admin</option>
                            <option value="8">Driver</option>
                            <option value="9">Accountant</option>
                            <option value="10">Security</option>
                            <option value="11">Delivery Boy</option>
                            <option value="12">Housekeeping</option>
                            <option value="13">Maid</option>
                            <option value="14">Cook</option>
                            <option value="15">Receptionist</option>
                            <option value="16">Teacher</option>
                            <option value="17">Office Boy</option>
                            <option value="18">Civil Engineer</option>
                            <option value="19">Mechanical Engineer</option>
                            <option value="20">Information Technology</option>
                        </select>
                        <label for="keyskill" style="font-size:small;">Mutiple select list (hold shift/ Ctrl to select upto three):</label>
                        @if (Request::is('user-profile')) 
                            <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
                        @endif
                        <div class="clearfix"> </div>
                    </form>
                </div>
            </div>
        </div>
{{--    @endif
@endif

@if (\Route::current()->getName() == 'createprofile')
    @if (session('rt') == 'updatekey') --}}
        <div class="emply-resume-list row mb-3" id="person1" style="display:inline-block; width:100%">
            <div class="col-md-12 emply-info">
                <div class="emply-resume-info-sams">
                    <h4>Update Personal Details  <label style="color:lightgreen">{{ session('up') }}</label> <label style="color:red"> {{ session('stat') }}</label></h4>
                    <span>Basic details.</span>
                    <form role="form" action="{{url('/updatepdet')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder={{ Auth::user()->name }} readonly>
                        <input type="text" class="form-control" id="email" name="email" placeholder={{ Auth::user()->email }} readonly>
                        <input type="text" class="form-control" id="mobnum" name="mobnum" placeholder={{ Auth::user()->mob_num }} readonly>
                        <div class="form-group" id="gender-link">
                            <label style="float:left">Gender:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="M" checked>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="F">Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="dob-link">
                            <label style="float:left;">Date Of Birth:</label>
                            <input style="width:25%; height:25px; " type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="form-group" id="marstat-link">
                            <label style="float:left">Marital Status:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="single" name="marstat" value="S" checked>Single
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="married" name="marstat" value="M">Married
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="lang-link">
                            <label style="float:left">Languages Known:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="english" name="lang[]" value="english" checked>English
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="telugu" name="lang[]" value="telugu">Telugu
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="hindi" name="lang[]" value="hindi">Hindi
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="other" name="lang[]" value="other">other
                                </label>
                            </div>                    
                        </div>
                        <div class="form-group" id="abled-link">
                            <label style="float:left">Differently Abled:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="yes" name="abled" value="yes" onclick="abledOptions(this);">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="no" name="abled" value="no" onclick="abledNone(this);" checked>No
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="able1" style="width:40%; display:none;">
                            <select multiple class="form-control" id="able22" name="diffable[]">
                                <option value="1">Vision Impairment</option>
                                <option value="2">Physical Disability</option>
                                <option value="3">Deaf or hard of hearing</option>
                                <option value="4">Mental Health Conditions</option>
                                <option value="5">Intellectual Disability</option>
                                <option value="6">Acquired brain injury</option>
                                <option value="7">Autism spectrum disorder</option>
                            </select>
                            <label  for="diffable" style="font-size:small;">Mutiple select list (hold shift/ Ctrl to select upto three):</label>
                        </div>
                        <div class="form-group" id="profpic-link">
                            <label style="float:left; width:30%;">Profile Picture:</label>
                            <input class="form-control" type="file" id="fprofpic" name="fprofpic">
                        </div>
                        @if ($picpath !== null)
                            <label id="seepic1" style="visibility:visible; float:left;" > {{$picload}} {{$picname}}</label>
                        @endif
                        @if (Request::is('user-profile')) 
                            <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
                        @endif
                        <div class="clearfix"> </div>
                    </form>
                </div>
            </div>
        </div>
{{--    @endif
@endif

@if (\Route::current()->getName() == 'createprofile')
    @if (session('rt') == 'uppdet') --}}
        <div class="emply-resume-list row mb-3" id="edu1" style="display:inline-block; width:100%">
            <div class="col-md-12 emply-info">
                <div class="emply-resume-info-sams">
                    <h4>Add Education Details</h4>
                    {{--<form role="form" action="{{url('/updateedu')}}" method="post">
                        @csrf --}}
                        <div class="form-control">
                            <a href="#" data-toggle="modal" data-target="#add10modal">Add 10th<label style="color:lightgreen">{{ session('aed10') }}</label></a>
                        </div>
                        <div class="form-control">
                            <a href="#" data-toggle="modal" data-target="#add12modal">Add 12th<label style="color:lightgreen">{{ session('aed12') }}</label></a>
                        </div>
                        <div class="form-control">
                            <a href="#" data-toggle="modal" data-target="#addgradmodal">Add Degree/Graduation <label style="color:lightgreen">{{ session('aedgrad') }}</label></a>
                        </div>
                        <div class="form-control">
                            <a href="#" data-toggle="modal" data-target="#addpgmodal">Add Masters/Post-Graduation <label style="color:lightgreen">{{ session('aedpg') }}</label></a>
                        </div>
                        <div class="form-control" style="display:none;">
                            <a href="#" data-toggle="modal" data-target="#addphdmodal">Add Doctorate/PhD</a>
                        </div>

                        {{--          
                        <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#addempmodal">Next</button>
                        <div class="clearfix"> </div>
                        --}}
                    {{--</form>--}}
                </div>
            </div>
        </div>
{{--    @endif
@endif
--}}
<div class="emply-resume-list row mb-3" id="edu1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <h4>Add Employment Details</h4>
            {{-- <form role="form" action="{{url('/updateemp')}}" method="post">
                @csrf
                --}}
                <div class="form-control">
                    <a href="#" data-toggle="modal" data-target="#addempmodal">Add Employment (Last Organization) <label style="color:lightgreen">{{ session('aem') }}</label></a>
                </div>
                {{--
                <button type="submit" class="btn btn-primary" style="float:right;">Next</button>
                <div class="clearfix"> </div>
            </form>
            --}}
        </div>
    </div>
</div>

<div class="emply-resume-list row mb-3" id="adds1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <h4>Add Address Details</h4>
            <div class="form-control" style="outline:none;">
                <a href="#" data-toggle="modal" data-target="#addcaddmodal">Add Current Address <label style="color:lightgreen">{{ session('aca') }}</label></a>
            </div>
            <div class="form-control">
                <a href="#" data-toggle="modal" data-target="#addpaddmodal">Add Permanent Address <label style="color:lightgreen">{{ session('apa') }}</label></a>
            </div>
        </div>
    </div>
</div>

<div class="emply-resume-list row mb-3" id="addref1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <h4>Add Reference:</h4>
            <div class="form-control" style="outline:none;">
                <a href="#" data-toggle="modal" data-target="#addref1modal">Add Reference 1 <label style="color:lightgreen">{{ session('ar1') }}</label></a>
            </div>
            <div class="form-control">
                <a href="#" data-toggle="modal" data-target="#addref2modal">Add Reference 2 <label style="color:lightgreen">{{ session('ar2') }}</label></a>
            </div>
        </div>
    </div>
</div>
<!--model-forms-->
<!--/Add 10th Education-->
<div class="modal fade" id="add10modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add 10th Details</h5>
                    <form role="form" action="{{url('/updatexth')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2">Education</label>
                            <input type="text" class="form-control" id="qual1" placeholder="10th" name="qual1" value="ssc" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">School Name:</label>
                            <input type="text" class="form-control" id="college1" placeholder="School Name" name="college1">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Board</label>
                            <select class="form-control" id="board1" name="board1" placeholder="select board">
                                <optgroup label="---ALL India---">
                                    <option value="1_1">CBSE</option>
                                    <option value="1_2">CISCE(ICSE/ISC)</option>
                                    <option value="1_3">Diploma</option>
                                    <option value="1_4">National Open School</option>
                                    <option value="1_5">IB(International Baccalaureate)</option>
                                </optgroup>
                                <optgroup label="---State Boards---">
                                    <option value="2_1">Andhra Pradesh</option>
                                    <option value="2_2">Assam</option>
                                    <option value="2_3">Bihar</option>
                                    <option value="2_4">Goa</option>
                                    <option value="2_5">Gujarat</option>
                                    <option value="2_6">Haryana</option>
                                    <option value="2_7">Himachal Pradesh</option>
                                    <option value="2_8">J & K</option>
                                    <option value="2_9">Karnataka</option>
                                    <option value="2_10">Kerala</option>
                                    <option value="2_11">Maharashtra</option>
                                    <option value="2_12">Madhya Pradesh</option>
                                    <option value="2_13">Manipur</option>
                                    <option value="2_14">Mizoram</option>
                                    <option value="2_15">Nagaland</option>
                                    <option value="2_16">Orissa</option>
                                    <option value="2_17">Punjab</option>
                                    <option value="2_18">Rajasthan</option>
                                    <option value="2_19">Tamil Nadu</option>
                                    <option value="2_20">Telangana</option>
                                    <option value="2_21">Tripura</option>
                                    <option value="2_22">Uttar Pradesh</option>
                                    <option value="2_23">West Bengal</option>
                                    <option value="2_24">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Passed out Year</label>
                            <select class="form-control" id="passyear1" name="passyear1" placeholder="Passed Out Year">
                                <option value="">- Year -</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Medium of Education</label>
                            <select class="form-control" id="medium1" name="medium1" placeholder="Select Medium">
                                <option value="tel">Telugu</option>
                                <option value="eng">English</option>
                                <option value="tam">Tamil</option>
                                <option value="urd">Urdu</option>
                                <option value="hin">Hindi</option>
                                <option value="mal">Malayalam</option>
                                <option value="kan">Kannada</option>
                                <option value="oth">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Marks Percentage</label>
                            <select class="form-control" id="marks1" name="marks1" placeholder="Percentage of Marks">
                                <option value="1">&lt; 40%</option>
                                <option value="2">40-44.9%</option>
                                <option value="3">45-49.9%</option>
                                <option value="4">50-54.9%</option>
                                <option value="5">55-59.9%</option>
                                <option value="6">60-64.9%</option>
                                <option value="7">65-69.9%</option>
                                <option value="8">70-74.9%</option>
                                <option value="9">75-79.9%</option>
                                <option value="10">80-84.9%</option>
                                <option value="11">85-89.9%</option>
                                <option value="12">90-94.9%</option>
                                <option value="13">95-99.9%</option>
                                <option value="14">100%</option>
                            </select>
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
<!--/Add 12th Education-->
<div class="modal fade" id="add12modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add 12th Details</h5>
                    <form role="form" action="{{url('/updatexiith')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2">Education</label>
                            <input type="text" class="form-control" id="course2" name="qual2" placeholder="12th" value="inter" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">College Name:</label>
                            <input type="text" class="form-control" id="college2" placeholder="College Name" name="college2">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Board</label>
                            <select class="form-control" id="board2" name="board2" placeholder="select board">
                                <optgroup label="---ALL India---">
                                    <option value="1_1">CBSE</option>
                                    <option value="1_2">CISCE(ICSE/ISC)</option>
                                    <option value="1_3">Diploma</option>
                                    <option value="1_4">National Open School</option>
                                    <option value="1_5">IB(International Baccalaureate)</option>
                                </optgroup>
                                <optgroup label="---State Boards---">
                                    <option value="2_1">Andhra Pradesh</option>
                                    <option value="2_2">Assam</option>
                                    <option value="2_3">Bihar</option>
                                    <option value="2_4">Goa</option>
                                    <option value="2_5">Gujarat</option>
                                    <option value="2_6">Haryana</option>
                                    <option value="2_7">Himachal Pradesh</option>
                                    <option value="2_8">J & K</option>
                                    <option value="2_9">Karnataka</option>
                                    <option value="2_10">Kerala</option>
                                    <option value="2_11">Maharashtra</option>
                                    <option value="2_12">Madhya Pradesh</option>
                                    <option value="2_13">Manipur</option>
                                    <option value="2_14">Mizoram</option>
                                    <option value="2_15">Nagaland</option>
                                    <option value="2_16">Orissa</option>
                                    <option value="2_17">Punjab</option>
                                    <option value="2_18">Rajasthan</option>
                                    <option value="2_19">Tamil Nadu</option>
                                    <option value="2_20">Telangana</option>
                                    <option value="2_21">Tripura</option>
                                    <option value="2_22">Uttar Pradesh</option>
                                    <option value="2_23">West Bengal</option>
                                    <option value="2_24">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Passed out Year</label>
                            <select class="form-control" id="passyear2" name="passyear2" placeholder="Passed Out Year">
                                <option value="">- Year -</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Medium of Education</label>
                            <select class="form-control" id="medium2" name="medium2" placeholder="Select Medium">
                                <option value="tel">Telugu</option>
                                <option value="eng">English</option>
                                <option value="tam">Tamil</option>
                                <option value="urd">Urdu</option>
                                <option value="hin">Hindi</option>
                                <option value="mal">Malayalam</option>
                                <option value="kan">Kannada</option>
                                <option value="oth">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Marks Percentage</label>
                            <select class="form-control" id="marks2" name="marks2" placeholder="Percentage of Marks">
                                <option value="1">&lt; 40%</option>
                                <option value="2">40-44.9%</option>
                                <option value="3">45-49.9%</option>
                                <option value="4">50-54.9%</option>
                                <option value="5">55-59.9%</option>
                                <option value="6">60-64.9%</option>
                                <option value="7">65-69.9%</option>
                                <option value="8">70-74.9%</option>
                                <option value="9">75-79.9%</option>
                                <option value="10">80-84.9%</option>
                                <option value="11">85-89.9%</option>
                                <option value="12">90-94.9%</option>
                                <option value="13">95-99.9%</option>
                                <option value="14">100%</option>
                            </select>
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
<!--/Add graduation Education-->
<div class="modal fade" id="addgradmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Graduation/ Diploma Details</h5>
                    <form role="form" action="{{url('/updategrad')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2">Education</label>
                            <input type="text" class="form-control" id="qual3" name="qual3" value="grad" placeholder="Graduation/ Diploma" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Course</label>
                            <select class="form-control" id="course3" name="course3" onchange="showspecs(this);">
                                <optgroup label="---Select Course---">
                                    <option value="0">B.A</option>
                                    <option value="1">B.Arch</option>
                                    <option value="2">B.B.A/B.M.S</option>
                                    <option value="3">B.Com</option>
                                    <option value="4">B.Des.</option>
                                    <option value="5">B.Ed</option>
                                    <option value="6">B.EI.Ed</option>
                                    <option value="7">B.P.Ed</option>
                                    <option value="8">B.Pharma</option>
                                    <option value="9">B.Sc</option>
                                    <option value="10">B.Tech/B.E.</option>
                                    <option value="11">B.U.M.S</option>
                                    <option value="12">BAMS</option>
                                    <option value="13">BCA</option>
                                    <option value="14">BDS</option>
                                    <option value="15">BFA</option>
                                    <option value="16">BHM</option>
                                    <option value="17">BHMS</option>
                                    <option value="18">BVSC</option>
                                    <option value="19">Diploma</option>
                                    <option value="20">LLB</option>
                                    <option value="21">MBBS</option>
                                    <option value="22">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Specialization</label>
                            <select class="form-control" id="BA3" name="0" style="display:block;">
                                <optgroup label="---Select Specialization---">
                                    <option value="1">Arts&Humanities</option>
                                    <option value="2">Communication</option>
                                    <option value="3">Economics</option>
                                    <option value="4">English</option>
                                    <option value="5">Film</option>
                                    <option value="6">Fine Arts</option>
                                    <option value="7">Hindi</option>
                                    <option value="8">History</option>
                                    <option value="9">Hotel Management</option>
                                    <option value="10">Journalism</option>
                                    <option value="11">Maths</option>
                                    <option value="12">Political Science</option>
                                    <option value="13">PR/ Advertising</option>
                                    <option value="14">Psychology</option>
                                    <option value="15">Sanskrit</option>
                                    <option value="16">Sociology</option>
                                    <option value="17">Statistics</option>
                                    <option value="18">Vocational Course</option>
                                    <option value="19">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BArch3" name="1" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="20">Architecture</option>
                                    <option value="21">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BBA3" name="2" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="22">Management</option>
                                    <option value="23">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BCom3" name="3" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="24">Commerce</option>
                                    <option value="25">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BDes3" name="4" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="26">Animation Film Design</option>
                                    <option value="27">Ceramic & Glass Design</option>
                                    <option value="28">Exhibition Design</option>
                                    <option value="29">Film and Video Communication</option>
                                    <option value="30">Furniture Design</option>
                                    <option value="31">Graphic Design</option>
                                    <option value="32">Product Design</option>
                                    <option value="33">Textile Design</option>
                                    <option value="34">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BEd3" name="5" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="35">Education</option>
                                    <option value="36">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BEIEd3" name="6" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="37">Elementary Education</option>
                                    <option value="38">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BPEd3" name="7" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="39">Physical Education</option>
                                    <option value="40">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BPharma3" name="8" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="41">Pharmacy</option>
                                    <option value="42">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BSc3" name="9" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="43">Agriculture</option>
                                    <option value="44">Anthropology</option>
                                    <option value="45">Bio-Chemistry</option>
                                    <option value="46">Biology</option>
                                    <option value="47">Botany</option>
                                    <option value="48">Chemistry</option>
                                    <option value="49">Computers</option>
                                    <option value="50">Dairy Technology</option>
                                    <option value="51">Electronics</option>
                                    <option value="52">Environmental Science</option>
                                    <option value="53">Food Technology</option>
                                    <option value="54">General</option>
                                    <option value="55">Geology</option>
                                    <option value="56">Home Science</option>
                                    <option value="57">Hospitality and Hotel Management</option>
                                    <option value="58">Maths</option>
                                    <option value="59">Microbiology</option>
                                    <option value="60">Nursing</option>
                                    <option value="61">Optometry</option>
                                    <option value="62">Physics</option>
                                    <option value="63">Statistics</option>
                                    <option value="64">Zoology</option>
                                    <option value="65">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BTech3" name="10" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="66">Agriculture</option>
                                    <option value="67">Automobile</option>
                                    <option value="68">Aviation</option>
                                    <option value="69">Bio-Chemistry</option>
                                    <option value="70">Bio-Technology</option>
                                    <option value="71">Biomedical</option>
                                    <option value="72">Ceramics</option>
                                    <option value="73">Chemical</option>
                                    <option value="74">Civil</option>
                                    <option value="75">Computers</option>
                                    <option value="76">Electrical</option>
                                    <option value="77">Electronics/ Telecommunication</option>
                                    <option value="78">Energy</option>
                                    <option value="79">Environmental</option>
                                    <option value="80">Instrumentation</option>
                                    <option value="81">Marine</option>
                                    <option value="82">Mechanical</option>
                                    <option value="83">Metallurgy</option>
                                    <option value="84">Mineral</option>
                                    <option value="85">Mining</option>
                                    <option value="86">Nuclear</option>
                                    <option value="87">Paint/Oil</option>
                                    <option value="88">Petroleum</option>
                                    <option value="89">Plastics</option>
                                    <option value="90">Production/ Industrial</option>
                                    <option value="91">Textile</option>
                                    <option value="92">Other Engineering</option>
                                    <option value="93">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BUMS3" name="11" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="94">Unani Medicine</option>
                                    <option value="95">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BAMS3" name="12" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="96">Ayurveda</option>
                                    <option value="97">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BCA3" name="13" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="98">Computers</option>
                                    <option value="99">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BDS3" name="14" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="100">Dentistry</option>
                                    <option value="101">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BFA3" name="15" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="102">Art history</option>
                                    <option value="103">Painting</option>
                                    <option value="104">Printmaking</option>
                                    <option value="105">Sculpture</option>
                                    <option value="106">Visual Communication</option>
                                    <option value="107">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BHM3" name="16" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="108">Hotel Management</option>
                                    <option value="109">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BHMS3" name="17" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="110">Homeopathy</option>
                                    <option value="111">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="BVSC3" name="18" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="112">Veterinary Science</option>
                                    <option value="113">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="Diploma3" name="19" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="114">Architecture</option>
                                    <option value="115">Chemical</option>
                                    <option value="116">Civil</option>
                                    <option value="117">Computers</option>
                                    <option value="118">Electrical</option>
                                    <option value="119">Electronics/ Telecommunication</option>
                                    <option value="120">Engineering</option>
                                    <option value="121">Export/ Import</option>
                                    <option value="122">Fashion Designing / Other Designing</option>
                                    <option value="123">Graphic/ Web Designing</option>
                                    <option value="124">Hotel Management</option>
                                    <option value="125">Insurance</option>
                                    <option value="126">Management</option>
                                    <option value="127">Mechanical</option>
                                    <option value="128">Tourism</option>
                                    <option value="129">Visual Arts</option>
                                    <option value="130">Vocational Course</option>
                                    <option value="131">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="LLB3" name="20" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="132">Law</option>
                                    <option value="133">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="MBBS3" name="21" style="display:none;">
                                <optgroup label="---Select Specialization---">
                                    <option value="134">Medicine</option>
                                    <option value="135">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">College Name:</label>
                            <input class="form-control" type="text" id="college3" name="college3" style="width:100%;">
                            <label class="mb-2">District:</label>
                            <select class="form-control" id="district3" name="district3" onchange="showother4();">
                                <optgroup label="---Select District---">
                                    <option value="1">ANANTAPUR</option>
                                    <option value="2">CHITTOOR</option>
                                    <option value="3">EAST GODAVARI</option>
                                    <option value="4">GUNTUR</option>
                                    <option value="5">KHAMMAM</option>
                                    <option value="6">KRISHNA</option>
                                    <option value="7">KURNOOL</option>
                                    <option value="8">NELLORE</option>
                                    <option value="9">PRAKASAM</option>
                                    <option value="10">SRIKAKULAM</option>
                                    <option value="11">VISAKHAPATNAM</option>
                                    <option value="12">VISHAKHAPATNAM</option>
                                    <option value="13">VIZIANAGARAM</option>
                                    <option value="14">WEST GODAVARI</option>
                                    <option value="15">YSR DISTRICT</option>
                                    <option value="16">Other</option>
                                </optgroup>
                            </select>
                            <input class="form-control" type="text" id="otherdist3" name="otherdist3" style="width:100%; display:none;" placeholder="Which State?">
                        </div>
                        <div class="form-group">
                            <label style="float:left">Course Type:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" name="coursetype3" id="full" value="full" checked>Full Time
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" name="coursetype3" id="part" value="part">Part Time
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio3">
                                    <input type="radio" class="form-check-input" name="coursetype3" id="dist" value="dist">Corresponding/ Distance Learning
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Passed out Year</label>
                            <select class="form-control" id="passyear3" name="passyear3" placeholder="Passed Out Year">
                                <option value="">- Year -</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Medium of Education</label>
                            <select class="form-control" id="medium3" name="medium3" placeholder="Select Medium">
                                <option value="tel">Telugu</option>
                                <option value="eng">English</option>
                                <option value="tam">Tamil</option>
                                <option value="urd">Urdu</option>
                                <option value="hin">Hindi</option>
                                <option value="mal">Malayalam</option>
                                <option value="kan">Kannada</option>
                                <option value="oth">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Marks Percentage</label>
                            <select class="form-control" id="marks3" name="marks3" placeholder="Percentage of Marks">
                                <option value="1">&lt; 40%</option>
                                <option value="2">40-44.9%</option>
                                <option value="3">45-49.9%</option>
                                <option value="4">50-54.9%</option>
                                <option value="5">55-59.9%</option>
                                <option value="6">60-64.9%</option>
                                <option value="7">65-69.9%</option>
                                <option value="8">70-74.9%</option>
                                <option value="9">75-79.9%</option>
                                <option value="10">80-84.9%</option>
                                <option value="11">85-89.9%</option>
                                <option value="12">90-94.9%</option>
                                <option value="13">95-99.9%</option>
                                <option value="14">100%</option>
                                <option value="15">Yet to pass</option>
                            </select>
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
<!--/Add Masters and Post Graduation Education-->
<div class="modal fade" id="addpgmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Masters/ Post Graduation Details</h5>
                    <form role="form" action="{{url('/updatepg')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2">Education</label>
                            <input type="text" class="form-control" id="qual4" name="qual4" value="pg" placeholder="Masters/ Post Graduation" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Course</label>
                            <select class="form-control" id="course4" name="course4" onchange="showspecs5(this);">
                                <optgroup label="---Select Course---">
                                    <option value="1">CA</option>
                                    <option value="2">CS</option>
                                    <option value="3">DM</option>
                                    <option value="4">ICWA (CMA)</option>
                                    <option value="5">Integrated PG</option>
                                    <option value="6">LLM</option>
                                    <option value="7">M.A</option>
                                    <option value="8">M.Arch</option>
                                    <option value="9">M.Ch</option>
                                    <option value="10">M.Com</option>
                                    <option value="11">M.Des.</option>
                                    <option value="12">M.Ed</option>
                                    <option value="13">M.Pharma</option>
                                    <option value="14">MS/ M.Sc(Science)</option>
                                    <option value="15">M.Tech</option>
                                    <option value="16">MBA/PGDM</option>
                                    <option value="17">MCA</option>
                                    <option value="18">MCM</option>
                                    <option value="19">MDS</option>
                                    <option value="20">MFA</option>
                                    <option value="21">Medical-MS/MD</option>
                                    <option value="22">MVSC</option>
                                    <option value="23">PG Diploma</option>
                                    <option value="24">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Specialization</label>
                            <select class="form-control" id="ca5" style="display:block;" name="1">
                                <optgroup label="---Select Specialization---">
                                    <option value="1">CA</option>
                                    <option value="2">First Attempt</option>
                                    <option value="3">Pursuing</option>
                                    <option value="4">Second Attempt</option>
                                    <option value="5">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="cs5" style="display:none;" name="2">
                                <optgroup label="---Select Specialization---">
                                    <option value="6">CS</option>
                                    <option value="7">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="dm5" style="display:none;" name="3">
                                <optgroup label="---Select Specialization---">
                                    <option value="8">Cardiac -Anaes.</option>
                                    <option value="9">Cardiology</option>
                                    <option value="10">Child & Adolescent Psychiatry</option>
                                    <option value="11">Clinical Haematology</option>
                                    <option value="12">Clinical Immunology</option>
                                    <option value="13">Clinical Pharmacology</option>
                                    <option value="14">Critical Care Medicine</option>
                                    <option value="15">Endocrinology</option>
                                    <option value="16">Gastroenterology</option>
                                    <option value="17">Geriatric Mental Health</option>
                                    <option value="18">Haematology Pathology</option>
                                    <option value="19">Hepatology</option>
                                    <option value="20">Immunology</option>
                                    <option value="21">Infectious Diseases</option>
                                    <option value="22">Medical Genetics</option>
                                    <option value="23">Neonatology</option>
                                    <option value="24">Nephrology</option>
                                    <option value="25">Neuro Anaesthesia</option>
                                    <option value="26">Neuro Radiology</option>
                                    <option value="27">Neurology</option>
                                    <option value="28">Oncology</option>
                                    <option value="29">Organ Transplant Anaesthesia & CC</option>
                                    <option value="30">Pediatric Anaesthesia</option>
                                    <option value="31">Pediatric Cardiology</option>
                                    <option value="32">Pediatric Gastroenterology</option>
                                    <option value="33">Pediatric Hepatology</option>
                                    <option value="34">Pediatric Nephrology</option>
                                    <option value="35">Pediatric Oncology</option>
                                    <option value="36">Pulmonary Med. & CC</option>
                                    <option value="37">Pulmonary Medicine</option>
                                    <option value="38">Reproductive Medicine</option>
                                    <option value="39">Rheumatology</option>
                                    <option value="40">Virology</option>
                                    <option value="41">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="icwa5" style="display:none;" name="4">
                                <optgroup label="---Select Specialization---">
                                    <option value="42">ICWA (CMA)</option>
                                    <option value="43">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="ipg5" style="display:none;" name="5">
                                <optgroup label="---Select Specialization---">
                                    <option value="44">Journalism/ Mass Communication</option>
                                    <option value="45">Management</option>
                                    <option value="46">PR/ Advertising</option>
                                    <option value="47">Tourism</option>
                                    <option value="48">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="llm5" style="display:none;" name="6">
                                <optgroup label="---Select Specialization---">
                                    <option value="49">Law</option>
                                    <option value="50">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="ma5" style="display:none;" name="7">
                                <optgroup label="---Select Specialization---">
                                    <option value="51">Anthropology</option>
                                    <option value="52">Arts&Humanities</option>
                                    <option value="53">Communication</option>
                                    <option value="54">Economics</option>
                                    <option value="55">English</option>
                                    <option value="56">Film</option>
                                    <option value="57">Fine Arts</option>
                                    <option value="58">Hindi</option>
                                    <option value="59">History</option>
                                    <option value="60">Journalism</option>
                                    <option value="61">Maths</option>
                                    <option value="62">Political Science</option>
                                    <option value="63">PR/ Advertising</option>
                                    <option value="64">Psychology</option>
                                    <option value="65">Sanskrit</option>
                                    <option value="66">Sociology</option>
                                    <option value="67">Statistics</option>
                                    <option value="68">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="march5" style="display:none;" name="8">
                                <optgroup label="---Select Specialization---">
                                    <option value="69">Architecture</option>
                                    <option value="70">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mch5" style="display:none;" name="9">
                                <optgroup label="---Select Specialization---">
                                    <option value="71">Burns & Plastic Surgery</option>
                                    <option value="72">Cardio Thoracic and Vascular Surgery</option>
                                    <option value="73">Cardio Thoracic Surgery</option>
                                    <option value="74">Endocrine Surgery</option>
                                    <option value="75">Gynaecological Oncology</option>
                                    <option value="76">Hand & Micro Surgery</option>
                                    <option value="77">Hand Surgery</option>
                                    <option value="78">Hepato Pancreato Biliary Surgery</option>
                                    <option value="79">Neuro Surgery</option>
                                    <option value="80">Oncology</option>
                                    <option value="81">Pediatric Cardio-Thoracic Vascular Surgery</option>
                                    <option value="82">Pediatric Surgery</option>
                                    <option value="83">Plastic & Reconstructive Surgery</option>
                                    <option value="84">Plastic Surgery</option>
                                    <option value="85">Surgical Gastroenterology/ G.I. Surgery</option>
                                    <option value="86">Surgical Oncology</option>
                                    <option value="87">Thoracic Surgery</option>
                                    <option value="88">Urology</option>
                                    <option value="89">Urology/ Genito -Urinary Surgery</option>
                                    <option value="90">Vascular Surgery</option>
                                    <option value="91">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mcom5" style="display:none;" name="10">
                                <optgroup label="---Select Specialization---">
                                    <option value="92">Commerce</option>
                                    <option value="93">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mdes5" style="display:none;" name="11">
                                <optgroup label="---Select Specialization---">
                                    <option value="94">Animation Film Design</option>
                                    <option value="95">Apparel Design</option>
                                    <option value="96">Ceramic & Glass Design</option>
                                    <option value="97">Design for Retail Experience</option>
                                    <option value="98">Digital Game Design</option>
                                    <option value="99">Film and Video Communication</option>
                                    <option value="100">Furniture Design</option>
                                    <option value="101">Graphic Design</option>
                                    <option value="102">Information Design</option>
                                    <option value="103">Interaction Design</option>
                                    <option value="104">Lifestyle Accessory Design</option>
                                    <option value="105">New Media Design</option>
                                    <option value="106">Photography Design</option>
                                    <option value="107">Product Design</option>
                                    <option value="108">Strategic Design Management</option>
                                    <option value="109">Textile Design</option>
                                    <option value="110">Toy & Game Design</option>
                                    <option value="111">Transportation & Automobile Design</option>
                                    <option value="112">Universal Design</option>
                                    <option value="113">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="med5" style="display:none;" name="12">
                                <optgroup label="---Select Specialization---">
                                    <option value="114">Education</option>
                                    <option value="115">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mpharma5" style="display:none;" name="13">
                                <optgroup label="---Select Specialization---">
                                    <option value="116">Pharmacy</option>
                                    <option value="117">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="msc5" style="display:none;" name="14">
                                <optgroup label="---Select Specialization---">
                                    <option value="118">Aerospace & Mechanical Engineering</option>
                                    <option value="119">Agriculture</option>
                                    <option value="120">Anthropology</option>
                                    <option value="121">Astronautical Engineering</option>
                                    <option value="122">Bio-Chemistry</option>
                                    <option value="123">Biology</option>
                                    <option value="124">Biotechnology</option>
                                    <option value="125">Botany</option>
                                    <option value="126">Chemical Engineering & Materials Science</option>
                                    <option value="127">Chemistry</option>
                                    <option value="128">Civil & Environmental Engineering</option>
                                    <option value="129">Computers</option>
                                    <option value="130">Cyber Security Engineering</option>
                                    <option value="131">Dairy Technology</option>
                                    <option value="132">Data Informatics</option>
                                    <option value="133">Electrical Engineering</option>
                                    <option value="134">Electronics</option>
                                    <option value="135">Electronics & Embedded Technology</option>
                                    <option value="136">Environmental Science</option>
                                    <option value="137">Food Technology</option>
                                    <option value="138">Geology</option>
                                    <option value="139">Home Science</option>
                                    <option value="140">Hospitality Administration</option>
                                    <option value="141">Industrial & Systems Engineering</option>
                                    <option value="142">Marine Engineering</option>
                                    <option value="143">Maths</option>
                                    <option value="144">Mechanical Engineering</option>
                                    <option value="145">Mechatronics</option>
                                    <option value="146">Microbiology</option>
                                    <option value="147">Nursing</option>
                                    <option value="148">Optometry</option>
                                    <option value="149">Organic Chemistry</option>
                                    <option value="150">Petroleum Engineering</option>
                                    <option value="151">Physics</option>
                                    <option value="152">Statistics</option>
                                    <option value="153">Systems Architecture and Engineering</option>
                                    <option value="154">Veterinary Science</option>
                                    <option value="155">Zoology</option>
                                    <option value="156">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mtech5" style="display:none;" name="15">
                                <optgroup label="---Select Specialization---">
                                    <option value="157">Agriculture</option>
                                    <option value="158">Automobile</option>
                                    <option value="159">Aviation</option>
                                    <option value="160">Bio-Chemistry</option>
                                    <option value="161">Bio-Technology</option>
                                    <option value="162">Biomedical</option>
                                    <option value="163">Ceramics</option>
                                    <option value="164">Chemical</option>
                                    <option value="165">Civil</option>
                                    <option value="166">Computers</option>
                                    <option value="167">Electrical</option>
                                    <option value="168">Electronics/ Telecommunication</option>
                                    <option value="169">Energy</option>
                                    <option value="170">Environmental</option>
                                    <option value="171">Instrumentation</option>
                                    <option value="172">Marine</option>
                                    <option value="173">Mechanical</option>
                                    <option value="174">Metallurgy</option>
                                    <option value="175">Mineral</option>
                                    <option value="176">Mining</option>
                                    <option value="177">Nuclear</option>
                                    <option value="178">Paint/Oil</option>
                                    <option value="179">Petroleum</option>
                                    <option value="180">Plastics</option>
                                    <option value="181">Production/ Industrial</option>
                                    <option value="182">Textile</option>
                                    <option value="183">Other Engineering</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mba5" style="display:none;" name="16">
                                <optgroup label="---Select Specialization---">
                                    <option value="184">Advertising/ Mass Communication</option>
                                    <option value="185">Finance</option>
                                    <option value="186">Hospitality Management</option>
                                    <option value="187">HR/ Industrial Relations</option>
                                    <option value="188">Information Technology</option>
                                    <option value="189">International Business</option>
                                    <option value="190">Marketing</option>
                                    <option value="191">Operations</option>
                                    <option value="192">Other Management</option>
                                    <option value="193">Systems</option>
                                    <option value="194">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mca5" style="display:none;" name="17">
                                <optgroup label="---Select Specialization---">
                                    <option value="195">Computers</option>
                                    <option value="196">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mcm5" style="display:none;" name="18">
                                <optgroup label="---Select Specialization---">
                                    <option value="197">Computers and Managment</option>
                                    <option value="198">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mds5" style="display:none;" name="19">
                                <optgroup label="---Select Specialization---">
                                    <option value="199">Dentistry</option>
                                    <option value="200">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mfa5" style="display:none;" name="20">
                                <optgroup label="---Select Specialization---">
                                    <option value="201">Printmaking</option>
                                    <option value="202">Sculpture</option>
                                    <option value="203">Visual Communication</option>
                                    <option value="204">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="md5" style="display:none;" name="21">
                                <optgroup label="---Select Specialization---">
                                    <option value="205">Anaesthesiology</option>
                                    <option value="206">Anatomy</option>
                                    <option value="207">Aerospace Medicine</option>
                                    <option value="208">Ayurveda</option>
                                    <option value="209">Bio-Chemistry</option>
                                    <option value="210">Bio-Physics</option>
                                    <option value="211">Blood Banking & Immuno</option>
                                    <option value="212">Cardiology</option>
                                    <option value="213">CCM</option>
                                    <option value="214">Dermatology</option>
                                    <option value="215">Emergency Medicine</option>
                                    <option value="216">ENT</option>
                                    <option value="217">Forensic Medicine</option>
                                    <option value="218">General Practitioner</option>
                                    <option value="219">General Surgery</option>
                                    <option value="220">Health Administration</option>
                                    <option value="221">Hepatology</option>
                                    <option value="222">Hospital Administration</option>
                                    <option value="223">Immunology</option>
                                    <option value="224">Lab Medicine</option>
                                    <option value="225">Maternity & Child Health</option>
                                    <option value="226">Medical Genetics</option>
                                    <option value="227">Obstretics</option>
                                    <option value="228">Oncology</option>
                                    <option value="229">Opthalmology</option>
                                    <option value="230">Orthopaedic</option>
                                    <option value="231">P.S.M</option>
                                    <option value="232">Palliative Medicine</option>
                                    <option value="233">Pathology</option>
                                    <option value="234">Pediatrics</option>
                                    <option value="235">Pharmacology</option>
                                    <option value="236">Physical Medicine & Rehabilitation</option>
                                    <option value="237">Psychiatry</option>
                                    <option value="238">Psychology</option>
                                    <option value="239">Public Health</option>
                                    <option value="240">Pulmonary Medicine</option>
                                    <option value="241">R&D</option>
                                    <option value="242">Radiology</option>
                                    <option value="243">Rheumatology</option>
                                    <option value="244">Community Medicine</option>
                                    <option value="245">Sports Medicine</option>
                                    <option value="246">Thoracic Medicine</option>
                                    <option value="247">Traumatology and Surgery</option>
                                    <option value="248">Trophical Medicine</option>
                                    <option value="249">Tuberculosis & Respiratory Diseases</option>
                                    <option value="250">Unani</option>
                                    <option value="251">Urology</option>
                                    <option value="252">Venereology</option>
                                    <option value="253">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="mvsc5" style="display:none;" name="22">
                                <optgroup label="---Select Specialization---">
                                    <option value="254">Veterinary Science</option>
                                    <option value="255">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="pgd5" style="display:none;" name="23">
                                <optgroup label="---Select Specialization---">
                                    <option value="255">Chemical</option>
                                    <option value="256">Civil</option>
                                    <option value="257">Computers</option>
                                    <option value="258">Electrical</option>
                                    <option value="259">Electronics</option>
                                    <option value="260">Mechanical</option>
                                    <option value="261">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                             <input class="form-control" type="text" id="other5" style="width:100%; display:none;" placeholder="Other?" name="other5">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">College Name:</label>
                            <input class="form-control" type="text" id="college4" name="college4" style="width:100%;">
                            <label class="mb-2">District:</label>
                            <select class="form-control" id="district4" name="district4" onchange="showother4();">
                                <optgroup label="---Select District---">
                                    <option value="1">ANANTAPUR</option>
                                    <option value="2">CHITTOOR</option>
                                    <option value="3">EAST GODAVARI</option>
                                    <option value="4">GUNTUR</option>
                                    <option value="5">KHAMMAM</option>
                                    <option value="6">KRISHNA</option>
                                    <option value="7">KURNOOL</option>
                                    <option value="8">NELLORE</option>
                                    <option value="9">PRAKASAM</option>
                                    <option value="10">SRIKAKULAM</option>
                                    <option value="11">VISAKHAPATNAM</option>
                                    <option value="12">VISHAKHAPATNAM</option>
                                    <option value="13">VIZIANAGARAM</option>
                                    <option value="14">WEST GODAVARI</option>
                                    <option value="15">YSR DISTRICT</option>
                                    <option value="16">Other</option>
                                </optgroup>
                            </select>
                            <input class="form-control" type="text" id="otherdist" name="otherdist" style="width:100%; display:none;" placeholder="Which State?">
                        </div>
                        <div class="form-group">
                            <label style="float:left">Course Type:  </label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" name="coursetype4" id="full1" value="full" checked>Full Time
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" name="coursetype4" id="part1" value="part">Part Time
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio3">
                                    <input type="radio" class="form-check-input" name="coursetype4" id="dist1" value="dist">Corresponding/Distance Learning
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Passed out Year</label>
                            <select class="form-control" id="passyear4" name="passyear4" placeholder="Passed Out Year">
                                <option value="">- Year -</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Medium of Education</label>
                            <select class="form-control" id="medium4" name="medium4" placeholder="Select Medium">
                                <option value="tel">Telugu</option>
                                <option value="eng">English</option>
                                <option value="tam">Tamil</option>
                                <option value="urd">Urdu</option>
                                <option value="hin">Hindi</option>
                                <option value="mal">Malayalam</option>
                                <option value="kan">Kannada</option>
                                <option value="oth">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Marks Percentage</label>
                            <select class="form-control" id="marks4" name="marks4" placeholder="Percentage of Marks">
                                <option value="1">&lt; 40%</option>
                                <option value="2">40-44.9%</option>
                                <option value="3">45-49.9%</option>
                                <option value="4">50-54.9%</option>
                                <option value="5">55-59.9%</option>
                                <option value="6">60-64.9%</option>
                                <option value="7">65-69.9%</option>
                                <option value="8">70-74.9%</option>
                                <option value="9">75-79.9%</option>
                                <option value="10">80-84.9%</option>
                                <option value="11">85-89.9%</option>
                                <option value="12">90-94.9%</option>
                                <option value="13">95-99.9%</option>
                                <option value="14">100%</option>
                                <option value="15">Yet to pass</option>
                            </select>
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
<!--/Add Employment Details-->
<div class="modal fade" id="addempmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Current/ Last Employment Details</h5>
                    <form role="form" action="{{url('/updateemp')}}" method="post">
                        @csrf
                        <div class="form-group" style="display:block;">
                            <label class="mb-2" style="color:blue;">Total No. of Experience: (Fresher - leave blank)</label>
                            <input type="number" class="form-control" id="yearsexp5" name="yearsexp5" min="0" max="60" placeholder="Years">
                            <input type="number" class="form-control" id="monthsexp5" name="monthsexp5" min="0" max="12" placeholder="Months">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue;">Organization Name:</label>
                            <input type="text" class="form-control" id="org5" name="org5" placeholder="Your Employer Name">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue;">Your Designation:</label>
                            <input type="text" class="form-control" id="role5" name="role5" placeholder="Your Designation">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue;">Started Working from:</label>
                            <input type="date" class="form-control" id="role5start" name="role5start">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue;">Worked Till:</label>
                            <input type="date" class="form-control" id="role5end" name="role5end">
                        </div>
                        <div class="form-group">                            
                            <label class="mb-2" style="color:blue;">Current Salary(per month):</label>
                        </div>

                        <div class="form-group">
                            <input type="number" min="0" max="100" class="form-control" id="role5sall" name="role5sall" value="0" style="float:left; width:20%">
                            <label style="display:inline-block;">Lakhs</label>
                            <span style="display:inline-block;">&nbsp;&nbsp;</span>
                            <input type="number" min="0" max="99999" class="form-control" id="role5salt" value="0" name="role5salt" style="display:inline-block; width:20%">
                            <label style="display:inline-block;">Thousands</label>
                        </div>
                        <div class="form-group">
                            <label class="mb-2 form-group-label" style="color:blue;">Responsibilities:</label>
                            <textarea id="ta6" class="form-control" name="resp" style="height:100px; width:100%; resize:none; display:block;" onkeyup="countChars(this,'lab6',2500);"></textarea>
                            <label id="lab6" style="float:left; display:inline-block;width:100%;">2500 Character(s) Left</label>
                        </div>

                        <div class="form-group">
                            <label class="mb-2 form-group-label" style="float:none;color:blue;">Notice Period:</label>
                            <select class="form-control" id="notice5" name="notice5" placeholder="Select Notice Period" style="display:block;">
                                <option value="now">Immediate</option>
                                <option value="15d">15 days or less</option>
                                <option value="1mon">1 month</option>
                                <option value="2mon">2 months</option>
                                <option value="3mon">3 months</option>
                                <option value="short">Serving Notice Period</option>
                            </select>
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
<!--/Add Current Address Details-->
<div class="modal fade" id="addcaddmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Present Address</h5>
                    <form role="form" action="{{url('/updatecadd')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Address Line1:</label>
                            <input type="text" class="form-control" id="addline1" name="addline1" placeholder="Address Line 1">
                            <label style="float:right; font-size:small;">Dr No, Street Address, Company Name..
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Address Line2:</label>
                            <input type="text" class="form-control" id="addline2" name="addline2" placeholder="Address Line 2">
                            <label style="float:right; font-size:small;">Apartment Name, Building, Floor, etc..
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">City/ Town:</label>
                            <input type="text" class="form-control" id="city1" name="city1" placeholder="City or Town">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">State/ Province:</label>
                            <input type="text" class="form-control" id="state1" name="state1" placeholder="State or Province">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Zip/ Postal Code:</label>
                            <input type="text" class="form-control" id="zcode1" name="zcode1" placeholder="Zip or Postal Code">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Country:</label>
                            <select class="form-control" id="Country1" name="country1" style="display:block;" readonly>
                                <option value="IND">India</option>
                            </select>
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
<!--/Add Permanent Address Details-->
<div class="modal fade" id="addpaddmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Permanent Address</h5>
                    <form role="form" action="{{url('/updatepadd')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Address Line1:</label>
                            <input type="text" class="form-control" id="addline3" name="addline3" placeholder="Address Line 1">
                            <label style="float:right; font-size:small;">Dr No, Street Address, Company Name..
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Address Line2:</label>
                            <input type="text" class="form-control" id="addline4" name="addline4" placeholder="Address Line 2">
                            <label style="float:right; font-size:small;">Apartment Name, Building, Floor, etc..
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">City/ Town:</label>
                            <input type="text" class="form-control" id="city2" name="city2" placeholder="City or Town">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">State/ Province:</label>
                            <input type="text" class="form-control" id="state2" name="state2" placeholder="State or Province">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Zip/ Postal Code:</label>
                            <input type="text" class="form-control" id="zcode2" name="zcode2" placeholder="Zip or Postal Code">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Country:</label>
                            <select class="form-control" id="country2" name="country2" style="display:block;" readonly>
                                <option value="IND">India</option>
                            </select>
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
<!--/Add Reference 1 Details-->
<div class="modal fade" id="addref1modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add First Reference</h5>
                    <form role="form" action="{{url('/updateref1')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Full Name:</label>
                            <input type="text" class="form-control" id="refname1" name="refname1" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Location:</label>
                            <input type="text" class="form-control" id="refloc1" name="refloc1" placeholder="Location" maxLength="100">
                            <label style="float:right; font-size:small;">City name,District Name, etc...</label>
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">E-mail ID:</label>
                            <input type="email" class="form-control" id="refmail1" placeholder="callforsams@gmail.com" name="refmail1">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Mobile Number(+91):</label>
                            <input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="refmob1" name="refmob1" placeholder="Mobile Number">
                            <label style="float:right; font-size:small; width:100%">valid mobile number of 10 digits required...</label>
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
<!--/Add Reference 2 Details-->
<div class="modal fade" id="addref2modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Add Second Reference</h5>
                    <form role="form" action="{{url('/updateref2')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Full Name:</label>
                            <input type="text" class="form-control" id="refname2" name="refname2" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Location:</label>
                            <input type="text" class="form-control" id="refloc2" name="refloc2" placeholder="Location" maxLength="100">
                            <label style="float:right; font-size:small;">City name,District Name, etc...</label>
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">E-mail ID:</label>
                            <input type="email" class="form-control" id="refmail2" placeholder="callforsams@gmail.com" name="refmail2">
                        </div>
                        <div class="form-group">
                            <label class="mb-2" style="color:blue; display:inline;">Mobile Number(+91):</label>
                            <input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="refmob2" name="refmob2" placeholder="Mobile Number">
                            <label style="float:right; font-size:small; width:100%">valid mobile number of 10 digits required...</label>
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
<!--//Model Forms End-->
<script>
/*Count characters typed in text area and display left characters out of max length */
/*MikevNew*/
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

/* Differently Abled Options make visible*/
function abledOptions(obj){
    document.getElementById("able1").style.display = "block";
}

/* Differently Abled Options make invisible*/
function abledNone(obj){
    document.getElementById("able1").style.display = "none";
}

/* Show Other option for District */
function showother4(){
    /*window.alert("Inside showother4");*/
    
    if (document.getElementById("district4").value=="16"){
        document.getElementById("otherdist").style.display = "block";
    }
    else {
        document.getElementById("otherdist").style.display = "none";
    }
}

/* Show specifications options for Courses*/
function showspecs(obj) {
    switch (document.getElementById("course3").value) {
        case "0":
            document.getElementById("BA3").style.display = "block";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BA3";
            break;
        case "1":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "block";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BArch3";
            break;
        case "2":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "block";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BBA3";
            break;
        case "3":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "block";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BCom3";
            break;
        case "4":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "block";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BDes3";
            break;
        case "5":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "block";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BEd3";
            break;
        case "6":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "block";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BEIEd3";
            break;
        case "7":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "block";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BPEd3";
            break;
        case "8":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "block";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BPharma3";
            break;
        case "9":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "block";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";
            window.gradid="BSc3";
            break;
        case "10":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "block";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BTech3";
            break;
        case "11":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "block";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BUMS3";
            break;
        case "12":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "block";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BAMS3";
            break;
        case "13":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "block";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BCA3";
            break;
        case "14":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "block";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BDS3";
            break;
        case "15":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "block";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BFA3";
            break;
        case "16":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "block";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BHM3";
            break;
        case "17":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "block";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BHMS3";
            break;
        case "18":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "block";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="BVSC3";
            break;
        case "19":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "block";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="Diploma3";
            break;
        case "20":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "block";
            document.getElementById("MBBS3").style.display = "none";    
            window.gradid="LLB3";
            break;
        case "21":
            document.getElementById("BA3").style.display = "none";
            document.getElementById("BArch3").style.display = "none";
            document.getElementById("BBA3").style.display = "none";
            document.getElementById("BCom3").style.display = "none";
            document.getElementById("BDes3").style.display = "none";
            document.getElementById("BEd3").style.display = "none";
            document.getElementById("BEIEd3").style.display = "none";
            document.getElementById("BPEd3").style.display = "none";
            document.getElementById("BPharma3").style.display = "none";
            document.getElementById("BSc3").style.display = "none";
            document.getElementById("BTech3").style.display = "none";
            document.getElementById("BUMS3").style.display = "none";
            document.getElementById("BAMS3").style.display = "none";
            document.getElementById("BCA3").style.display = "none";
            document.getElementById("BDS3").style.display = "none";
            document.getElementById("BFA3").style.display = "none";
            document.getElementById("BHM3").style.display = "none";
            document.getElementById("BHMS3").style.display = "none";
            document.getElementById("BVSC3").style.display = "none";
            document.getElementById("Diploma3").style.display = "none";
            document.getElementById("LLB3").style.display = "none";
            document.getElementById("MBBS3").style.display = "block";    
            window.gradid="MBBS3";
            break;
    }
}

/* Show specifications options for Courses*/
function showspecs5(obj) {
    switch (document.getElementById("course4").value) {
        case "1":
            document.getElementById("ca5").style.display = "block";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="ca5";
            break;
        case "2":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "block";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="cs5";
            break;
        case "3":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "block";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="dm5";
            break;
        case "4":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "block";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="icwa5";
            break;
        case "5":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "block";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="ipg5";
            break;
        case "6":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "block";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="llm5";
            break;
        case "7":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "block";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="ma5";
            break;
        case "8":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "block";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="march5";
            break;
        case "9":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "block";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mch5";
            break;
        case "10":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "block";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mcom5";
            break;
        case "11":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "block";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mdes5";
            break;
        case "12":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "block";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="med5";
            break;
        case "13":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "block";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mpharma5";
            break;
        case "14":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "block";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="msc5";
            break;
        case "15":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "block";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mtech5";
            break;
        case "16":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "block";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mba5";
            break;
        case "17":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "block";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mca5";
            break;
        case "18":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "block";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mcm5";
            break;
        case "19":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "block";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mds5";
            break;
        case "20":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "block";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mfa5";
            break;
        case "21":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "block";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="md5";
            break;
        case "22":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "block";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "none";
            window.pgid="mvsc5";
            break;
        case "23":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "block";
            document.getElementById("other5").style.display = "none";
            window.pgid="pgd5";
            break;
        case "24":
            document.getElementById("ca5").style.display = "none";
            document.getElementById("cs5").style.display = "none";
            document.getElementById("dm5").style.display = "none";
            document.getElementById("icwa5").style.display = "none";
            document.getElementById("ipg5").style.display = "none";
            document.getElementById("llm5").style.display = "none";
            document.getElementById("ma5").style.display = "none";
            document.getElementById("march5").style.display = "none";
            document.getElementById("mch5").style.display = "none";
            document.getElementById("mcom5").style.display = "none";
            document.getElementById("mdes5").style.display = "none";
            document.getElementById("med5").style.display = "none";
            document.getElementById("mpharma5").style.display = "none";
            document.getElementById("msc5").style.display = "none";
            document.getElementById("mtech5").style.display = "none";
            document.getElementById("mba5").style.display = "none";
            document.getElementById("mca5").style.display = "none";
            document.getElementById("mcm5").style.display = "none";
            document.getElementById("mds5").style.display = "none";
            document.getElementById("mfa5").style.display = "none";
            document.getElementById("md5").style.display = "none";
            document.getElementById("mvsc5").style.display = "none";
            document.getElementById("pgd5").style.display = "none";
            document.getElementById("other5").style.display = "block";
            window.pgid="other5";
            break;
    }
}


window.load = function(){
    
    function attachfocus(){
        document.getElementById("head1").style.display = "none";
        document.getElementById("attach1").style.display = "block";
        document.getElementById("key1").style.display = "none";
        document.getElementById("person1").style.display = "none";
    }
    attachfocus();
    
}

/* Mike Navigation Menu bar scroll
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar2").style.top = "0";
  } else {
    document.getElementById("navbar2").style.top = "-50px";
  }
}
*/

</script>

{{-- Mike To Disable links with css --}}
<style type="text/css">
    .not-active {
    pointer-events: none;
    cursor: default;
    text-decoration: none;
    color: black;
    }

/*
    .elmback:hover,
    .elmback:focus {
        outline-style: none;
        background-color: blue;
        border-style: none;
        -webkit-appearance: none;
    }


    #ta1{
    border: none;
    overflow: auto;
    outline: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    resize: none;
    background:none;
    }

form{
    background: red;
}

*/


</style>
@endsection