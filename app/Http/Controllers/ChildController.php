<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use Request;
use Carbon\Carbon;
use App\Child;
use App\User;
use Input;
use UxWeb\SweetAlert;
use Alert;
use Session;

class ChildController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new child account.
	 *
	 * @returns view
	 */

	public function loadAddChildAccountPage()
	{

		return view('child/addChildAccount');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return view
	 */

	public function addNewChildAccount(Requests\CreateChildRequest $request)
	{

		/* get the values from the form */
		$input['username'] = Request::get('username');
		$input['grade'] = Request::get('grade');
		$input['password']=Request::get('password');
		$input['parent_id']=Auth::user()->id;
		$input ['published_at']=Carbon::now();
		$input['childname']=Request::get('childname');
		$input['childlastname']=Request::get('childlastname');
		$input['type']='child';
		$input['email'] = Request::get('username');

		/*add details to the children table */
		Child::create($request->all());

		/* add details to the users table */
		User::create([
			'name'=>$input['childname'],
			'email'=> $input['email'],
			'password'=>bcrypt($input['password']),
			'type'=>'child',
		]);

		/* Input the parent id */
		DB::table('children')
			->where('username','=',$input['username'])
			->update(['parent_id'=>$input['parent_id']]);

		Mail::send
		(
			'mail/childAccountMail',
			array('user'=>Auth::user()->name,
				'childname'=> $input['childname'],
				'childlastname'=> $input['childlastname'],
				'username'=>$input['email'],
				'password'=>$input['password']),
			function($message)
			{
				$message->to(Auth::user()->email,Auth::user()->name)->subject('Kids Corner');
			}
		);

		flash()->success('A child account was successfully created','Good Job');
		return redirect('viewChildAccounts');


	}

	/**
	 * Display a listing of the child accounts with options.
	 *
	 * @return view
	 */

	public function viewChildAccounts()
	{

		/*$a is the current user's id*/
		$a=Auth::user()->id ;
		$children= DB::table('children')->where('parent_id','=',$a) ->get();
		$i=0;

		return view('child/viewChildAccounts',compact('children','i'));

	}

	/**
	 * Display a specified child.
	 *
	 * @param  int  $id
	 * @return view
	 */

	public function showChildProfile($id)
	{

		$child=child::findOrFail($id);

		$i=0;
		$results=DB::table('results')->where('child_name','=', $child['username'])->get();

		return view('child/childDetails',compact('child','results','i'));

	}

	/**
	 * Update the  profile photo of specified child in storage.
	 *
	 * @param  int  $id
	 * @return view
	 */
	public function uploadPhoto($id,Requests\UploadImageRequest $request)
	{
		$request->all();
		$child=child::findOrFail($id);
		$file = Input::file('file');
		$file->move('uploads', $file->getClientOriginalName());
		$newurl = $file->getClientOriginalName();

		DB::table('children')
			->where('id', '=', $id)
			->update(['url' => $newurl]);

		return redirect("oneChild/{$child->id}");


	}
	/**
	 * Remove the specified child
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteChild($id)
	{
		$child=Child::findOrFail($id);
		DB::table('users')->where('email', '=', $child['username'])->delete();
		$child->delete( Request::all());

		return redirect('viewChildAccounts');
	}
	/**
	 * Show the form for updating a new child account.
	 *
	 * @returns view
	 */

	public function loadEditPage($id)
	{

		$child=Child::findOrFail($id);
		return view('child/updateChildAccount',compact('child'));

	}

	/**
	 * Update the  details of specified child in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateChildAccount($id,Requests\UpdateChildRequest $request)
	{
		$child=Child::find($id);
		$child->update($request->all());
		flash()->success('Sucessfully updated','Good Job');
		return redirect('viewChildAccounts');
	}

	/**
	 * Show the form for changing the  password of specified child in storage.
	 *
	 * @returns view
	 */

	public function loadEditPasswordPage($id)
	{
		$child=Child::find($id);
		return view('child/changePassword',compact('child'));
	}

	/**
	 * Update the  password of specified child in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function updatePassword($id,Requests\ChangePasswordRequest $request)
	{
		$request->all();
		$child=Child::findOrFail($id);
		$old_password=$child['password'];
		$typed_password=Request::get('password');
		$new_password=Request::get('new_password');

		$username=$child['username'];
		if($old_password==$typed_password)
		{

			DB::table('children')
				->where('id','=',$id)
				->update(['password'=>Request::get('new_password')]);

			DB::table('users')
				->where('email','=',$username)
				->update(['password'=>bcrypt($new_password)]);

			flash()->success('Password was successfully changed','Good Job');
			return redirect("viewChildAccounts");
		}
		else

			\Session::flash('flash_message','Your current password does not match our records');
		     return redirect("changePw/$child->id");
	}

}