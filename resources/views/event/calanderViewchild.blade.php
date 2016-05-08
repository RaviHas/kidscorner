

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8' />

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet"  media="screen"  href="{!! asset('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! 'assets/css/sweetalert2.css' !!}">
    <link href="{!!asset('css/fullcalendar.css')!!}" rel="stylesheet" />
    <link href="{!!asset('css/fullcalendar.print.css')!!}" rel="stylesheet" media="print" />
    <script src="{!!asset('lib/moment.min.js')!!}"></script>
    <script src="{!!asset('lib/jquery.min.js')!!}"></script>
    <script src="{!!asset('lib/fullcalendar.min.js')!!}"></script>

    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap-theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">

    <?php
        $ta=array();
        $i=0;
    ?>
    @foreach($events as $ev)
        <?php
            $s="\r\n\n";

            $ta[$i]['title'] =$ev->title.$s."Venue: ".$ev->venue.$s."Time : ".$ev->time;
            $ta[$i]['url'] = "event/".$ev->id;
            $ta[$i]['end']= date('Y-m-d H:i:s', strtotime($ev->endDate));
            $ta[$i]['start'] = date('Y-m-d H:i:s', strtotime($ev->eventDate));
            $ta[$i]['color'] = $ev->color;
            $i++;
        ?>

    @endforeach

    <script>
        var t=<?php echo json_encode($ta)?>;

        $(document).ready(function() {


            $('#calendar').fullCalendar({

                //defaultDate: '2016-04-12',
                editable: true,
                // allow "more" link when too many events
                eventLimit: true,
                events: t,
                eventRender: function(event, element) {
                    $('.fc-time', element).hide();
                }
            });

        });

    </script>

    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;

        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }


    </style>
</head>



<body>
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">

                <img src="{!! asset('assets/images/logo.png') !!}" alt="Techro HTML5 template" ></a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="c1 active"><a href="index.html">Home</a></li>
                <li class="c2"><a href="about.html">About</a></li>
                <li class="c3"><a href="/classroom">Courses</a></li>
                <li class="c4"><a href="/paint">Paint</a></li>
                <li class="c5"><a href="/classroom">Digital Library</a></li>
                <li class="c7"><a href="/friendzone">Meet friends</a></li>

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
        <img src="{!! asset('images/key.PNG') !!}" width="450px" style="float: left; margin-left: 350px;">
    </div>

</div>

<div id='calendar'></div>


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
                                        List of Technology
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Business
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Photography
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Language
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Products Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li> <a href="#">
                                        Individual Plans  </a>
                                </li>
                                <li><a href="#">
                                        Business Plans
                                    </a>
                                </li>
                                <li><a href="#">
                                        Free Trial
                                    </a>
                                </li>
                                <li><a href="#">
                                        Academic
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Browse by Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        All Courses
                                    </a>
                                </li>
                                <li> <a href="#">
                                        All Instructors
                                    </a>
                                </li>
                                <li><a href="#">
                                        All Members
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        All Groups
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
                            <i class="fa fa-map-marker"></i> Kerniles 416  - United Kingdom<br>
                            <i class="fa fa-phone"></i>+00 123 156 711 <br>
                            <i class="fa fa-envelope-o"></i> youremail@email.com
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
                            <a href="about.html">About</a> |
                            <a href="courses.html">Courses</a> |
                            <a href="price.html">Price</a> |
                            <a href="videos.html">Videos</a> |
                            <a href="contact.html">Contact</a>
                        </p>

                    </div>

                </div>

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="text-right">
                            Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>
<script src="{!! 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js' !!}"></script>
</body>

</html>
