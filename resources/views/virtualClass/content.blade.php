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

		<section class="container" >

			<div class="row">
				@foreach($course as $cou)
				<article class="col-md-8 maincontent">
					<br>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<div class="col-xs-12">
						<a href="/{{$cou['video']}}"><div class="video" style="background-color: #c63d3d; border-radius: 10px; padding-left: 100px;padding-top: 5px;padding-bottom: 10px">
							<h3 style="color: white">&nbsp&nbsp<img src="/images/play-icon-light.png" style="width: 100px"></img>&nbsp&nbsp&nbsp Watch Video</h3>
						</div></a>
					</div>
				</article>

				<aside class="col-md-4 sidebar sidebar-right">
					{!! Form::open([ 'url' => '/onlineexam1'])  !!}

					<input type="hidden" name="grade" value={{$course[0]['grade']}} />
					<input type="hidden" name="subject" value={{$course[0]['subject']}} />
					<input type="hidden" name="title" value="{{$cou['quiz']}}" />
					<div class="row panel">
						<br>
						<div class="col-xs-12">
							<a href="/attempt/{{$cou['quiz']}}"><div class="quiz" style="background-color: #2fc613; border-radius: 10px; padding: 40px">
								<h3 style="color: white">&nbsp&nbsp<i class="fa fa-flag-checkered" style="font-size: 40px"></i>&nbsp&nbsp&nbsp Online Quiz</h3>
									{!! Form::submit('Attempt',['class' => 'btn btn-primary form-control']) !!}
							</div></a>
						</div>
					</div>



					{!! Form::close() !!}


				</aside>

			</div>
			@endforeach

	</section>
	<style>
		.video:hover{
			padding: 0;
			transform: scale(1.1,1.1);
			transition: 0.5s all ease-in-out;
			cursor:pointer;
		}
		.video {
			margin-left: 10px;
			padding: 0;
		}
		.quiz:hover{
			padding: 0;
			transform: scale(1.1,1.1);
			transition: 0.5s all ease-in-out;
			cursor:pointer;
		}
		.quiz {
			margin-left: 10px;
			padding: 0;
		}
	</style>

@endsection