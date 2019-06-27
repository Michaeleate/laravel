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

{{--@if($userrec->total()==0) --}}
@if((isset($userrec)))
@if($userrec->total()==0)
<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:100px;">
    <div class="row emply-info">
        <div class="col-md-12" style="float:left;">
            <label style="width:100%; color:blue;">No Search results. Refine your search.</label>
        </div>
    </div>
</div>
@else
{{ $userrec->links() }}
@foreach($userrec as $user)

<div class="emply-resume-list row mb-1" id="resmain" style="display:block; width:100%; height:440px;">
    <div class="row emply-info">
        <div class="col-md-9" style="float:left;">
            <label style="width:100%; color:blue !important;">{{ $user->name}}</label>
            <label style="width:100%;">User Type: 
            @if($user->user_type==1)
            Candidate
            @elseif($user->user_type==2)
            Recruiter
            @elseif($user->user_type==3)
            Admin
            @endif
            </label>
            <label style="width:100%;">User Email: {{$user->email}}</label>
            <label style="width:100%;">Email Verified: {{$user->email_verified_at}}</label>
            <label style="width:100%;">Mobile Num: {{$user->mob_num}}</label>
            <label style="width:55%;">Mobile Verified: 
            @if(!isset($user->mob_verified_at))
                <a href="{{ route('admin.mob_rverified', $user)}}">
                <button class="btn btn-primary" style="width:160px; height:30px; float:right; line-height: 15px; text-align:center; display:inline-block;">Verify Mobile Number</button></a>
            @else
            {{$user->mob_verified_at}}
            @endif
            </label>
            <label style="width:100%;">Admin Id: {{$user->admin_id}}</label>
            <label style="width:100%;">Is Admin: 
            @if($user->is_admin==1)
            Yes
            @else
            No
            @endif
            </label>
            <label style="width:100%;">Created at: {{$user->created_at}}</label>
            <label style="width:100%;">Updated at: {{$user->updated_at}}</label>
            <a href="{{ route('admin.viewuser', $user)}}" target="_blank">
                <button class="btn btn-primary" style="width:160px; height:30px; float:left; line-height: 15px; text-align:center; display:inline-block;">View Complete Details</button></a>
        </div>
    </div>
</div>
@endforeach
{{ $userrec->links() }}
@endif
@endif
@endsection