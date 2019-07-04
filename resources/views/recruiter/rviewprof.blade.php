@extends('recruiter.layouts.rprof')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;

    //$previousurl = url()->previous();
    $seslink = Session::get('link');
    //$message = "Session link is " . $seslink;
    //echo "<script type='text/javascript'>alert('$message');</script>";

    $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname=$rectime='';
    $orgname=$weburl=$addline1=$addline2=$city=$state=$country='';
    $profname=$profurl=$shortprof=$servcity=$servstate=$servcountry=$remote='';
    $linkurl=$fburl=$tweeturl=$instaurl=$lang1=$lang2=$lang3='';
    $sarea=$sarea1=$sarea2=$sarea3=$sainfo=$sapos=$saclients='';
    $qual1=$board1=$pyear1=$colname1=$edulang1=$percentage1=$edutime1='';
    $qual2=$board2=$pyear2=$colname2=$edulang2=$percentage2=$edutime2='';
    $qual3=$course3=$spec3=$colname3=$district3=$cortype3=$pyear3=$edulang3=$percentage3=$edutime3='';
    $qual4=$course4=$spec4=$colname4=$district4=$cortype4=$pyear4=$edulang4=$percentage4=$edutime4='';
    $empname=$desg=$startdt=$enddt=$msal=$resp=$nperiod=$emptime=$msalt=$msall='';
    $refnum1=$fname1=$location1=$email1=$mobnum1=$reftime1='';
    $refnum2=$fname2=$location2=$email2=$mobnum2=$reftime2='';

    //get recruiter personal details
    $recprof=PostsController::get_initial();
    foreach($recprof as $key=>$val){
        $fname=$val["fname"];
        $lname=$val["lname"];
        $loc=$val["location"]; 
        $email=$val["email"];
        $mobnum=$val["mobnum"];
        $skype=$val["skype"];
        $picpath=$val["picpath"];
        $picname=$val["picname"];
        $rectime=$val["updated_at"];
    }
    //if (Auth::guard('recruiter')->check()) 
    //{
        $authid = Auth::guard('recruiter')->user()->id;
    //}    
    list($name11, $ext11) = explode('.', $picname);
    $fullpath=$picpath."/".$authid.".".$ext11;

    //get recruiter business details
    $recprof=PostsController::get_bdetails();
    foreach($recprof as $key=>$val){
        $orgname=$val["orgname"];
        $weburl=$val["weburl"];
        $addline1=$val["addline1"];
        $addline2=$val["addline2"];
        $city=$val["city"];
        $state=$val["state"];
        $country=$val["country"];
    }

    //get recruiter About you details
    $recprof=PostsController::get_aboutu();
    foreach($recprof as $key=>$val){
        $profname=$val["profname"];
        $profurl=$val["profurl"];
        $shortprof=$val["shortprof"];
        $servcity=$val["servcity"];
        $servstate=$val
        ["servstate"];
        $servcountry=$val["servcountry"];
        $remote=$val["remote"];
    }
    $profurl="http://samsjobs.in/recruiter/".$profurl;

    //get recruiter Social details
    $recprof=PostsController::get_socio();
    foreach($recprof as $key=>$val){
        $linkurl=$val["linkurl"];
        $fburl=$val["fburl"];
        $tweeturl=$val["tweeturl"];
        $instaurl=$val["instaurl"];
        $lang1=$val["lang1"];
        $lang2=$val["lang2"];
        $lang3=$val["lang3"];
    }

    //get recruiter Specialized Area details
    $recprof=PostsController::get_sarea();
    foreach($recprof as $key=>$val){
        $sarea1=$val["sarea1"];
        $sarea2=$val["sarea2"];
        $sarea3=$val["sarea3"];
        $sainfo=$val["sainfo"];
        $sapos=$val["sapos"];
        $saclients=$val["saclients"];
    }

    //get recruiter Qualifications details
    $recprof=PostsController::get_recedu();
    $i=0;
    foreach($recprof as $key=>$val){
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

    //get recruiter Employment details
    $recprof=PostsController::get_recemp();
    foreach($recprof as $key=>$val){
        $empname=$val["emp_name"];
        $desg=$val["desg"];
        $startdt=$val["startdt"];
        $enddt=$val["enddt"];
        $msal=$val["msal"];
        $resp=$val["resp"];
        $nperiod=$val["nperiod"];
        $emptime=$val["updated_at"];
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

    //get recruiter Reference details
    $recprof=PostsController::get_recref();
    $i=1;
    foreach($recprof as $key=>$val){
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

    //$message = "fname is" . $fname;
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

@endsection
{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:280px; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-3" >
        <img src="{{url($fullpath)}}" style="border-radius:80%; width:100%; height:80%">
        </div>
        <div class="col-md-6" style="float:left;">
            <label style="width:100%;">{{$fname}}</label>
            <label style="width:100%;">{{$desg}} in {{$empname}}</label>
            <div class="col-md-6" style="float:left;">
                <label style="width:100%;">{{$city}}</label>
                <label style="width:100%;">Experience: 8+ yrs</label>
            </div>
            <div class="col-md-6" style="float:right;">
                <label style="width:100%;">+91 {{$mobnum}} </label>
                <label style="width:100%;">{{$email}} </label>
            </div>
            <label style="width:100%;">Serving City: {{$servcity}}</label>
            <label style="width:100%;">Recruit Remotely: 
            @if($remote==1)
            Yes
            @else 
            No
            @endif</label>
            <label style="width:100%;">URL: {{$profurl}}</label>
        </div>
        <div class="col-md-3" style="float:right; background-color:rgba(99, 57, 116, 0.2);">
            <label style="width:100%;">Candidates Search: 100</label>
            <label style="width:100%;">Jobs Posted: 100</label>
            <label style="width:100%;">Updated: {{substr($rectime, 0, 10)}}</label>
        </div>
    </div>
</div>
{{-- Profile Summary--}}
<div class="emply-resume-list row mb-1" id="summary" style="display:block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Short Summary:</h5></label>
            <textarea id="v-shortprof" name="v-shortprof" style="height:120px; width:100%; resize:none; background-color:rgba(99, 57, 116, 0.01); border:0px" readonly></textarea>
        </div>
    </div>
</div>
{{-- Specialized Areas --}}
<div class="emply-resume-list row mb-1" id="summary" style="display:block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Specialized Areas:</h5></label>
            <ul>
                <li>
                    @if(!($sarea1==''))
                        @switch($sarea1)
                            @case ("1")
                                Marketing
                                @break
                            @case ("2")
                                Data Entry Operator
                                @break
                            @case ("3")
                                Telecaller
                                @break
                            @case ("4")
                                Computer Operator
                                @break
                            @case ("5")
                                Front Office Executive
                                @break
                            @case ("6")
                                Sales
                                @break
                            @case ("7")
                                Admin
                                @break
                            @case ("8")
                                Driver
                                @break
                            @case ("9")
                                Accountant
                                @break
                            @case ("10")
                                Security
                                @break
                            @case ("11")
                                Delivery Boy
                                @break
                            @case ("12")
                                Housekeeping
                                @break
                            @case ("13")
                                Maid
                                @break
                            @case ("14")
                                Cook
                                @break
                            @case ("15")
                                Receptionist
                                @break
                            @case ("16")
                                Teacher
                                @break
                            @case ("17")
                                Office Boy
                                @break
                            @case ("18")
                                Civil Engineer
                                @break
                            @case ("19")
                                Mechanical Engineer
                                @break
                            @case ("20")
                                Software
                                @break
                            @case ("21")
                                Other
                                @break
                            @default
                                Not Applicable
                        @endswitch
                    @endif
                </li>
                <li>
                    @if(!($sarea2==''))
                        @switch($sarea2)
                            @case ("1")
                                Marketing
                                @break
                            @case ("2")
                                Data Entry Operator
                                @break
                            @case ("3")
                                Telecaller
                                @break
                            @case ("4")
                                Computer Operator
                                @break
                            @case ("5")
                                Front Office Executive
                                @break
                            @case ("6")
                                Sales
                                @break
                            @case ("7")
                                Admin
                                @break
                            @case ("8")
                                Driver
                                @break
                            @case ("9")
                                Accountant
                                @break
                            @case ("10")
                                Security
                                @break
                            @case ("11")
                                Delivery Boy
                                @break
                            @case ("12")
                                Housekeeping
                                @break
                            @case ("13")
                                Maid
                                @break
                            @case ("14")
                                Cook
                                @break
                            @case ("15")
                                Receptionist
                                @break
                            @case ("16")
                                Teacher
                                @break
                            @case ("17")
                                Office Boy
                                @break
                            @case ("18")
                                Civil Engineer
                                @break
                            @case ("19")
                                Mechanical Engineer
                                @break
                            @case ("20")
                                Software
                                @break
                            @case ("21")
                                Other
                                @break
                            @default
                                Not Applicable
                        @endswitch
                    @endif
                </li>
                <li>
                    @if(!($sarea3==''))
                        @switch($sarea3)
                            @case ("1")
                                Marketing
                                @break
                            @case ("2")
                                Data Entry Operator
                                @break
                            @case ("3")
                                Telecaller
                                @break
                            @case ("4")
                                Computer Operator
                                @break
                            @case ("5")
                                Front Office Executive
                                @break
                            @case ("6")
                                Sales
                                @break
                            @case ("7")
                                Admin
                                @break
                            @case ("8")
                                Driver
                                @break
                            @case ("9")
                                Accountant
                                @break
                            @case ("10")
                                Security
                                @break
                            @case ("11")
                                Delivery Boy
                                @break
                            @case ("12")
                                Housekeeping
                                @break
                            @case ("13")
                                Maid
                                @break
                            @case ("14")
                                Cook
                                @break
                            @case ("15")
                                Receptionist
                                @break
                            @case ("16")
                                Teacher
                                @break
                            @case ("17")
                                Office Boy
                                @break
                            @case ("18")
                                Civil Engineer
                                @break
                            @case ("19")
                                Mechanical Engineer
                                @break
                            @case ("20")
                                Software
                                @break
                            @case ("21")
                                Other
                                @break
                            @default
                                Not Applicable
                        @endswitch
                    @endif
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <hr>
            <label style="width:100%;"><h5>Recruitment Strategy:</h5></label>
            <textarea id="v-sainfo" name="v-sainfo" style="height:120px; width:100%; resize:none; background-color:rgba(99, 57, 116, 0.01); border:0px" readonly></textarea>
        </div>
        <div class="col-md-12">
            <hr>
            <label style="width:100%;"><h5>Recruited Positions:</h5></label>
            <textarea id="v-sapos" name="v-sapos" style="height:120px; width:100%; resize:none; background-color:rgba(99, 57, 116, 0.01); border:0px" readonly></textarea>
        </div>
        <div class="col-md-12">
            <hr>
            <label style="width:100%;"><h5>Top Clients:</h5></label>
            <textarea id="v-saclients" name="v-saclients" style="height:120px; width:100%; resize:none; background-color:rgba(99, 57, 116, 0.01); border:0px" readonly></textarea>
        </div>
    </div>
</div>
{{-- Qualification--}}
<div class="emply-resume-list row mb-1" id="qual1" style="display:inline-block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
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
{{-- Employment Details --}}
<div class="emply-resume-list row mb-1" id="emp1" style="display:inline-block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Professional Experience:</h5></label>
            @if(!($empname==''))
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
            @else
                Not shared with us.
            @endif
            <label style="width:100%;"><b>Responsibilities:</b>&emsp;{{ $resp }}</label>
        </div>
    </div>
</div>

{{-- Reference Details --}}
<div class="emply-resume-list row mb-1" id="ref1" style="display:inline-block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Reference Details:</h5></label>
            <table>
                <tr>
                    <td>
                        <label style="width:100%;"><u>Reference 1:</u></label>
                        <label style="width:100%;">{{ $fname1 }}</label>
                        <label style="width:100%;">+91{{ $mobnum1 }}</label>
                        <label style="width:100%;">{{ $email1 }}</label>
                        <label style="width:100%;">{{ $location1 }}</label>
                    </td>
                    <td>
                        <label style="width:100%;"><u>Reference 2:</u></label>
                        <label style="width:100%;">{{ $fname2 }}</label>
                        <label style="width:100%;">+91{{ $mobnum2 }}</label>
                        <label style="width:100%;">{{ $email2 }}</label>
                        <label style="width:100%;">{{ $location2 }}</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

{{-- Social & Cultural --}}
<div class="emply-resume-list row mb-1" id="socio1" style="display:inline-block; width:100%; background-color:rgba(99, 57, 116, 0.1);">
    <div class="row emply-info">
        <div class="col-md-12">
            <label style="width:100%;"><h5>Social Links:</h5></label>
            <ul>
                <li>Linkedin - 
                    @if(!($linkurl==''))
                        <a href={{$linkurl}}>{{$linkurl}}</a>
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Facebook - 
                    @if(!($fburl==''))
                        <a href={{$fburl}}>{{$fburl}}</a>
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Twitter - 
                    @if(!($tweeturl==''))
                        <a href={{$tweeturl}}>{{$tweeturl}}</a>
                    @else
                        Not shared with us.
                    @endif
                </li>
                <li>Instagram - 
                    @if(!($instaurl==''))
                        <a href={{$instaurl}}>{{$instaurl}}</a>
                    @else
                        Not shared with us.
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection 