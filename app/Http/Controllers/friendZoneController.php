<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\likes;
use App\share;
use Request;
use Input;
use Auth;
use Carbon\Carbon;
use DB;
class friendZoneController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shares= share::latest()->get();
		$like = DB::table('likes')
			->select('sid', DB::raw('count(*) as total'))
			->groupBy('sid')
			->get();
		$me = likes::all()->where('uid', Auth::user()->id)->count();
		$noti=likes::latest('created_at')->get();

		//return $me;
		return view('friendZone/friendZone',compact('shares','like','me','noti'))->with(['pid'=>null]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateShareRequest $request)
	{
		$input = Request::all();
		if(Input::hasFile('file')) {
			$file = Input::file('file');
			$file->move('uploads', $file->getClientOriginalName());
			$name = $file->getClientOriginalName();

			$name=$input['file']->getClientOriginalName();
			$input['file']="uploads/$name";
		}
		$input['username']= Auth::user()->name;
		$input['uid']= Auth::user()->id;
		$input['published']= Carbon::now();
		share::create($input);
		return redirect('friendzone');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$share=share::find($id);
		return view('friendZone/editShare',compact('share'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Requests\CreateShareRequest $request)
	{
		$input = Request::all();
		$share=share::find($id);
		if(Input::hasFile('file')) {
			$file = Input::file('file');
			$file->move('uploads', $file->getClientOriginalName());
			$name = $file->getClientOriginalName();
			$name=$input['file']->getClientOriginalName();
			$input['file']="uploads/$name";

		}
		$share->update($input);
		return redirect('friendzone');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$share=share::find($id);
		$share->delete(Request::all());
		return redirect('friendzone');
	}

	/**
	 * handel the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function handelLike($id)
	{
		$like = DB::table('likes')
			->select( DB::raw('count(*) as count'))
			->where('sid', $id)
			->where('uid', Auth::user()->id)
			->pluck('count');
		if($like==0){
			$input['sid']=$id;
			$input['uname']= Auth::user()->name;
			$input['uid']= Auth::user()->id;
			likes::create($input);
			return redirect('friendzone');
		}
		else{
			$uid=Auth::user()->id;
			$like=DB::select("delete from likes where sid='$id' and uid ='$uid';");
			return redirect('friendzone');
		}
	}

}
