<?php namespace App\Http\Controllers;

use Auth;
use DB;
use Carbon\Carbon;
use App\course;
use App\Child;
use App\User;


class HomeController extends Controller {

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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userType=Auth::user()->type;

		if($userType=='parent')
		{
			$this->userViews();
			$this->incrementVisitorCount();
			$notif = DB::table('notifications')->orderBy('updated_at','desc')->get();
			return view('parents',compact('notif'));
		}


		else if($userType=='child')
		{
			$this->userViews();
			$this->incrementVisitorCount();
			return view('home');
		}

		else if($userType=='admin')
		{
			$number = DB::table('views')->pluck('view');

			$i=0;
			$j=0;
			$date=Carbon::now();
			$today=$date->toDateString();

			$parents=$this->todayParentUsers($today);

			$child=$this->todayChildUsers($today);

			return view('admin/adminHome',compact('number','parents','child','i','j'));
		}

	}

	public function kids()
	{
		$notif = DB::table('notifications')->orderBy('updated_at','desc')->get();
		return view('kids1',compact('notif'));
	}

	/**
	 * inserts the details of the visited user into the userviews table
	 *
	 * @return void
	 */
	public function userViews()
	{

		DB::table('userviews')->insert(
			[
				'name'=>Auth::user()->name,
				'user_id'=>Auth::user()->id,
				'type'=>Auth::user()->type,
				'created_at'=>Carbon::now()
			]
		);
	}

	/**
	 * increment the visitor count
	 *
	 * @return void
	 */

	public function incrementVisitorCount()
	{
		DB::table('views')->increment('view');
	}

	/**
	 * select todays parent users
	 *@param string $today
	 * @return response
	 */

	public function todayParentUsers($today)
	{
		$parents=DB::table('userviews')
			->where(DB::raw('DATE(created_at)'),'=',$today)
			->where('type','=','parent')
			->get();

		return $parents;
	}

	/**
	 * select todays child users
	 *@param  string $today
	 * @return response
	 */

	public function todayChildUsers($today)
	{
		$child=DB::table('userviews')
			->where(DB::raw('DATE(created_at)'),'=',$today)
			->where('type','=','child')
			->get();

		return $child;

	}

	public function showcourses($grade)
	{
		$maths=course::all()->where('grade',$grade)->where('subject','Maths');
		$eng=course::all()->where('grade',$grade)->where('subject','English');
		$env=course::all()->where('grade',$grade)->where('subject','Environmental Studies');
		return view('/showcourse',compact('maths','eng','env'));


	}

	public function index2()
	{
		return view('aboutUs');
	}



}
