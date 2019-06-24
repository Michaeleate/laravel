@extends('admin.layouts.aapp')
{{--<h1>This is from Admins home page in blade php</h1>--}}
@section('search')
<h4>
    <span>Search | Apply | Join</span> -
    <span>Search | Refer | Earn</span>
</h4>
<p>Kick start and escalate in your career path.</p>
{{--<p>Your job search starts and ends with us.</p> --}}

<form action="{{ url('/searchjobs')}}" method="get" class="ban-form row">
    @csrf
    <div class="col-md-3 banf">
        <input class="form-control" type="text" name="skey" placeholder="Search Job" required="">
    </div>
    <div class="col-md-3 banf">
        <select class="form-control" id="i-sloc" name="sloc" style="line-height:10px;height:50px; text-align:center;">
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
        </select>
    </div>
    <div class="col-md-3 banf">
        <select id="i-sminexp" name="sminexp" class="form-control" style="line-height:10px; height:50px; text-align:center;">
            <option value="" disabled selected>Minimum Exp</option>
            <option value="0">Fresher</option>
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
    <div class="col-md-3 banf">
        <button class="btn1" type="submit">SEARCH JOB
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
@endsection

{{-- Build Menu for Registered admins --}}
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
            Candidates
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.ctoday') }}">Registered Today</a>
            <a class="dropdown-item" href="#">Not Used</a>
            <a class="dropdown-item" href="#">Not Used</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
    </li>
</ul>

@endsection