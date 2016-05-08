
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free-educational-responsive-web-template-webEdu">
    <meta name="author" content="webThemez.com">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Kiddo</title>
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet"  media="screen"  href="{!! asset('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! 'assets/css/sweetalert2.css' !!}">

    <!-- Custom styles for our template -->

    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap-theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <!-- For Time-->

    <link rel="stylesheet" type="text/css" href="/css/jquery.countdownTimer.css" />
</head>

<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="{!! asset('assets/images/logo.png') !!}" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="c1 active"><a href="#">Home</a></li>
                <li class="c7"><a href="/disscussionforum">Disscussions</a></li>
                <li class="c6 dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Child Accounts <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="addChildAccount">Add a new child account</a></li>
                        <li><a href="viewChildAccounts">View my child accounts</a></li>
                    </ul>
                </li>
                <li class="c3 dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        {{--@foreach($notif as $n)--}}
                        {{--<li><a href="/select/{{$n->upldId}}">{{$n->noti}}</a></li>--}}

                        {{--@endforeach--}}
                    </ul>
                </li>

                <li class="c7"><a href="/homeContact">Contact</a></li>

                <li class="c6 dropdown">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->

@yield('content')

<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="footerbottom">
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Course Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        Grade Two
                                    </a>
                                </li>
                                <li><a href="#">
                                        Grade Three
                                    </a>
                                </li>
                                <li><a href="#">
                                        Grade Four
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Subject Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li> <a href="#">
                                        Maths  </a>
                                </li>
                                <li><a href="#">
                                        English
                                    </a>
                                </li>
                                <li><a href="#">
                                        Environment Studies
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Additional features
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        Event Calender
                                    </a>
                                </li>
                                <li> <a href="#">
                                        Disscussion Forum
                                    </a>
                                </li>
                                <li><a href="#">
                                        Drawing App
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Digital Library
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Profile Management
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>Contact</h4>
                        <p>Lorem reksi this dummy text unde omnis iste natus error sit volupum</p>
                        <div class="contact-info">
                            <i class="fa fa-map-marker"></i> SLIIT - Malabe,Srilanka<br>
                            <i class="fa fa-phone"></i>(+94)0716484080 <br>
                            <i class="fa fa-envelope-o"></i> maxsajith@hotmail.com
                        </div>
                    </div><!-- end widget -->
                </div>
            </div>
        </div>
        <div class="social text-center">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-flickr"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
        </div>

        <div class="clear"></div>
        <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="simplenav">
                            <a href="index.html">Home</a> |
                            <a href="about.html">Disscussion</a> |
                            <a href="courses.html">Courses</a> |
                            <a href="contact.html">Contact</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="text-right">
                            Copyright &copy; 2014.</a>
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{!! 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' !!}"></script>
<script src="{!! 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js' !!}"></script>
<script src="{!! 'assets/js/custom.js' !!}"></script>

<script src="assets/js/jquery-1.7.1.min.js"></script>
<script src="lib/jquery-2.0.3.js"></script>
<script src="jquery.countdownTimer.js"></script>


<script>
    $(function(){
        var time={{$time}}
            $('#ms_timer').countdowntimer({
                    minutes : time,
                    seconds : 00,
                    size : "md",
                    timeUp : timeisUp
                });
        function timeisUp() {
            document.getElementById("form1").submit();
        }
    });
</script>

</body>
</html>
