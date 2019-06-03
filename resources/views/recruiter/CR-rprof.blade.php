@extends('recruiter.layouts.rprof')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;

    //$previousurl = url()->previous();
    $seslink = Session::get('link');
    $message = "Session link is " . $seslink;
    echo "<script type='text/javascript'>alert('$message');</script>";

    $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
    $orgname=$weburl=$addline1=$addline2=$city=$state=$country='';
    $profname=$profurl=$shortprof=$servcity=$servstate=$servcountry=$remote='';
    $linkurl=$fburl=$tweeturl=$instaurl=$lang1=$lang2=$lang3='';
    $sarea1=$sarea2=$sarea3=$sainfo=$sapos=$saclients='';

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
            <a class="dropdown-item" href="services.html" title="Post Requirements">Post Jobs</a>
            <a class="dropdown-item" href="services.html" title="View all posted Jobs">View Jobs</a>
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
    <h3 class="j-b mb-3">SAMS Account</h3>
    <ul class="list_2">
        <li>
            <a href="#i-emailpass">E-mail & Password</a>
        </li>
        <li>
            <a href="#i-personal">Personal</a>
        </li>
        <li>
            <a href="#i-business">Business</a>
        </li>
        <li>
            <a href="#i-comm">Communication</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">SAMS Profile</h3>
    <ul class="list_2">
        <li>
            <a href="#i-about">About You</a>
        </li>
        <li>
            <a href="#i-socio">Social & Cultural</a>
        </li>
        <li>
            <a href="#i-pphoto">Professional Photo</a>
        </li>
        <li>
            <a href="#i-sarea">Specialized Areas</a>
        </li>
        <li>
            <a href="#key1">Qualifications</a>
        </li>
        <li>
            <a href="#key1">Employment</a>
        </li>
        <li>
            <a href="#key1">References</a>
        </li>
    </ul>
</div>

