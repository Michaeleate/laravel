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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/') }}css/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/') }}css/jssocials-theme-flat.css" />
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body style="background-color:rgba(99, 57, 116, 0.1);">
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
        <li class="breadcrumb-item active">
            @if (\Route::current()->getName() == 'admin.lastjob')
                <a href="{{ url('/admin/lastjob')}}">View last Job</a>
            @elseif (\Route::current()->getName() == 'admin.valljobs')
                <a href="{{ url('/admin/valljobs')}}">View all jobs</a>
            @endif
        </li>
    </ol>
    <!-- banner-text -->
    <!--/process-->
    <section class="banner-bottom py-xl-3 py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec py-xl-3 py-lg-5  py-3">
                @if (\Route::current()->getName() == 'admin.lastjob')
                    <h3 class="tittle text-center mb-xl-4 mb-lg-4 mb-3">
                    <span>Job Successfully Posted</span></h3>
                @elseif (\Route::current()->getName() == 'admin.valljobs')
                    <h3 class="tittle text-center mb-xl-4 mb-lg-4 mb-3">
                    <span>View all active jobs</span></h3>
                @endif
                <div class="row choose-main mt-5">
                    <div class="col-lg-2 job_info_right" style="background-color:white; border: none !important;">
                        @yield('CreateProfileMenu')
                    </div>
                    <div class="col-lg-8 job_info_left" style="background-color:white; border: none !important;">
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
                            <p>Phone : +91 866 2492350</p>
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
        
        var job_id = <?php echo json_encode($job_id) ?>,
            jtitle = <?php echo json_encode($jtitle) ?>,
            jd = <?php echo json_encode($jd) ?>,
            qty = <?php echo json_encode($qty) ?>,
            keywords = <?php echo json_encode($keywords) ?>,
            minexp = <?php echo json_encode($minexp) ?>,
            maxexp = <?php echo json_encode($maxexp) ?>,
            minsal = <?php echo json_encode($minsal) ?>,
            maxsal = <?php echo json_encode($maxsal) ?>,
            hireloc1 = <?php echo json_encode($hireloc1) ?>,
            hireloc2 = <?php echo json_encode($hireloc2) ?>,
            hireloc3 = <?php echo json_encode($hireloc3) ?>
        ;
    
        window.onload = function() {
            //$message = "Inside Onload Function";
            //alert($message);
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;

            $('#i-jobdesc').val([jd]).change();

            //$message = "#shareRoundIcons".concat(sharei);
            //alert($message);
            
            $("#shareRoundIcons").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["facebook", "twitter", "linkedin","whatsapp", "email", "pinterest"]
            });
            
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

            //$('#i-jobdesc').val([jd]).change();
            
            //For Specialized Area Options.
            var last_valid_selection = null;
            $('#i-hireloc').change(function(event) {

                if ($(this).val().length > 3) {

                    $(this).val(last_valid_selection);
                } 
                else {
                    last_valid_selection = $(this).val();
                }
            });
            
            /*
            $("#shareRoundIcons").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["facebook", "twitter", "linkedin","whatsapp", "email", "pinterest"]
            });
            */
        }
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
    <!--//social share links plugin-->
    <script src="{{ URL::asset('/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('/js/jssocials.min.js') }}"></script>
    <!--//Fontawesome script-->
    <script src="{{ URL::asset('/js/fontawesome-all.js') }}"></script>
</body>

</html>