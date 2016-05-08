<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{


		return parent::report($e);

	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException)
		{
			return redirect('pageNotFound');
		}

		if ($e instanceof BadMethodCallException)
		{
			return redirect('pageNotFound');
		}


		if($e instanceof \ErrorException)
		{
			return redirect('pageNotFound');

		}

		if($e instanceof \ModelNotFoundException)
		{
			return redirect('pageNotFound');

		}

		if($e instanceof \PDOException)
		{
			return redirect('dbFail');

		}

		if($e instanceof \Swift_TransportException)
		{
			return redirect('noInternetConnection');

		}
		return parent::render($request, $e);
	}
}
