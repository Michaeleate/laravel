@extends('users.layouts.app')
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
            Jobs
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/uvalljobs') }}">View all jobs</a>
            <a class="dropdown-item" href="services.html">Apply Jobs</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Status
            <i class="fas fa-angle-down"></i>
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

@section('content')
<div class="w3ls-container text-center">
    <div class="w3layouts-image text-center">
        <img src="images/board.png" alt="" />
        <h2 class="header-w3ls">404</h2>
    </div>	
    <h3 class="img-txt">Oops, you've encountered an error!</h3>
    <p>Looks like the page you are  trying to visit doesn't exist.</p>
    <div class="agileits-link">
        <a href="index.html">take me home</a>
    </div>	
</div>
@endsection