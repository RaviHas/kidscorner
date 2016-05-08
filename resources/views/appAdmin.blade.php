<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kids Corner</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{!!asset('asset/css/bootstrap.css') !!}" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="{!! asset('asset/css/font-awesome.css') !!}" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="{!!asset('asset/css/style.css') !!}" rel="stylesheet" />
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script type="text/javascript" src="{!! asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand" href="/home">

            </a>
        </div>

        <div class="notifications-wrapper">
            <ul class="nav">



                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="auth/logout"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a  href="addAdmin">
                        <i class="fa fa-plus"></i> Add another admin
                    </a>

                </li>
            </ul>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav  class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <div class="user-img-div">
                        <img src="{!! asset('asset/img/user.jpg" class="img-circle')!!} "/>


                    </div>

                </li>
                <li>
                    <a  href="#"> <strong>Welcome </strong> {{Auth::user()->name}}</a>
                </li>

                <li>
                    <a   href="/graph"><i class="fa fa-dashboard "></i>Graph</a>
                </li>

                <li>
                    <a   href="viewUsers"><i class="fa fa-users "></i>Manage Users</a>
                </li>

                <li>
                    <a   href="sendMail"><i class="fa fa-envelope "></i>Send Mail</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-question-circle "></i>Quizzes <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/addQuestion"><i class="fa fa-plus "></i>Add Questions</a>
                        </li>
                        <li>
                            <a href="/viewques"><i class="fa fa-eye "></i>View Questions</a>
                        </li>
                        <li>
                            <a href="/genquiz"><i class="fa fa-file"></i>Generate Quiz</a>
                        </li>
                        <li>
                            <a href="/viewquiz"><i class="fa fa-eye "></i>View Quiz</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-book "></i>StoryBook <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/library"><i class="fa fa-plus "></i>Add StoryBook</a>
                        </li>
                        <li>
                            <a href="/viewstory"><i class="fa fa-eye "></i>View StoryBook</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book "></i>Courses <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/course"><i class="fa fa-plus "></i>Add course</a>
                        </li>
                        <li>
                            <a href="/viewcourse"><i class="fa fa-users "></i>View Course</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book "></i>Course Materials <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/upload"><i class="fa fa-plus "></i>Add Materials</a>
                        </li>
                        <li>
                            <a href="/hgh"><i class="fa fa-users "></i>View Materials</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book "></i>Event Calendar<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/evntform"><i class="fa fa-plus "></i>Add Event</a>
                        </li>
                        <li>
                            <a href="/dcalendar"><i class="fa fa-users "></i>View Event</a>


                        </li>

                    </ul>
                </li>






            </ul>
        </div>

    </nav>
    <!-- /. SIDEBAR MENU (navbar-side) -->
    <div id="page-wrapper" class="page-wrapper-cls">
        <div id="page-inner">
            <div class="row">

                <div class="col-md-12">
                    @yield('content')
                </div>

            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<footer >

</footer>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src={!! asset('asset/js/jquery-1.11.1.js') !!}></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src={!! asset('asset/js/bootstrap.js') !!}></script>
<!-- METISMENU SCRIPTS -->
<script src={!! asset('asset/js/jquery.metisMenu.js') !!}></script>
<!-- CUSTOM SCRIPTS -->
<script src={!! asset('asset/js/custom.js') !!}></script>
<script type="text/javascript" src={!!"http://canvasjs.com/assets/script/canvasjs.min.js" !!}></script>

<script>
    // $('#flash-overlay-modal').modal();
    $('div.alert-success').not('.alert-important').delay(3000).slideUp(300);
</script>
</body>
</html>
