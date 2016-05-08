@extends('auth/loginmain')

@section('content')
	<header id="head" class="secondary">
		<div class="container">
			<h1>Login</h1>

		</div>
	</header>
	<div style="margin-top: 5%"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="color: red; ">
			<div class="panel panel-default">

				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div style="margin-left: 20%">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">

								<button type="submit" class="btn btn-primary">Login</button> <br>

							</div>
						</div>
						</div>

						<div style="margin-left: 18%">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">

								<a  href="{{ url('/password/email') }}">Forgot Your Password?</a>

							</div>
						</div>
						</div>

						<div style="margin-left: 19%">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">

								<a href="{{ url('/auth/register') }}">Create a new account</a>
							</div>
						</div>
						</div>




					</form>
				</div>
		</div>
	</div>
</div>
@endsection
