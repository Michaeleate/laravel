@extends('recruiter.layouts.rJob')
<?php 
    use \App\Http\Controllers\PostsController;
    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Support\Facades\Auth;

    //$previousurl = url()->previous();
    $seslink = Session::get('link');
    if (\Request::is('recruiter/urecprofile') && ($seslink==null)) {
        $seslink='init';
    }
    //$message = "Session link is " . $seslink;
    //echo "<script type='text/javascript'>alert('$message');</script>";

    $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';

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
{{-- Resume Headline Div--}}
<div class="emply-resume-list row mb-1" id="i-initial" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ url('/recruiter/recpostjob')}}" method="post">
                @csrf
                <h4>Quick Job Posting</h4>
                <hr>
                <table>
                <tr><td style="width:230px; text-align:right;"><label>Company you are hiring for:
                    </label></td>
                    <td><input type="text" class="form-control" placeholder="Ex: IBM Pvt Ltd" name="hirecomp" id="i-hirecomp" style="width:420px; height:30px;" required></td></tr>
                <tr><td style="width:230px; text-align:right;"><label>Job Title/ Designation:</label></td>
                    <td><input type="text" class="form-control" placeholder="Ex:- Software Engineer, not Software Eng" name="jtitle" id="i-jtitle" style="width:420px; height:30px;" required></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td style="width:420px;"><label style="float:right;     font-size:small;">Job title is the first thing, applicants notice, when they search for jobs.</label></td></tr>
                <tr><td style="width:230px; vertical-align:top; text-align:right;"><label>Job Description:</label></td>
                    <td><textarea class="form-control" placeholder="Detailed Job Description. Max 1200 characters" maxlength="1200" name="jobdesc" id="i-jobdesc" rows="10" style="width:420px; resize: none;" onkeyup="countChars(this,'desc-char',1200);" required></textarea></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td><label id="desc-char" style="text-align:right; display:inline-block; width:420px;">1200 Character(s) Left</label></td></tr>
                <tr><td style="width:230px; text-align:right;"><label>Keywords:
                    </label></td>
                    <td><input type="text" class="form-control" placeholder="Ex:- telecaller, receptionist" name="jkey" id="i-jkey" style="width:420px; height:30px;" required></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td style="width:420px;"><label style="float:right;     font-size:small;">These keywords are used to display jobs for applicants, when they search for jobs.</label></td></tr>
                <tr><td style="width:230px; text-align:right;"><label>Work Experience:</label></td>
                    <td style="width:420px;">
                    <div  style="display:inline-block;">
                    <select class="form-control" id="i-minexp" name="minexp" placeholder="Minimum" style="display:inline-block; width:150px;" required>
                        <option value="" disabled selected>Minimum</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select>
                    </div>
                    <div  style="display:inline-block;">
                    <span class="form-control" style="border: none !important;">to</span>
                    </div>
                    <div  style="display:inline-block;">
                    <select class="form-control" id="i-maxexp" name="maxexp" placeholder="Maximum" style="width:150px;" required>
                        <option value="" disabled selected>Maximum</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select>
                    </div>
                    </td></tr>
                <tr><td style="width:230px; text-align:right;"><label>Approx. Net Salary Range (Monthly):</label></td>
                    <td style="width:420px;">
                    <div style="display:inline-block;">
                        <input type="number" min="0" max="99999" class="form-control" id="i-minsalt" name="minsalt" style="display:inline-block; width:150px;" placeholder="Ex: 10000">
                    </div>
                    <div style="display:inline-block;">
                        <span class="form-control" style="border: none !important; ">to</span>
                    </div>
                    <div style="display:inline-block;">
                        <input type="number" min="0" max="99999" class="form-control" id="i-maxsalt" name="maxsalt" style="display:inline-block; width:150px;" placeholder="Ex: 20000">
                    </div></td></tr>
                <tr><td style="width:230px;  vertical-align:top; text-align:right;"><label>Location(s) you are hiring for:</label></td>
                    <td style="width:420px;">
                    <div  style="display:inline-block;">
                    <select multiple class="form-control" id="i-hireloc" name="hireloc[]" style="display:inline-block; width:420px;" >
                        <option value="30" selected>Vijayawada</option>
                        <option value="11">Guntur</option>
                        <option value="24">Rajahmundry</option>
                        <option value="1">Adoni</option>
                        <option value="2">Amaravati</option>
                        <option value="3">Anantapur</option>
                        <option value="4">Bhimavaram</option>
                        <option value="5">Chilakaluripet</option>
                        <option value="6">Chittoor</option>
                        <option value="7">Dharmavaram</option>
                        <option value="8">Eluru</option>
                        <option value="9">Gudivada</option>
                        <option value="10">Guntakal</option>
                        <option value="12">Hindupur</option>
                        <option value="13">Kadapa</option>
                        <option value="14">Kakinada</option>
                        <option value="15">Kavali</option>
                        <option value="16">Kurnool</option>
                        <option value="18">Machilipatnam</option>
                        <option value="19">Madanapalle</option>
                        <option value="20">Narasaraopet</option>
                        <option value="21">Nellore</option>
                        <option value="22">Ongole</option>
                        <option value="23">Proddatur</option>
                        <option value="25">Srikakulam</option>
                        <option value="26">Tadepalligudem</option>
                        <option value="27">Tadipatri</option>
                        <option value="28">Tenali</option>
                        <option value="29">Tirupati</option>
                        <option value="31">Visakhapatnam</option>
                        <option value="32">Vizianagaram</option>
                        <option value="33">Hyderabad</option>
                        <option value="34">Bangalore</option>
                        <option value="35">Chennai</option>
                        <option value="36">Others</option>
                    </select>
                    </div>
                    </td></tr>
                {{--
                <tr><td style="width:230px; text-align:right;"><label>Approx. Net Salary Range (Monthly):</label></td>
                    <td style="width:420px;"></td></tr>
                
                <tr><td style="width:230px; text-align:right;"><label>Minium Salary (Annual):</label></td>
                    <td style="width:420px;">
                    <div style="display:inline-block;">
                        <input type="number" min="0" max="100" class="form-control" id="i-minsall" name="minsall" value="0" style="float:left; width:70px;">
                        <label style="display:inline-block; width:50px;">Lakhs</label>
                        <span style="display:inline-block;">&nbsp;&nbsp;</span>
                        <input type="number" min="0" max="99999" class="form-control" id="i-minsalt" value="0" name="minsalt" style="display:inline-block; width:100px;">
                        <label style="display:inline-block; width:50px;">Thousands</label>
                    </div></td></tr>
                <tr><td style="width:230px; text-align:right;"><label></label></td>
                    <td style="width:420px;">
                    <div style="display:inline-block;">
                        <span class="form-control" style="border: none !important; width:50px;">to</span>
                    </div></td></tr>
                <tr><td style="width:230px; text-align:right;"><label>Maximum Salary (Annual):</label></td>
                    <td style="width:420px;">    
                    <div style="display:inline-block;">
                        <input type="number" min="0" max="100" class="form-control" id="i-maxsall" name="maxsall" value="0" style="float:left; width:70px;">
                        <label style="display:inline-block; width:50px;">Lakhs</label>
                        <span style="display:inline-block;">&nbsp;&nbsp;</span>
                        <input type="number" min="0" max="99999" class="form-control" id="i-maxsalt" value="0" name="maxsalt" style="display:inline-block; width:100px;">
                        <label style="display:inline-block; width:50px;">Thousands</label>
                    </div></td></tr>
                <tr><td style="width:230px;  vertical-align:top; text-align:right;"><label>Location(s) you are hiring for:</label></td>
                    <td style="width:420px;">
                    <div  style="display:inline-block;">
                    <select multiple class="form-control" id="i-hireloc" name="hireloc[]" style="display:inline-block; width:420px; height:100px">
                        <option value="30" selected>Vijayawada</option>
                        <option value="11">Guntur</option>
                        <option value="24">Rajahmundry</option>
                        <option value="1">Adoni</option>
                        <option value="2">Amaravati</option>
                        <option value="3">Anantapur</option>
                        <option value="4">Bhimavaram</option>
                        <option value="5">Chilakaluripet</option>
                        <option value="6">Chittoor</option>
                        <option value="7">Dharmavaram</option>
                        <option value="8">Eluru</option>
                        <option value="9">Gudivada</option>
                        <option value="10">Guntakal</option>
                        <option value="12">Hindupur</option>
                        <option value="13">Kadapa</option>
                        <option value="14">Kakinada</option>
                        <option value="15">Kavali</option>
                        <option value="16">Kurnool</option>
                        <option value="17">Kurnool</option>
                        <option value="18">Machilipatnam</option>
                        <option value="19">Madanapalle</option>
                        <option value="20">Narasaraopet</option>
                        <option value="21">Nellore</option>
                        <option value="22">Ongole</option>
                        <option value="23">Proddatur</option>
                        <option value="25">Srikakulam</option>
                        <option value="26">Tadepalligudem</option>
                        <option value="27">Tadipatri</option>
                        <option value="28">Tenali</option>
                        <option value="29">Tirupati</option>
                        <option value="31">Visakhapatnam</option>
                        <option value="32">Vizianagaram</option>
                    </select>
                    </div>
                    </td></tr>
                --}}
                <tr><td style="width:230px;"><label></label></td>
                    <td style="width:420px;"><label style="float:right;     font-size:small;">Select Maximum 3 locations for your job posting.</label></td></tr>
                <tr><td style="width:230px;"><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Post</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

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
</script>
@endsection 