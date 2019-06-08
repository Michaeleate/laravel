@extends('users.layouts.app')
<h1>This is from welcome blade php</h1>
{{--Mike Begins
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
        <a class="nav-link" href="index.html">Home
            <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home')}}">Candidate</a>
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
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/rechome')}}">Recruiter</a>
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