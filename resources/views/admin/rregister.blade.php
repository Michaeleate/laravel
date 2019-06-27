@extends('admin.layouts.auser')
<?php 
    use \App\Http\Controllers\AdmController; 
    
    //$head_line=$oldresu='';
    

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
            Functions
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.ctoday') }}">Candidates Today</a>
            <a class="dropdown-item" href="{{ route('admin.rtoday') }}">Recruiters Today</a>
            <a class="dropdown-item" href="{{ route('admin.rregister') }}">Register Recruiter</a>
            <a class="dropdown-item" href="{{ route('admin.capplied') }}">Candidates Applied</a>
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
{{-- Resume Precisely--}}

<div class="emply-resume-list row mb-1" id="regmain" style="display:inline-block; width:70%">
    <div class="col-md-12 emply-info">
        <div class="emply-resume-info-sams">
            <form role="form" action="{{ route('admin.registerrec') }}" method="post">
                @csrf
                <h4>Register Recruiter</h4>
                <div class="form-group">
                    <label class="mb-2">Name:</label>
                    <input type="text" class="form-control" id="i-fname" name="fname" autofocus>
                </div>
                <div class="form-group">
                    <label class="mb-2">E-mail: </label>
                    <input type="text" class="form-control" id="i-email" name="email">
                </div>
                <div class="form-group">
                    <label class="mb-2">Mobile Num: </label>
                    <input id="imobnum" type="tel" class="form-control" name="mobnum" required autocomplete="tel">
                </div>
                <button type="submit" class="btn btn-primary"  style="float:right;">Register</button>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>
@endsection