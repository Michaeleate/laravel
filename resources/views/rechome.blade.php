@extends('users.layouts.app')
<h1>This is from Recruiters home page in blade php</h1>
@section('search')
<h4>
    <span>Search | Apply | Join</span> -
    <span>Search | Refer | Earn</span>
</h4>
<p>Start and escalate in your career path.</p>
{{--<p>Your job search starts and ends with us.</p> --}}

<form action="#" method="post" class="ban-form row">
    <div class="col-md-3 banf">
        <input class="form-control" type="text" name="job-key" placeholder="Search Job" required="">
    </div>
    <div class="col-md-3 banf">
        <select class="form-control" id="country12">
            <option>Location</option>
            <option>Vijayawada</option>
            <option>Guntur</option>
            <option>Vizag</option>
            <option>Tirupathi</option>
            <option>Rajahmandry</option>
            <option>Hyderabad</option>
            <option>Bangalore</option>
        </select>
    </div>
    <div class="col-md-3 banf">
        <select id="country13" class="form-control">
            <option>Finance Sector</option>
            <option>Banking Sector</option>
            <option>Engineering Sector</option>
            <option>Accounting Jobs</option>
            <option>Interior Design</option>
            <option>Export Import Jobs</option>
        </select>

    </div>
    <div class="col-md-3 banf">
        <button class="btn1" type="submit">SEARCH JOB
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
@endsection

{{-- Build Menu for Registered Candidates --}}
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