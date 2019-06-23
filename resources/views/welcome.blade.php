@extends('users.layouts.app')
{{--Mike Begins
<h1>This is from welcome blade php</h1>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
Mike Ends --}}


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
            <a class="dropdown-item" href="{{ url('/applyjobs') }}">Apply Jobs</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Status
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/viewjobstatus') }}">Application Status</a>
            <a class="dropdown-item" href="services.html">Interview Schedule</a>
        </div>
    </li>
  
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Credits
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/buycredits') }}">Buy Credits</a>
            <a class="dropdown-item" href="employer_list.html">Credits Statement</a>
            <a class="dropdown-item" href="employer_single.html">Invoice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
    </li>
</ul>
@endsection