@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Headline Div--}}
<div class="emply-resume-list row mb-1" id="i-initial" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/upinfopdet')}}" method="post">
                @csrf
                <h4>First, a bit about you...</h4>
                <table>
                <tr><td style="width:230px;"><label>What's your name?</label></td>
                    <td><input type="text" class="form-control" placeholder="First Name" name="fname" id="i-fname" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td><input type="text" class="form-control" placeholder="Last Name" name="lname" id="i-lname" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Where are you located?</label></td>
                    <td><input type="text" class="form-control" placeholder="Vijayawada" name="loc" id="i-loc" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Mobile Number to contact? (+91)</label></td>
                    <td><input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="i-mobnum" name="mobnum" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-emailpass" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/upinfopdet1')}}" method="post">
                @csrf
                <h4>Account > E-mail</h4>
                <table>
                <tr><td style="width:230px;"><label>E-mail:</label></td>
                    <td><input type="text" class="form-control" placeholder="Valid Email ID" name="email" id="i-email" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Mobile Number (+91):</label></td>
                    <td><input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="i-mobnum1" name="mobnum" style="width:250px; height:30px;"></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-personal" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/upinfopdet2')}}" method="post">
                @csrf
                <h4>Account > Personal</h4>
                <table>
                <tr><td style="width:230px;"><label>First Name:</label></td>
                    <td><input type="text" class="form-control" placeholder="First Name" name="fname" id="i-fname1" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Last Name:</label></td>
                    <td><input type="text" class="form-control" placeholder="Last Name" name="lname" id="i-lname1" style="width:250px; height:30px;"></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-business" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/upinfobdet')}}" method="post">
                @csrf
                <h4>Account > Business</h4>
                <table>
                <tr><td style="width:230px;"><label>Company or Business entity:</label></td>
                    <td><input type="text" class="form-control" placeholder="Company Name" name="orgname" id="i-orgname" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Company website URL:</label></td>
                    <td><input type="text" class="form-control" placeholder="www.samsjobs.in" name="bweburl" id="i-bweburl" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label><b>Address:</b></label></td>
                    <td><label></label></td></tr>
                <tr><td style="width:230px;"><label>Address Line 1:</label></td>
                    <td><input type="text" class="form-control" placeholder="Aprt no,Road Name, etc." name="addline1" id="i-addline1" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Address Line 2:</label></td>
                    <td><input type="text" class="form-control" placeholder="Land Mark, Area Name, etc." name="addline2" id="i-addline2" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>City:</label></td>
                    <td><input type="text" class="form-control" placeholder="Vijayawada" name="city" id="i-city" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>State:</label></td>
                    <td><input type="text" class="form-control" name="state" placeholder="Andhra Pradesh" id="i-state" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Country:</label></td>
                    <td><input type="text" class="form-control" placeholder="India" name="country" value="India" id="i-country" style="width:250px; height:30px;" readonly></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-comm" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/updatecom')}}" method="post">
                @csrf
                <h4>Account > Communication</h4>
                <table>
                <tr><td style="width:230px;"><label>Mobile Number (+91):</label></td>
                    <td><input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="i-mobnum2" name="mobnum" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Skype ID:</label></td>
                    <td><input type="text" class="form-control" placeholder="Last Name" name="skype" id="i-skype" style="width:250px; height:30px;"></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-about" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/uprecabout')}}" method="post">
                @csrf
                <h4>Profile > About You</h4>
                <table>
                <tr><td style="width:480px;">SAMS Profile name in format Firstname Lastname, i.e. (Mike Sams):</td></tr>
                <tr><td><input type="text" class="form-control" id="i-profname" name="profname" style="width:480px; height:30px;"></td></tr>
                <tr><td style="width:480px;">Your SAMS profile URL:</td></tr>
                <tr><td><input type="text" class="form-control" placeholder={{ $profurl }} name="profurl" id="i-profurl" style="width:480px; height:30px;" readonly></td></tr>
                <tr><td style="width:480px;">Short Profile (max 140 characters):</td></tr>
                <tr><td><textarea class="form-control" placeholder="Make it catch and stylish. Max 140 characters" maxlength="140" name="shortprof" id="i-shortprof" rows="3" style="width:480px; resize: none;"></textarea></td></tr>
                </table>
                <h5>Servicing Area:</h5>
                <label>This is your primary physical location.</label>
                <table>
                <tr><td style="width:230px;"><label>City:</label></td>
                    <td><input type="text" class="form-control" placeholder="Vijayawada" name="servcity" id="i-servcity" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>State:</label></td>
                    <td><input type="text" class="form-control" name="servstate" placeholder="Andhra Pradesh" id="i-servstate" style="width:250px; height:30px;"></td></tr>
                <tr><td style="width:230px;"><label>Country:</label></td>
                    <td><input type="text" class="form-control" placeholder="India" name="servcountry" value="India" id="i-servcountry" style="width:250px; height:30px;" readonly></td></tr>
                </table>
                <table>
                <h5>Remote Recruiter:</h5>
                <label>You may also recruit in cities other than your physical location.</label>
                
                <div class="form-group" id="i-remote">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="i-remyes" name="remote" value=1>Yes
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="i-remno" name="remote" value=0 checked>No
                        </label>
                    </div>
                </div>
                <table>
                <tr><td style="width:230px;"><label></label></td>
                    <td style="width:250px;"><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-socio" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/updatesoc')}}" method="post">
                @csrf
                <h4>Profile > Social Links</h4>
                <table>
                <tr><td style="width:180px;"><label>Your Linkedin Page URL:</label></td>
                    <td><input type="text" class="form-control" placeholder="https://www.linkedin.com/company/sams-pvt-ltd/" name="linkurl" id="i-linkurl" style="width:300px; height:30px;"></td></tr>
                <tr><td style="width:180px;"><label>Your Facebook Page URL:</label></td>
                    <td><input type="text" class="form-control" placeholder="https://www.facebook.com/callforsams/" name="fburl" id="i-fburl" style="width:300px; height:30px;"></td></tr>
                <tr><td style="width:180px;"><label>Your Twitter Page URL:</label></td>
                    <td><input type="text" class="form-control" placeholder="https://twitter.com/callforsams" name="tweeturl" id="i-tweeturl" style="width:300px; height:30px;"></td></tr>
                <tr><td style="width:180px;"><label>Your Instagram Page URL:</label></td>
                    <td><input type="text" class="form-control" placeholder="https://www.instagram.com/callforsams/" name="instaurl" id="i-instaurl" style="width:300px; height:30px;"></td></tr>
                <tr><td style="width:180px;"><label>Language 1:</label></td>
                    <td><select class="form-control" id="i-lang1" name="lang1" style="width:300px; height:35px; line-height:10px; text-align:center;">
                        <option value="0" selected>English</option>
                        <option value="1">Hindi</option>
                        <option value="2">Bengali</option>
                        <option value="3">Marathi</option>
                        <option value="4">Telugu</option>
                        <option value="5">Tamil</option>
                        <option value="6">Gujarati</option>
                        <option value="7">Urdu</option>
                        <option value="8">Kannada</option>
                        <option value="9">Odia</option>
                        <option value="10">Malayalam</option>
                        <option value="11">Punjabi</option>
                        <option value="12">Assamese</option>
                        <option value="13">Maithili</option>
                        <option value="14">Santali</option>
                        <option value="15">Kashmiri</option>
                        <option value="16">Nepali</option>
                        <option value="17">Sindhi</option>
                        <option value="18">Dogri</option>
                        <option value="19">Konkani</option>
                        <option value="20">Manipuri</option>
                        <option value="21">Bodo</option>
                        <option value="22">Sanskrit</option>
                        <option value="23">Other</option>
                    </select></td></tr>
                <tr><td style="width:180px;"><label>Language 2:</label></td>
                    <td><select class="form-control" id="i-lang2" name="lang2" style="width:300px; height:35px; line-height: 10px; text-align:center;">
                        <option value="0">English</option>
                        <option value="1">Hindi</option>
                        <option value="2">Bengali</option>
                        <option value="3">Marathi</option>
                        <option value="4" selected>Telugu</option>
                        <option value="5">Tamil</option>
                        <option value="6">Gujarati</option>
                        <option value="7">Urdu</option>
                        <option value="8">Kannada</option>
                        <option value="9">Odia</option>
                        <option value="10">Malayalam</option>
                        <option value="11">Punjabi</option>
                        <option value="12">Assamese</option>
                        <option value="13">Maithili</option>
                        <option value="14">Santali</option>
                        <option value="15">Kashmiri</option>
                        <option value="16">Nepali</option>
                        <option value="17">Sindhi</option>
                        <option value="18">Dogri</option>
                        <option value="19">Konkani</option>
                        <option value="20">Manipuri</option>
                        <option value="21">Bodo</option>
                        <option value="22">Sanskrit</option>
                        <option value="23">Other</option>
                    </select></td></tr>
                <tr><td style="width:180px;"><label>Language 3:</label></td>
                    <td><select class="form-control" id="i-lang3" name="lang3" style="width:300px; height:35px; line-height: 10px; text-align:center;">
                        <option value="0">English</option>
                        <option value="1">Hindi</option>
                        <option value="2">Bengali</option>
                        <option value="3">Marathi</option>
                        <option value="4">Telugu</option>
                        <option value="5" selected>Tamil</option>
                        <option value="6">Gujarati</option>
                        <option value="7">Urdu</option>
                        <option value="8">Kannada</option>
                        <option value="9">Odia</option>
                        <option value="10">Malayalam</option>
                        <option value="11">Punjabi</option>
                        <option value="12">Assamese</option>
                        <option value="13">Maithili</option>
                        <option value="14">Santali</option>
                        <option value="15">Kashmiri</option>
                        <option value="16">Nepali</option>
                        <option value="17">Sindhi</option>
                        <option value="18">Dogri</option>
                        <option value="19">Konkani</option>
                        <option value="20">Manipuri</option>
                        <option value="21">Bodo</option>
                        <option value="22">Sanskrit</option>
                        <option value="23">Other</option>
                    </select></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-pphoto" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/uprecphoto')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h4>Profile > Professional Photo</h4>
                <hr  style="width:480px; align:left;">
                @if (!($picname == null))
                    <img src="{{url($fullpath)}}" style="border-radius:80%; width:480px; height:80%">
                @endif
                <label style="float:left; width:230px;">Professional Photo:</label>
                <input class="form-control" type="file" id="i-profpic" name="profpic" style="width:480px;">
                <table>
                <tr><td style="width:230px;">
                <label style="float:left; font-size:small;">Jpg or Jpeg formats only</label>
                </td>
                <td style="width:250px;">
                <button type="submit" class="btn btn-primary" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button>
                </td></tr></table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
