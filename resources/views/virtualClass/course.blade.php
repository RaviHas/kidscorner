@extends('kids')

@section('content')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<!--[if IE]><script type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="assets/js/html5-canvas-drawing-app.js"></script>
	<header id="head" class="secondary">

		<div class="container">
			<h1>{{$subject}}</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
		</div>
	</header>

	<section class="container">

		<section class="container" >

			<div class="row">

				<article class="col-md-8 maincontent">

					@foreach($course as $courses)

					<div class="col-md-4">
						<div class="grey-box-icon b1" style="border-radius:100%; background-color: {{$courses->colour}}; height: 250px">
							<h4>{{$courses->title}}</h4>
							<p>{{$courses->discription}}</p>
							@foreach($user as $us)
							<p><a href="/classroom/{{$us['grade']}}/{{$subject}}/{{$courses->title}}"><em>Attempt</em></a></p>
							@endforeach
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