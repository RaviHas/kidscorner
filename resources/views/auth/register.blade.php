@extends('kids')

@section('content')
	<header id="head" class="secondary">
		<div class="container">
			<h1>Register</h1>
			<p>Fill out the form below and Sign up for KidsCorner.com!</p>
		</div>
	</header>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

				<div class="panel-body">

<div style="margin-top: 5%">
	@if (count($errors) > 0)
		<div style="color: #ac2925;margin-left: 37%">
			<strong >Whoops!</strong> There were some problems with your input.<br><br>
		</div>
	@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								<div style="color: red">
								@if ($errors->has('name'))
									{{ $errors->first('name') }}<br>
								@endif
								</div>
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								<div style="color: red">
								@if ($errors->has('email'))
									{{ $errors->first('email') }}<br>
								@endif
								</div>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
								<div style="color: red">
								@if ($errors->has('password'))
									{{ $errors->first('password') }}<br>
								@endif
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
								<div style="color: red">
								@if ($errors->has('password_confirmation'))
									{{ $errors->first('password_confirmation') }}<br>
								@endif
								</div>
							</div>
						</div>

						<div style="margin-top: 5%">

						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
				</div>
		</div>
	</div>
</div>
@endsection
