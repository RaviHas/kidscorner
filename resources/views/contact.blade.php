@extends('kids')

@section('content')
	<header id="head" class="secondary">
		<div class="container">
			<h1>Contact Us</h1>
			<p></p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h3 class="section-title">Your Message</h3>
				<p>

				</p>
				@include('flash::message')
				{!! Form::open(array('url'=>'/homeContact1','class'=>'form-light mt-20','method'=>'POST', )) !!}


					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name',null,['class' => 'form-control','placeholder'=>'Your name']) !!}
						@if(Session::has('errorName'))
							<ul class="alert alert-danger" ><p class="errors">
									{!! Session::get('errorName') !!}</p></ul>
						@endif
						@if(Session::has('errorName1'))
							<ul class="alert alert-danger" ><p class="errors">
									{!! Session::get('errorName1') !!}</p></ul>
						@endif
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('Email', 'Email') !!}
								{!! Form::email('email',null,['class' => 'form-control','placeholder'=>'Email address']) !!}
								@if(Session::has('errorEMail'))
									<ul class="alert alert-danger" ><p class="errors">
											{!! Session::get('errorEMail') !!}</p></ul>
								@endif
							</div>
						</div>

					</div>
					<div class="form-group">
						{!! Form::label('Subject', 'Subject') !!}
						{!! Form::text('subject',null,['class' => 'form-control','placeholder'=>'Subject']) !!}
						@if(Session::has('errorSubj'))
							<ul class="alert alert-danger" ><p class="errors">
									{!! Session::get('errorSubj') !!}</p></ul>
						@endif
					</div>
					<div class="form-group">
						{!! Form::label('Message', 'Message') !!}
						{!! Form::textarea('message',null,['class' => 'form-control','placeholder'=>'Write you message here...','id'=>'message','style'=>'height:100px']) !!}
						@if(Session::has('errorMsg'))
							<ul class="alert alert-danger" ><p class="errors">
									{!! Session::get('errorMsg') !!}</p></ul>
						@endif
					</div>
				{!! Form::submit('Send message', array('class'=>'btn btn-two')) !!}
					<p><br/></p>
				{!! Form::close() !!}
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Office Address</h3>
						<div class="contact-info">
							<h5>Address</h5>
							<p>5th Street, Carl View - Sri Lanka</p>

							<h5>Email</h5>
							<p>info@webthemez.com</p>

							<h5>Phone</h5>
							<p>+09 123 1234 123</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection