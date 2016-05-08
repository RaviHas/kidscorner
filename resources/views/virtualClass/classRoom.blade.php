@extends('childhome')

@section('content')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<!--[if IE]><script type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="assets/js/html5-canvas-drawing-app.js"></script>
	<header id="head" class="secondary">

		<div class="container">
			<h1>Virtual Class Room</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
		</div>
	</header>

	<section class="container">

		<section class="container" >

			<div class="row">

				<article class="col-md-8 maincontent">

					<div class="col-md-4">
						<div class="grey-box-icon b1">
							<h4>Maths</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<p><a href="classroom/Maths"><em>Go to the course</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-4">
						<div class="grey-box-icon b2">
							<h4>Environment</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
							<p><a href="classroom/Environmental Studies"><em>Go to the course</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-4">
						<div class="grey-box-icon b3">
							<h4>English</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<p><a href="classroom/English "><em>Go to the course</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->

				</article>

				<aside class="col-md-4 sidebar sidebar-right">

					<div class="row panel">
						<div class="col-xs-12">


						</div>
					</div>

				</aside>

			</div>

	</section>


@endsection