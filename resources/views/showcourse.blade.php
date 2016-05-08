@extends('kids')

@section('content')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<!--[if IE]><script type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="assets/js/html5-canvas-drawing-app.js"></script>
	<header id="head" class="secondary">

		<div class="container">
			<h1>Course</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
		</div>
	</header>

	<section class="container">

		<section class="container" >

			<div class="row">

				<article class="col-md-8 maincontent">
					<h2>Maths</h2>
					@foreach($maths as $math)
					<div class="col-md-4">
						<div class="grey-box-icon b1" style="border-radius:100%; background-color: {{$math->colour}}; height: 250px">
							<h4>{{$math->title}}</h4>
							<p>{{$math->discription}}</p>
						</div><!--grey box -->
					</div><!--/span3-->

					@endforeach

				</article>

				<article class="col-md-8 maincontent">
					<h2>English</h2>
					@foreach($eng as $eng)
						<div class="col-md-4">
							<div class="grey-box-icon b1" style="border-radius:100%; background-color: {{$eng->colour}}; height: 250px">
								<h4>{{$eng->title}}</h4>
								<p>{{$eng->discription}}</p>
							</div><!--grey box -->
						</div><!--/span3-->

					@endforeach

				</article>
				<br>

				<article class="col-md-8 maincontent">
					<h2>Environmental Studies</h2>
					@foreach($env as $env)
						<div class="col-md-4">
							<div class="grey-box-icon b1" style="border-radius:100%; background-color: {{$env->colour}}; height: 250px">
								<h4>{{$env->title}}</h4>
								<p>{{$env->discription}}</p>
							</div><!--grey box -->
						</div><!--/span3-->

					@endforeach

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