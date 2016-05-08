<?php namespace App\Http\Controllers;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Request;
use DB;
use \Input as Input;
use App\Http\Requests;
class ParentController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function loadParentProfile()
	{
        $email=Auth::user()->email;

		$parent=DB::table('parents')
			->where('email','=',$email)
			->get();

		//return $parent;
		return view('parent/parentProfile',compact('parent'));
	}

	public function uploadPhoto(Requests\UploadImageRequest $request)
	{
		$email=Auth::user()->email;

		$request->all();
		$file = Input::file('file');
		$file->move('uploads', $file->getClientOriginalName());
		$newurl = $file->getClientOriginalName();

		DB::table('parents')
			->where('email', '=', $email)
			->update(['url' => $newurl]);

		return redirect("myProfile");


	}




}
