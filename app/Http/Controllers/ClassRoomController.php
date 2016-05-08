<?php namespace App\Http\Controllers;

use App\Child;
use App\Http\Requests;
use App\online_quiz;
use Auth;
use App\course;
use DB;
use App\quiz;

class ClassRoomController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('virtualClass/classRoom');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $sub
	 * @return Response
	 */
	public function show($sub)
	{
		$user=Child::all()->where('username',Auth::user()->email);
		$course=course::all()->where('subject',$sub);
		return view('virtualClass/course',compact('course','user'))->with(['subject'=>$sub]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $grade,$sub,$title
	 * @return Response
	 */
	public function showcontent($grade,$sub,$title)
	{
		$user=Child::all()->where('username',Auth::user()->name);
		$course=course::all()->where('subject',$sub)->where('title',$title);
		return view('virtualClass/content',compact('course','user'))->with(['subject'=>$sub]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $title,
	 * @return Response
	 */
	public function attemptquiz($title)
	{

		$no=0;
		$input=online_quiz::all()->where('title',$title);
		$grade=$input[0]['grade'];
		$subject=$input[0]['subject'];
		$noOfQus=DB::table('online_quizzes')->where('title',$title)->pluck('noOfQuestions');
		$time=DB::table('online_quizzes')->where('title',$title)->pluck('time');
		$quiz=quiz::all()->where('title',$title);
		$quize = $quiz->random($noOfQus);//get random 5 questions from db
		return view('onlineExam/onlineExam1',compact('grade','subject','quize','no','time','title','noOfQus'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
