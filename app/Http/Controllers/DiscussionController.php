<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\replies;
use App\topics;
use Request;
use Auth;
use Carbon\Carbon;
use Alert;

class DiscussionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = topics::latest()->get();
		$uid=Auth::user()->id;
		$mytopics = topics::all()->where('uid',$uid);
		return view('discussion/discussionForum',compact('topics','mytopics'))->with(['pid'=>null]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeTopic(Requests\CreateTopicRequest $request)
	{

		flash()->success('Successfully Added','Good Job');
		$input = Request::all();
		$input['username']= Auth::user()->name;
		$input['uid']= Auth::user()->id;
		$input['published']= Carbon::now();
		topics::create($input);
		$topics = topics::latest()->get();
		$uid=Auth::user()->id;
		$mytopics = topics::all()->where('uid',$uid);
		return view('discussion/discussionForum',compact('topics','mytopics'))->with(['pid'=>null]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeReplys($id,Requests\CreateReplyRequest $request)
	{
		flash()->success('Successfully Added','Good Job');
		$input = Request::all();
		$input['tid'] = $id;
		$input['uid']= Auth::user()->id;
		$input['uname']= Auth::user()->name;
		$input['published']= Carbon::now();
		replies::create($input);
		$topics = topics::latest('published')->get();
		$replys = replies::all()->where('tid',$id);
		$uid=Auth::user()->id;
		$mytopics = topics::all()->where('uid',$uid);
		Alert::success('Success Message', 'Successfully Added');
		return view('discussion/discussionForum',compact('topics','replys','mytopics'))->with(['pid'=>$id ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$topics = topics::latest('published')->get();
		$replys = replies::all()->where('tid',$id);
		$uid=Auth::user()->id;
		$mytopics = topics::all()->where('uid',$uid);
		return view('discussion/discussionForum',compact('topics','replys','mytopics'))->with(['pid'=>$id ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editTopic($id)
	{
		$topic=topics::find($id);
		return view('discussion/editTopic',compact('topic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateTopic($id,Requests\CreateTopicRequest $request)
	{
		$topic=topics::find($id);
		$topic->update( Request::all());
		return( redirect('disscussionforum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editReply($tid,$id)
	{
		$reply = replies::find($id);
		$topic=topics::find($tid);
		return view('discussion/editReply',compact('topic','reply'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateReply($tid,$id,Requests\CreateReplyRequest $request)
	{
		$reply = replies::find($id);
		$reply->update( Request::all());
		return redirect("disscussionforum/{$tid}");
	}

	/**
	 * Remove the Topic instence resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteTopic($id)
	{
		$reply=replies::all()->where('tid',$id);
		$topic=topics::find($id);
		if($reply != null) {
			foreach($reply as $r) {
				$r->delete( Request::all());
			}
		}
		if($topic != null);{
			$topic->delete( Request::all());
			return( redirect('disscussionforum'));
        }
	}

	/**
	 * Remove the Reply instence from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteReply($tid,$rid)
	{
		$reply=replies::find($rid);
		$reply->delete( Request::all());
		return redirect("disscussionforum/{$tid}");

	}
}
