@extends('childhome')

@section('content')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<!--[if IE]><script type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="assets/js/html5-canvas-drawing-app.js"></script>
	<header id="head" class="secondary">

		<div class="container">
			<h1>Drawing App</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
		</div>
	</header>

	<section class="container">

		<div id="canvasDiv" style="padding-top: 20px"></div>
		<script type="text/javascript"> $(document).ready(function() {
				prepareCanvas();
			});
		</script>

	</section>


@endsection