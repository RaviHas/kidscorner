<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Admin;
use Request;
use Auth;
use Mail;
use App\Parents;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Child;
use App\User;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
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

	/**
	 * Pass data to the graph and load the view of the graph
	 *
	 */

	public function loadGraphOfVisitedUsers()
	{

		$user_info2 = DB::table('userviews')
			->select(DB::raw('count(*) as y'))
			->groupBy(DB::raw('DATE(created_at)'))
			->get();


		return view('admin/graph',compact('user_info2'));

	}

	/**
	 * Adds a new admin
	 *
	 * @param CreateAdminRequest $request
	 * @return view
	 */

	public function addAdmin(Requests\CreateAdminRequest $request)
	{

		$input['username'] = Request::get('username');
		$input['password']=Request::get('password');
		$input ['published_at']=Carbon::now();
		$input['name']=Request::get('username');
		$input['url']='images(1).jpg';
		$input['type']='admin';
		$input['email'] = Request::get('email');

		Admin::create($request->all());
		User::create([
			'name'=>$input['name'],
			'email'=> $input['username'],
			'password'=>bcrypt($input['password']),
			'type'=>'admin',
		]);

		flash()->success('Admin account was successfully created','Good Job');

		return redirect('admin');

	}

	/**
	 * loads the view to add a new admin
	 *
	 */
	public function loadAddAdmin()
	{
		return view('admin/addAdmin');
	}

	/**
	 * loads the view to send a mail
	 *
	 */
	public function loadMail()
	{
		return view('admin/sendMail');
	}

	/*
	 * Sends email to all parent users
	 *
	 *@param  Requests\SendMailRequest $request
	 */
	public function sendMail(Requests\SendMailRequest $request)
	{

		$subject=Request::get('subject');
		$body=Request::get('body');

		$parents=DB::table('users')
			->select('email')
			->where('type','=','parent')
			->get();

		foreach($parents as $parent) {

			$this->adminMail($body,$parent,$subject);

		}
		var_dump( Mail:: failures());
		exit;

		return redirect('admin');
	}

	/**
	 * Function to send mail
	 *@param  string $body , string $parent, string $subject
	 * @return void
	 */
	public function adminMail($body,$parent,$subject)
	{
		Mail::send('mail/adminMail', array('body'=>$body), function ($message) use ($parent, $subject) {
			$message->from('no-reply@site.com', "Kids corner");
			$message->subject("Welcome to kids corner");
			$message->to($parent->email)->subject($subject);
		});
	}

	/**
	 * Function to view users
	 * @return view
	 */
	public function viewUsers()
	{
		$i=0;
		$j=0;
		$users = DB::table('children')->get();
		$users2 = DB::table('users')->where('type','=','parent')->get();
		return view('admin/viewUsers',compact('users','users2','i','j'));

	}

	/**
	 * Function to delete child accounts
	 * @return view
	 */
	public function deleteChildUser($id)
	{
		$child=Child::find($id);
		DB::table('users')->where('email', '=', $child['username'])->delete();
		$child->delete( Request::all());
		flash()->success('Child account was successfully deleted','Good Job');

		return redirect('viewUsers');
	}

	/**
	 * Function to delete parent accounts
	 * @return view
	 */
	public function deleteParentUser($id)
	{


		$parent=User::find($id);

		DB::table('users')->where('email', '=', $parent['email'])->delete();
		DB::table('parents')->where('email', '=', $parent['email'])->delete();
		DB::table('children')->where('parent_id','=',$id)->delete();
		flash()->success('Child account was successfully deleted','Good Job');

		return redirect('viewUsers');
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

}
