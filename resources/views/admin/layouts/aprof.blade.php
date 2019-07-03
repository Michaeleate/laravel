<!DOCTYPE html>
<html lang="en">

<head>
    <title>SAMS Jobs Website|Search Apply Join|Vijayawada|Guntur|Hyderabad|Vizag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Jobs in Vijayawada, Job Consultancy, Telecallers Jobs, Free Jobs, Marketing Jobs, Software Jobs, Admin Jobs, HR Jobs, Vijayawada, Amaravathi, Guntur" />
    <!-- FB tags -->
    <meta property="og:url" content="https://www.samsjobs.in" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Jobs in Vijayawada, Guntur and Amaravathi" />
    <meta property="og:description" content="Recruiters post vacant Jobs in Vijayawada, Guntur and Amaravathi" />
    <meta property="og:image" content="https://www.samsjobs.in/images/fb_og_image.jpg" />
    <meta property="fb:app_id" content="2430741300311136" />
    <!-- Favicon tags -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/images/icons/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
 
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{ URL::asset('/') }}css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('/') }}css/zoomslider.css" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('/') }}css/style6.css" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('/') }}css/style.css" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('/') }}css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>
    <!-- banner-inner -->
    <div id="demo-2" class="page-content">
        <div class="dotts">
            <div class="header-top">
                <header>
                    <div class="top-head xl-lg-auto ml-lg-auto text-center">
                        <div class="row top-vl">
                            <div class="col-md-6">
                                <label style="color: #ffff; float:right;">
                                    @if(Auth::guard('admin')->check())
                                        {{ Auth::guard('admin')->user()->name }}
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label style="color: #ffff;">Credits: 5000</label>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="{{ route('alogout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Log-out</a>
                                <form id="logout-form" action="{{ route('alogout') }}" method="POST">
                                        @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <h1>
                                <a class="navbar-brand" href="{{ asset('/admin/home')}}">
                                    <img src="{{ URL::asset('/images/favicon-sams.png')}}" alt="logo">
                                </a>
                            </h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fas fa-bars"></i>
                            </span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @yield('buildMenu')
                        </div>
                    </nav>
                </header>

            </div>
            <!--/banner-info-->
            <div class="banner-info text-center">
            </div>
            <!--//banner-info-->
        </div>
    </div>
    <ol class="breadcrumb justify-content-left">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <!-- banner-text -->
    <!--/process-->
    <section class="banner-bottom py-xl-3 py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec py-xl-3 py-lg-5  py-3">
                @if (\Route::current()->getName() == 'cadmprofile')
                    <h3 class="tittle text-center mb-xl-4 mb-lg-4 mb-3">
                    <span>Build your profile</span></h3>
                @elseif (\Route::current()->getName() == 'vadmprofile')
                    <h3 class="tittle text-center mb-xl-4 mb-lg-4 mb-3">
                    <span>Your complete profile</span></h3>
                @endif
                <div class="row choose-main mt-5">
                    <div class="col-lg-2 job_info_right">
                        @yield('CreateProfileMenu')
                    </div>
                    <div class="col-lg-8 job_info_left">
                        @yield('CreateResumeForm')
                    </div>
                    <div class="col-lg-2 job_info_last">
                        @yield('displayads')
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//process-->

    <!--footer -->
    <footer class="footer-emp bg-dark dotts py-lg-5 py-3">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row footer-top">
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>About Us</h3>
                    </div>
                    <div class="footer-text">
                        <p>SAMS Pvt Ltd. launched in 2014 provides Software Development and Training, Placement Services and Facility Management services. It provides corporate/online/ in-house training as per client needs along with communication skills in Vijayawada and Guntur.</p>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Get in touch</h3>
                    </div>
                    <div class="contact-info">
                        <h4>Location :</h4>
                        <p>Dr No: 36-11/140, Opp. RR Chicken Centre, Jammi chettu center, Moghalrajpuram, Vijayawada - 520 010.</p>
                        <div class="phone">
                            <h4>Contact :</h4>
                            <p>Phone : +91 96184 43240</p>
                            <p>Email :
                                <a href="mailto:callforsams@gmail.com">callforsams@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Follow SAMS for updates</h3>
                    </div>
                    <div>
                        <script type="IN/FollowCompany" data-id="10427775" data-counter="right" data-width="100%"></script>
                    </div>
                    <div class="g-ytsubscribe" data-channelid="UCspMS2SkiPQDM10gWcAGCtQ" data-layout="default" data-count="default"></div>
                    <div>
                        <a href="https://twitter.com/callforsams?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-count="true">Follow @callforsams</a>
                    </div>
                    <div class="fb-page" data-href="https://www.facebook.com/callforsams/" data-tabs="" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/callforsams/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/callforsams/">SAMS Private Limited</a>
                        </blockquote>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>For Directions</h3>                        
                    </div>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.406325761032!2d80.64161031423926!3d16.50557198861264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35fab1df5e65e9%3A0xdf53b220547d0a89!2sSAMS+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1557052498650!5m2!1sen!2sin" width="280" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="copyright mt-4">
                 <p class="copy-right text-center ">&copy; 2014-19 SAMS Pvt Ltd. All Rights Reserved .</p>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!--model-forms-->
    <!--/Login-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Login Now</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label class="mb-2">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary submit mb-4">Sign In</button>
                            <p class="text-center pb-4">
                                <a href="#" data-toggle="modal2" data-target="#exampleModalCenter"> Don't have an account?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//Login-->
    <!--/Register-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Register Now</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>First name</label>

                                <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                            </div>

                            <div class="form-group">
                                <label class="mb-2">Password</label>
                                <input type="password" class="form-control" id="password1" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="password2" placeholder="" required="">
                            </div>

                            <button type="submit" class="btn btn-primary submit mb-4">Register</button>
                            <p class="text-center pb-4">
                                <a href="#">By clicking Register, I agree to your terms</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//Register-->

    <!--//model-form-->
    <!-- js -->
    <!--/slider-->
    <script src="{{ URL::asset('/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ URL::asset('/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jquery.zoomslider.min.js') }}"></script>
    <!--//slider-->
    <!--search jQuery-->
    <script src="{{ URL::asset('/js/classie-search.js') }}"></script>
    <script src="{{ URL::asset('/js/demo1-search.js') }}"></script>
    <!--//search jQuery-->
    

    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->
    
    <!-- php javascript variables -->
    <script language="Javascript" type="text/javascript">
        
        var fname = <?php echo json_encode($fname) ?>,
            lname = <?php echo json_encode($lname) ?>,
            loc = <?php echo json_encode($loc) ?>,
            email = <?php echo json_encode($email) ?>,
            mobnum = <?php echo json_encode($mobnum) ?>,
            skype = <?php echo json_encode($skype) ?>,
            picpath = <?php echo json_encode($picpath) ?>,
            picname = <?php echo json_encode($picname) ?>,
            seslink = <?php echo json_encode($seslink) ?>,
            orgname = <?php echo json_encode($orgname) ?>,
            weburl = <?php echo json_encode($weburl) ?>,
            addline1 = <?php echo json_encode($addline1) ?>,
            addline2 = <?php echo json_encode($addline2) ?>,
            city = <?php echo json_encode($city) ?>,
            state = <?php echo json_encode($state) ?>,
            country = <?php echo json_encode($country) ?>,
            profname = <?php echo json_encode($profname) ?>,
            profurl = <?php echo json_encode($profurl) ?>,
            shortprof = <?php echo json_encode($shortprof) ?>,
            remote = <?php echo json_encode($remote) ?>,
            servcity = <?php echo json_encode($servcity) ?>,
            servstate = <?php echo json_encode($servstate) ?>,
            servcountry = <?php echo json_encode($servcountry) ?>,
            linkurl = <?php echo json_encode($linkurl) ?>,
            fburl = <?php echo json_encode($fburl) ?>,
            tweeturl = <?php echo json_encode($tweeturl) ?>,
            instaurl = <?php echo json_encode($instaurl) ?>,
            lang1 = <?php echo json_encode($lang1) ?>,
            lang2 = <?php echo json_encode($lang2) ?>,
            lang3 = <?php echo json_encode($lang3) ?>,
            sarea1 = <?php echo json_encode($sarea1) ?>,
            sarea2 = <?php echo json_encode($sarea2) ?>,
            sarea3 = <?php echo json_encode($sarea3) ?>,
            sainfo = <?php echo json_encode($sainfo) ?>,
            sapos = <?php echo json_encode($sapos) ?>,
            saclients = <?php echo json_encode($saclients) ?>,
            qual1 = <?php echo json_encode($qual1) ?>,
            board1 = <?php echo json_encode($board1) ?>,
            colname1 = <?php echo json_encode($colname1) ?>,
            pyear1 = <?php echo json_encode($pyear1) ?>,
            edulang1 = <?php echo json_encode($edulang1) ?>,
            percentage1 = <?php echo json_encode($percentage1) ?>,
            edutime1 = <?php echo json_encode($edutime1) ?>,
            qual2 = <?php echo json_encode($qual2) ?>,
            board2 = <?php echo json_encode($board2) ?>,
            colname2 = <?php echo json_encode($colname2) ?>,
            pyear2 = <?php echo json_encode($pyear2) ?>,
            edulang2 = <?php echo json_encode($edulang2) ?>,
            percentage2 = <?php echo json_encode($percentage2) ?>,
            edutime2 = <?php echo json_encode($edutime2) ?>,
            qual3 = <?php echo json_encode($qual3) ?>,
            course3 = <?php echo json_encode($course3) ?>,
            spec3 = <?php echo json_encode($spec3) ?>,
            colname3 = <?php echo json_encode($colname3) ?>,
            district3 = <?php echo json_encode($district3) ?>,
            cortype3 = <?php echo json_encode($cortype3) ?>,
            pyear3 = <?php echo json_encode($pyear3) ?>,
            edulang3 = <?php echo json_encode($edulang3) ?>,
            percentage3 = <?php echo json_encode($percentage3) ?>,
            edutime3 = <?php echo json_encode($edutime3) ?>,
            qual4 = <?php echo json_encode($qual4) ?>,
            course4 = <?php echo json_encode($course4) ?>,
            spec4 = <?php echo json_encode($spec4) ?>,
            colname4 = <?php echo json_encode($colname4) ?>,
            district4 = <?php echo json_encode($district4) ?>,
            cortype4 = <?php echo json_encode($cortype4) ?>,
            pyear4 = <?php echo json_encode($pyear4) ?>,
            edulang4 = <?php echo json_encode($edulang4) ?>,
            percentage4 = <?php echo json_encode($percentage4) ?>,
            edutime4 = <?php echo json_encode($edutime4) ?>,
            empname = <?php echo json_encode($empname) ?>,
            desg = <?php echo json_encode($desg) ?>,
            startdt = <?php echo json_encode($startdt) ?>,
            enddt = <?php echo json_encode($enddt) ?>,
            msalt = <?php echo json_encode($msalt) ?>,
            msall = <?php echo json_encode($msall) ?>,
            resp = <?php echo json_encode($resp) ?>,
            nperiod = <?php echo json_encode($nperiod) ?>,
            emptime = <?php echo json_encode($emptime) ?>,
            refnum1 = <?php echo json_encode($refnum1) ?>,
            fname1 = <?php echo json_encode($fname1) ?>,
            location1 = <?php echo json_encode($location1) ?>,
            email1 = <?php echo json_encode($email1) ?>,
            mobnum1 = <?php echo json_encode($mobnum1) ?>,
            reftime1 = <?php echo json_encode($reftime1) ?>,
            refnum2 = <?php echo json_encode($refnum2) ?>,
            fname2 = <?php echo json_encode($fname2) ?>,
            location2 = <?php echo json_encode($location2) ?>,
            email2 = <?php echo json_encode($email2) ?>,
            mobnum2 = <?php echo json_encode($mobnum2) ?>,
            reftime2 = <?php echo json_encode($reftime2) ?>
            ;
    
        window.onload = function() {
            //$message = "Inside Onload Function";
            //alert($message);
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
            document.getElementById("i-fname").value = fname;
            document.getElementById("i-lname").value = lname;
            document.getElementById("i-loc").value = loc;
            document.getElementById("i-email").value = email;
            document.getElementById("i-mobnum").value = mobnum;
            document.getElementById("i-mobnum1").value = mobnum;
            document.getElementById("i-fname1").value = fname;
            document.getElementById("i-lname1").value = lname;
            document.getElementById("i-orgname").value = orgname;
            document.getElementById("i-bweburl").value = weburl;
            document.getElementById("i-addline1").value = addline1;
            document.getElementById("i-addline2").value = addline2;
            document.getElementById("i-city").value = city;
            document.getElementById("i-state").value = state;
            document.getElementById("i-country").value = "India";
            document.getElementById("i-skype").value = skype;
            document.getElementById("i-mobnum2").value = mobnum;
            document.getElementById("i-profname").value = profname;
            document.getElementById("i-profurl").value = profurl;
            document.getElementById("i-servcity").value = servcity;
            document.getElementById("i-servstate").value = servstate;
            document.getElementById("i-servcountry").value = "India";
            document.getElementById("i-linkurl").value = linkurl;
            document.getElementById("i-fburl").value = fburl;
            document.getElementById("i-tweeturl").value = tweeturl;
            document.getElementById("i-instaurl").value = instaurl;
            document.getElementById("i-spec").options[sarea1-1].selected=true;
            document.getElementById("i-spec").options[sarea2-1].selected=true;
            document.getElementById("i-spec").options[sarea3-1].selected=true;
            document.getElementById("i-sainfo").value = sainfo;
            document.getElementById("i-sapos").value = sapos;
            document.getElementById("i-saclients").value = saclients;

            //$message = "After sarea";
            //alert($message);

            $("#i-lang1").removeProp("selected");
            $("#i-lang2").removeProp("selected");
            $("#i-lang3").removeProp("selected");
            
            $('#i-lang1').val(lang1);
            $('#i-lang2').val(lang2);
            $('#i-lang3').val(lang3);
            
            $('input[name=remote]').removeAttr('checked');
            if(remote == 1) {
                $("#i-remyes").prop( "checked", true );
            }
            else {
                $("#i-remno").prop( "checked", true );
            }
            
            switch (seslink) {
                case "init":
                    $('#i-initial').hide();
                    $('#i-emailpass').show();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "emailpass":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').show();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "personal":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').show();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "business":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').show();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "comm":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').show();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "aboutu":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').show();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "socio":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').show();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                case "photo":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').show();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "sarea":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').show();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
                    break;
                case "pg":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').show();
                    $('#i-ref').hide();
                    break;
                case "emp":
                    $('#i-initial').hide();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').show();
                    break;
                default:
                    $('#i-initial').show();
                    $('#i-emailpass').hide();
                    $('#i-personal').hide();
                    $('#i-business').hide();
                    $('#i-comm').hide();
                    $('#i-about').hide();
                    $('#i-socio').hide();
                    $('#i-pphoto').hide();
                    $('#i-sarea').hide();
                    $('#i-edu').hide();
                    $('#i-emp').hide();
                    $('#i-ref').hide();
            }
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->
    <!-- //js -->
    <script src="{{ URL::asset('/js/bootstrap.js') }}"></script>
    <!--/ start-smoth-scrolling -->
    <script src="{{ URL::asset('/js/move-top.js') }}"></script>
    <script src="{{ URL::asset('/js/easing.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            var defaults = {
                    containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

            $('#v-shortprof').val([shortprof]).change();
            $('#v-sainfo').val([sainfo]).change();
            $('#v-sapos').val([sapos]).change();
            $('#v-saclients').val([saclients]).change();

            $('a[href="#i-emailpass"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').show();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-personal"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').show();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-business"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').show();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-comm"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').show();
                $('#i-about').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-about"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').show();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-socio"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').show();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-pphoto"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').hide();
                $('#i-pphoto').show();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-sarea"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').show();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-edu"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').show();
                $('#i-emp').hide();
                $('#i-ref').hide();
            });

            $('a[href="#i-emp"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').show();
                $('#i-ref').hide();
            });

            $('a[href="#i-ref"]').click(function(){
                $('#i-initial').hide();
                $('#i-emailpass').hide();
                $('#i-personal').hide();
                $('#i-business').hide();
                $('#i-comm').hide();
                $('#i-about').hide();
                $('#i-socio').hide();
                $('#i-pphoto').hide();
                $('#i-sarea').hide();
                $('#i-edu').hide();
                $('#i-emp').hide();
                $('#i-ref').show();
            });

            //For Specialized Area Options.
            var last_valid_selection = null;
            $('#i-spec').change(function(event) {

                if ($(this).val().length > 3) {

                    $(this).val(last_valid_selection);
                } 
                else {
                    last_valid_selection = $(this).val();
                }
            });

            $("#i-profname").on('keyup',function(){
                profurl=$(this).val().toLowerCase();
                profurl=profurl.replace(" ","-");
                profurl="http://samsjobs.in/recruiter/".concat(profurl);
                $("#i-profurl").val(profurl);
            });

            $("#add10modal").on('shown.bs.modal', function(){
                $('#board1').val([board1]).change();
                $('#passyear1').val([pyear1]).change();
                $('#medium1').val([edulang1]).change();
                $('#marks1').val([percentage1]).change();
                $('#college1').val([colname1]).change();
            });

            $("#add12modal").on('shown.bs.modal', function(){
                $('#board2').val([board2]).change();
                $('#passyear2').val([pyear2]).change();
                $('#medium2').val([edulang2]).change();
                $('#marks2').val([percentage2]).change();
                $('#college2').val([colname2]).change();
            });

            $("#addgradmodal").on('shown.bs.modal', function(){
                $('#course3').val([course3]).change();
                $('#college3').val([colname3]).change();
                $('#district3').val([district3]).change();
                $("#" + cortype3).val([cortype3]).change();
                $('#passyear3').val([pyear3]).change();
                $('#medium3').val([edulang3]).change();
                $('#marks3').val([percentage3]).change(showspecs(this));
                $("#" + gradid).val([spec3]).change();                
            });

            $("#addpgmodal").on('shown.bs.modal', function(){
                $('#course4').val([course4]).change();
                $('#college4').val([colname4]).change();
                $('#district4').val([district4]).change();
                $("#" + cortype4 + "1").val([cortype4]).change();
                $('#passyear4').val([pyear4]).change();
                $('#medium4').val([edulang4]).change();
                $('#marks4').val([percentage4]).change(showspecs5(this));
                $("#" + pgid).val([spec4]).change();                
            });

            $("#addempmodal").on('shown.bs.modal', function(){
                $('#org5').val([empname]).change();
                $('#role5').val([desg]).change();
                $('#role5start').val([startdt]).change();
                $('#role5end').val([enddt]).change();
                $('#ta6').val([resp]).change();
                $('#notice5').val([nperiod]).change();
                $('#role5sall').val([msall]).change();
                $('#role5salt').val([msalt]).change();                
            });

            $("#addref1modal").on('shown.bs.modal', function(){
                $('#refname1').val([fname1]).change();
                $('#refloc1').val([location1]).change();
                $('#refmail1').val([email1]).change();
                $('#refmob1').val([mobnum1]).change();
            });

            $("#addref2modal").on('shown.bs.modal', function(){
                $('#refname2').val([fname2]).change();
                $('#refloc2').val([location2]).change();
                $('#refmail2').val([email2]).change();
                $('#refmob2').val([mobnum2]).change();
            });
        });
    </script>
    <!--// end-smoth-scrolling -->
    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3">
    </script>
    <!-- Twitter script -->
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!-- Linkedin script -->
    <script src="https://platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
    <!-- Youtube script -->
    <script src="https://apis.google.com/js/platform.js"></script>

</body>

</html>