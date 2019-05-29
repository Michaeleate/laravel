@extends('recruiter.layouts.rprof')
<?php 
    use \App\Http\Controllers\PostsController; 
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
<div class="emply-resume-list row mb-1" id="head1" style="display:inline-block; width:100%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{url('/resumehead')}}" method="post">
                @csrf
                <h4>Resume Headline {{ session('hl') }}</h4>
                <label>Resume Headline is the first point of contact with Recruiters, so make it striking to get noticed.</label>
                <textarea id="ta1" class="form-control" name="headline" style="height:120px; width:100%; resize:none;" onkeyup="countChars(this,'lab1',250);"></textarea>
                <label id="lab1" style="float:left">250 Character(s) Left</label>
                <button type="submit" class="btn btn-primary"  style="float:right;">Save</button>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>

<script>
window.load = function(){
    
    function attachfocus(){
        document.getElementById("head1").style.display = "none";
        document.getElementById("attach1").style.display = "block";
        document.getElementById("key1").style.display = "none";
        document.getElementById("person1").style.display = "none";
    }
    attachfocus();
    
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