<div class="emply-resume-list row mb-1" id="i-sarea" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/uprecsarea')}}" method="post">
                @csrf
                <h4>Profile > Specialized Areas</h4>
                <hr  style="width:480px; align:left;">
                <label style="float:left; width:480px;">Specialities:</label>
                <select multiple class="form-control" id="i-spec" name="sarea[]" style="width:300px; height:75px; line-height: 10px; text-align:left;">
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
                    <option value="20">Software</option>
                    <option value="21">Other</option>
                </select>
                <label for="i-spec" style="width:480px; font-size:small;">Mutiple select list (hold shift/ Ctrl to select upto three):</label>
                <label style="float:left; width:480px;"><u>Describe your practice</u></label>
                <label style="float:left; width:480px;">Your recruitment strategy or practice followed for this areas:</label>
                <textarea class="form-control" placeholder="Max 700 characters" maxlength="700" name="sainfo" id="i-sainfo" rows="5" style="width:480px; resize: none;"></textarea>
                <label style="float:left; width:480px;">List recruited positions relevant to this speciality areas:</label>
                <textarea class="form-control" placeholder="Eg: Telecaller, Receptionist, Frontdesk" maxlength="200" name="sapos" id="i-sapos" rows="3" style="width:480px; resize: none;"></textarea>
                <label style="float:left; width:480px;">List top clients you have recruited for:</label>
                <textarea class="form-control" placeholder="Eg: IBM, Bigbasket, Metro etc." maxlength="200" name="saclients" id="i-saclients" rows="3" style="width:480px; resize: none;"></textarea>
                <div style="width:480px;">
                    <button type="submit" class="btn btn-primary" style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button>
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

@endsection 