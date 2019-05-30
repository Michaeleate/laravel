@extends('recruiter.layouts.rprof')
<?php 
    use \App\Http\Controllers\PostsController;
    $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';

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

    $message = "fname is" . $fname;
    echo "<script type='text/javascript'>alert('$message');</script>";
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
            <a href="#head1">E-mail & Password</a>
        </li>
        <li>
            <a href="#attach1">Personal</a>
        </li>
        <li>
            <a href="#attach1">Business</a>
        </li>
        <li>
            <a href="#attach1">Communication</a>
        </li>
    </ul>
</div>
<div class="col_3 permit my-4">
    <h3 class="j-b mb-3">SAMS Profile</h3>
    <ul class="list_2">
        <li>
            <a href="#key1">About You</a>
        </li>
        <li>
            <a href="#key1">Social & Cultural</a>
        </li>
        <li>
            <a href="#key1">Professional Photo</a>
        </li>
        <li>
            <a href="#key1">Specialized Areas</a>
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
                <tr><td><label>What's your name?</label></td>
                    <td><input type="text" class="form-control" placeholder="First Name" name="fname" id="i-fname" style="width:250px; height:30px;"></td></tr>
                <tr><td><label></label></td>
                    <td><input type="text" class="form-control" placeholder="Last Name" name="lname" id="i-lname" style="width:250px; height:30px;"></td></tr>
                <tr><td><label>Where are you located?</label></td>
                    <td><input type="text" class="form-control" placeholder="Vijayawada" name="loc" id="i-loc" style="width:250px; height:30px;"></td></tr>
                <tr><td><label>Mobile Number to contact? (+91)</label></td>
                    <td><input type="text" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" id="i-mobnum" name="mobnum" style="width:250px; height:30px;"></td></tr>
                <tr><td><label></label></td>
                    <td><button type="submit" class="btn btn-primary"  style="width:100px; height:30px; float:right; line-height: 15px; text-align:center;"> Save</button></td></tr>
                </table>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

<script>
window.load = function(){
    /*
    function attachfocus(){
        document.getElementById("head1").style.display = "none";
        document.getElementById("attach1").style.display = "block";
        document.getElementById("key1").style.display = "none";
        document.getElementById("person1").style.display = "none";
    }
    attachfocus();
    */
}


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