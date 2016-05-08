
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Kiddo</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="c1 active"><a href="/home">Home</a></li>
					<li class="c2"><a href="/about">About</a></li>
					<li class="c3"><a href="/classroom">Courses</a></li>
                    <li class="c4"><a href="/paint">Paint</a></li>
                    <li class="c5"><a href="/storybooks">Digital Library</a></li>
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
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Start Online Education</h1> <br/>
							<p>Free Online education template for elearning and online education institute.</p>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="assets/images/slides/thumbs/img1.jpg" data-src="assets/images/slides/img1.jpg">
                            <h2>We develop.</h2>
                        </div> 
                        <div data-thumb="assets/images/slides/thumbs/img2.jpg" data-src="assets/images/slides/img2.jpg">
                        </div>
                        <div data-thumb="assets/images/slides/thumbs/img3.jpg" data-src="assets/images/slides/img3.jpg">
                        </div> 
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  <div class="container">
    <div class="row">
					<div class="col-md-3">
						<div class="grey-box-icon b1"> 
							<h4>Online Courses</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="classroom"><em>Go →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon b2"> 
							<h4>Digital Library</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="/storybooks"><em>Go →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon b3"> 
							<h4>Paint</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="/paint"><em>Go →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon b4">  
							<h4>Meet Friends</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="/friendzone"><em>Go →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>

    <section class="container">
        <div class="row">
            <div class="col-md-7"><div class="title-box clearfix "><h2 class="title-box_primary">Today's video</h2></div>
                <iframe width="640" height="360" src="https://www.youtube.com/embed/olWG6jiMV0g" frameborder="0" allowfullscreen></iframe> </div>

            <div class="col-md-4" style="margin-top:50px "><div class="title-box clearfix "><h3 class="title-box_primary">Up Coming Courses</h3></div>
                <div class="list styled custom-list" style="width: 400px;">
                   <a href="/vcalendarc"> <img src="/images/Calender.JPG"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-8"><div class="title-box clearfix "><h2 class="title-box_primary">About Us</h2></div>
                <p>We are a group of under graduates who are reading for the B.Sc (Special Honours) in Software Engineering at Sri Lanka
                    Institute of Information Technology</p>
                <p>This e-learning website was developed as the Softaware Engineering Project in Semester 1 of third year. </p>
                <p>This e-learning site contains following features.</p>
                <a href="/about" title="read more" class="btn-inline " target="_self">read more</a> </div>


            <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary"></h2></div>
                <div class="list styled custom-list">

                </div>
            </div>
        </div>
    </section>


   
  
	

      
    	 
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
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>
    
</body>
</html>
