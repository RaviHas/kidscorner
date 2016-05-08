<?php namespace App\Http\Controllers;

use App\course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\online_quiz;
use App\Upldtbl;
use Request;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$video = array('' => 'Select One') + Upldtbl::lists('title', 'title');
		$quiz = array('' => 'Select One') + online_quiz::lists('title', 'title');
		return view('virtualClass/addCourse',compact('video','quiz'))->with(['grade'=>null,'subject'=>null ]);
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
	public function store(Requests\CreateCourseRequest $request)
	{
		$input = Request::all();
		$url=Upldtbl::all()->where('title',$input['video']);
		foreach($url as $url){
			$u=$url['url'];
		}
		$input['video']=$u;
		course::create($input);
		flash()->success('Successfully Added','Good Job');
		return redirect('/course');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$course=course::all();
		return view('virtualClass/viewCourse', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$video = array('' => 'Select One') + Upldtbl::lists('title', 'title');
		$quiz = array('' => 'Select One') + online_quiz::lists('title', 'title');
		$course=course::find($id);
		return view('virtualClass/editCourse',compact('course','video','quiz'))->with(['grade'=>null,'subject'=>null ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Requests\CreateCourseRequest $request)
	{
		$input=Request::all();
		$course=course::find($id);
		$url=Upldtbl::all()->where('title',$input['video']);
		$url=$url[1]['url'];
		$input['video']=$url;
		$course->update($input);
		return( redirect('/viewcourse'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$course=course::find($id);
		$course->delete( Request::all());
		return redirect("/viewcourse");
	}

	/**
	 * select values to drope down menu.
	 *
	 * @param  int  $grade, $subject
	 * @return Response
	 */
	public function droptitle($grade,$subject)
	{
		if($grade=="Select One" && $subject=="Select One"){
			$video = array('' => 'Select One') + Upldtbl::lists('title', 'title');
			$quiz = array('' => 'Select One') + online_quiz::lists('title', 'title');
			return view('virtualClass/addCourse',compact('video','quiz'))->with(['grade'=>null,'subject'=>null ]);
		}
		else {
			if($grade!="Select One" && $subject=="Select One"){

				$video = array('' => 'Select One') + Upldtbl::where('grade', $grade)->lists('title', 'title');
				$quiz = array('' => 'Select One') + online_quiz::where('grade', $grade)->lists('title', 'title');
				return view('virtualClass/addCourse',compact('video','quiz'))->with(['grade'=>$grade,'subject'=>$subject ]);


			}
			elseif($grade=="Select One" && $subject!="Select One") {

				$video = array('' => 'Select One') + Upldtbl::where('subject', $subject)->lists('title', 'title');
				$quiz = array('' => 'Select One') + online_quiz::where('subject', $subject)->lists('title', 'title');
				return view('virtualClass/addCourse',compact('video','quiz'))->with(['grade'=>$grade,'subject'=>$subject ]);

			}
			else{

				$video = array('' => 'Select One') + Upldtbl::where('grade', $grade)->where('subject', $subject)->lists('title', 'title');
				$quiz = array('' => 'Select One') + online_quiz::where('grade', $grade)->where('subject', $subject)->lists('title', 'title');
				return view('virtualClass/addCourse',compact('video','quiz'))->with(['grade'=>$grade,'subject'=>$subject ]);

			}
		}

	}

}


