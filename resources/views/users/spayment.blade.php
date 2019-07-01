@extends('users.layouts.pay')
<?php 
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$udf1=$_POST["udf1"];

if (isset($_POST["additionalCharges"])) {
    $additionalCharges=$_POST["additionalCharges"];
    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
} 
else {
    $retHashSeq = $salt.'|'.$status.'||||||||||'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}

$hash = hash("sha512", $retHashSeq);

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
            <a class="dropdown-item" href="{{ url('/viewjobstatus') }}">Application Status</a>
            <a class="dropdown-item" href="{{ url('/checkschd') }}">Interview Schedule</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Services
            <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/resume_service') }}">Resume Writing</a>
            <a class="dropdown-item" href="{{ url('/int_prep') }}">Interview Preparation</a>
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
<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:360px !important;">
    <div class="row emply-info">
        <div class="col-md-12" style="margin-left:20%;">
            @if ($hash != $posted_hash)
                <label>"Invalid Transaction. Please try again";</label>
            @else
                <table style="width:50%; float:left; text-align:left;">
                    <tr style="background-color:#D4EFDF; text-align:center;">
                        <th colspan="2">
                            <label><u>Payment Status</u></label>
                        </th>
                    </tr>
                    <tr style="background-color:#F4F6F6;">
                        <td>
                            <label>Status:</label>
                        </td>
                        <td>
                            <label>{{$status}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#FAE5D3;">
                        <td>
                            <label>Name:</label>
                        </td>
                        <td>
                            <label>{{$firstname}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#E8DAEF;">
                        <td>
                            <label>E-mail:</label>
                        </td>
                        <td>
                            <label>{{$email}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#D4E6F1;">
                        <td>
                            <label>Phone:</label>
                        </td>
                        <td>
                            <label>{{$phone}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#D1F2EB;">
                        <td>
                            <label>Amount:</label>
                        </td>
                        <td>
                            <label>{{$amount}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#D4EFDF;">
                        <td>
                            <label>Package Name:</label>
                        </td>
                        <td>
                            <label>{{$productinfo}}</label>
                        </td>
                    </tr>
                    <tr style="background-color:#FCF3CF;">
                        <td>
                            <label>Transaction ID:</label>
                        </td>
                        <td>
                            <label>{{$txnid}}</label>
                        </td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
</div>

<script>
window.load = function(){
    //document.getElementById("head1").value = head_line;
}
</script>

@endsection