@extends('users.layouts.pay')
<?php 

//$payu_base_url = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$payu_base_url = "https://secure.payu.in";			// For Production Mode

$action = '';
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} 
else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
//$hashSequence = "key|txnid|amount|productinfo|firstname|email";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['curl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $posted['salt'];
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $payu_base_url . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $payu_base_url . '/_payment';
}

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
<div class="emply-resume-list row mb-1" id="resmain" style="display:inline-block; width:100%; height:auto !important;">  {{-- 700px --}}
    <div class="row emply-info">
        <div class="col-md-12" style="margin-left:20%;">
        Processing.....
        <form action="{{$action}}" method="post" name="payuForm"><br />
            @csrf
            <input type="hidden" name="key" value="{{$posted['key']}}" />
            <input type="hidden" name="hash" value="{{$hash}}"/>
            <input type="hidden" name="txnid" value="{{$posted['txnid']}}" />
            <table style="width:50%; float:left; text-align:center;">
                <tr>
                <td>Amount: </td>
                <td><input name="amount" value="{{$posted['amount']}}" readonly/></td>
                <tr>
                </tr>
                <td>First Name: </td>
                <td><input name="firstname" id="firstname" value="{{$posted['firstname']}}"  readonly/></td>
                </tr>
                <tr>
                <td>Email: </td>
                <td><input name="email" id="email" value="{{$posted['email']}}"  readonly/></td>
                <tr>
                </tr>
                <td>Mobile: </td>
                <td><input name="phone" value="{{$posted['phone']}}"  readonly/></td>
                </tr>
                <tr>
                <td>Product Info: </td>
                <td><input name="productinfo" value="{{$posted['productinfo']}}"  readonly/></td>
                </tr>
                @if($posted['productinfo']=='unlimited')
                    <tr>
                    <td colspan="2">
                        <label style="background-color:lightgreen; border-style:dotted;color:green;">Unlimited Job Applies for 1 Month (30 Days). No strings attached, just apply to unlimited jobs if you are eligible. No credits added to your account.</label>
                    </td>
                    </tr>
                @endif
                <tr>
                <td><input type="hidden" name="surl" value="{{$posted['surl']}}" size="64" /></td>
                </tr>
                <tr>
                <td><input type="hidden" name="furl" value="{{$posted['furl']}}" size="64" /></td>
                </tr>
                <tr>
                <td><input type="hidden" name="curl" value="{{$posted['curl']}}" size="64" /></td>
                </tr>
                <tr>
                <td><input type="hidden" name="service_provider" value="{{$posted['service_provider']}}" size="64" /></td>
                </tr>
                <tr>
                <td><input type="hidden" name="udf1" value="{{$posted['udf1']}}" size="64" /></td>
                </tr>
                <tr style="float:right important!;">
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary"  style="background-color:DodgerBlue;" value=" Confirm Payment" />
                    </td>
                </tr>
            </table>
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