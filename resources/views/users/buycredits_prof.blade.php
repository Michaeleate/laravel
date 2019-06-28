@extends('users.layouts.prof')
<?php 
    use \App\Http\Controllers\PostsController; 
    
    $head_line=$oldresu='';
    $kskil1=$kskil2=$kskil3=$kskil4=$kskil5='';
    $resutime=NULL;
    $fname=$email=$mob_num=$gender=$dob=$marstat=$eng_lang=$tel_lang=$hin_lang=$oth_lang=$diff_able=$able1=$able2=$able3=$profpic=$picpath=$picname=NULL;
    $picload="Uploaded - ";
    $qual1=$board1=$pyear1=$colname1=$edulang1=$percentage1=$edutime1='';
    $qual2=$board2=$pyear2=$colname2=$edulang2=$percentage2=$edutime2='';
    $qual3=$course3=$spec3=$colname3=$district3=$cortype3=$pyear3=$edulang3=$percentage3=$edutime3='';
    $qual4=$course4=$spec4=$colname4=$district4=$cortype4=$pyear4=$edulang4=$percentage4=$edutime4='';
    $empname=$expyears=$expyears1=$expmonths1=$expmonths=$desg=$startdt=$enddt=$msal=$resp=$nperiod=$emptime=$msalt=$msall='';
    $addtype1=$addline11=$addline21=$city1=$state1=$zcode1=$country1=$addtime1='';
    $addtype2=$addline12=$addline22=$city2=$state2=$zcode2=$country2=$addtime2='';
    $refnum1=$fname1=$location1=$email1=$mobnum1=$reftime1='';
    $refnum2=$fname2=$location2=$email2=$mobnum2=$reftime2='';

    //$head=PostsController::get_head();
    //foreach($head as $key=>$val){
    //    $head_line=$val["head_line"];
    //}
    //Testing
?>
{{-- Build Main Menu for Registered Candidates --}}
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
            {{-- <a class="dropdown-item" href="{{ url('/edit-user-visible') }}">Profile Visibility</a> --}}
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
            <a class="dropdown-item" href="{{ url('/checkschd') }}">Interview Schedule</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Credits
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/buycredits') }}">Buy Credits</a>
            <a class="dropdown-item" href="#">Credits Statement</a>
            <a class="dropdown-item" href="#">Invoice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
    </li>
</ul>
@endsection

{{-- Build Sub Menu for Create Profile for Registered Candidates --}}
@section('CreateProfileMenu')
{{--Can have left menu afterwards --}}
@endsection

{{-- Create Resume Format Layout --}}
@section('CreateResumeForm')
{{-- Resume Precisely--}}
<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:400px !important;">
    <div class="row emply-info">
        <div class="col-md-12" style="margin-left:12%;">
        {{-- <span style="width:100%;">Credits Pack Details</span> --}}
        <form role="form" action="{{url('/payment')}}" method="post">
                @csrf
            <table style="width:70%; float:left; text-align:center;">
                <tr style="background-color:#afadad;">
                    <th colspan="5" style="color:pink;">
                        Choose best pack that suits you
                    </th>
                </tr>
                <tr style="background-color:#afadad;">
                    <th>
                        Select Pack
                    </th>
                    <th>
                        Pack Name
                    </th>
                    <th>
                        No. of Credits
                    </th>
                    <th>
                        Amount
                    </th>
                    <th style="width:150px;">
                        Popularity
                    </th>
                </tr>
                <tr style="background-color:#E8DAEF;">
                    <td>
                        <input type="radio" name="packname" value="basic">
                    </td>
                    <td>
                        <label>Basic</label>
                    </td>
                    <td>
                        <label>8</label>
                    </td>
                    <td>
                        <label><i class="fas fa-rupee-sign"></i>&nbsp;200</label>
                    </td>
                    <td>
                        <label>Low</label>
                    </td>
                </tr>
                <tr style="background-color:#D4E6F1;">
                    <td>
                        <input type="radio" name="packname" value="economy" checked>
                    </td>
                    <td>
                        <label>Economy</label>
                    </td>
                    <td>
                        <label>24</label>
                    </td>
                    <td>
                        <label><i class="fas fa-rupee-sign"></i>&nbsp;500</label>
                    </td>
                    <td>
                        <label>Most Popular</label>
                    </td>
                </tr>
                <tr style="background-color:#D1F2EB;">
                    <td>
                        <input type="radio" name="packname" value="silver">
                    </td>
                    <td>
                        <label>Silver</label>
                    </td>
                    <td>
                        <label>48</label>
                    </td>
                    <td>
                        <label><i class="fas fa-rupee-sign"></i>&nbsp;1000</label>
                    </td>
                    <td>
                        <label>High</label>
                    </td>
                </tr>
                <tr style="background-color:#D4EFDF;">
                    <td>
                        <input type="radio" name="packname" value="gold">
                    </td>
                    <td>
                        <label>Gold</label>
                    </td>
                    <td>
                        <label>72</label>
                    </td>
                    <td>
                        <label><i class="fas fa-rupee-sign"></i>&nbsp;1500</label>
                    </td>
                    <td>
                        <label>High</label>
                    </td>
                </tr>
                <tr style="background-color:#FCF3CF;">
                    <td>
                        <input type="radio" name="packname" value="platinum">
                    </td>
                    <td>
                        <label>Platinum</label>
                    </td>
                    <td>
                        <label>100</label>
                    </td>
                    <td>
                        <label><i class="fas fa-rupee-sign"></i>&nbsp;2000</label>
                    </td>
                    <td>
                        <label>Low</label>
                    </td>
                </tr>
                <tr style="background-color:#FAE5D3;">
                    <td>
                        <input type="radio" name="packname" value="free" disabled>
                    </td>
                    <td>
                        <label>Free</label>
                    </td>
                    <td>
                        <label>8</label>
                    </td>
                    <td>
                        <label>Free</label>
                    </td>
                    <td>
                        <label>Already Added</label>
                    </td>
                </tr>
                <tr style="background-color:#F4F6F6;">
                    <td>
                        <input type="radio" name="packname" value="old" disabled>
                    </td>
                    <td>
                        <label>Old</label>
                    </td>
                    <td>
                        <label>32</label>
                    </td>
                    <td>
                        <label>Paid</label>
                    </td>
                    <td>
                        <label>Already Registered</label>
                    </td>
                </tr>
                <tr style="float:right important!;">
                    <td colspan="5">
                        <button type="submit" class="btn btn-primary"  style="float:right; background-color:DodgerBlue;">Proceed to Payment</button>
                    </td>
                </tr>
            </table>
            <div class="clearfix"> </div>
        </form>
        </div>
    </div>
</div>

<script>
window.load = function(){
    //document.getElementById("head1").value = head_line;
}
</script>

@endsection