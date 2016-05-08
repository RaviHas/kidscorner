<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\online_quiz;
use App\title;
use App\Http\Requests\AddOnlineQuizRequest;
use App\Http\Requests\EditOnlineQuizRequest;
use Input;
use Request;


class QuizController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = $categories = array('' => 'Select One') + title::lists('title', 'title');
		return view('question/generateQuiz', compact('title'))->with(['grade'=>null,'subject'=>null ]);
	}

	public function droptitle($grade,$subject)
	{
		if($grade=="Select One" && $subject=="Select One"){
			$title = $categories = array('' => 'Select One') + title::lists('title', 'title');
			return view('question/generateQuiz', compact('title')) ->with(['grade'=>null,'subject'=>null ]);;
		}
		else {
			if($grade!="Select One" && $subject=="Select One"){

				$title = $categories = array('' => 'Select One') + title::where('grade', $grade)->lists('title', 'title');
				return view('question/generateQuiz', compact('title'))->with(['grade'=>$grade,'subject'=>$subject ]);


			}
			elseif($grade=="Select One" && $subject!="Select One") {

				$title = $categories = array('' => 'Select One') + title::where('subject', $subject)->lists('title', 'title');
				return view('question/generateQuiz', compact('title'))->with(['grade'=>$grade,'subject'=>$subject ]);


			}
			else{

				$title = array('' => 'Select One') + title::where('grade', $grade)
						->where('subject',$subject)->lists('title', 'title');
				return view('question/generateQuiz', compact('title'))->with(['grade'=>$grade,'subject'=>$subject ]);

			}
		}

	}

	public function display()
	{
		$quiz = online_quiz::all();
		return view('question/viewquiz',compact('quiz'));
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
	public function store(AddOnlineQuizRequest $request)
	{
		$input = Request::all();
		online_quiz::create($input);

		$title = $categories = array('' => 'Select One') + title::lists('title', 'title');
		return view('question/generateQuiz', compact('title'))->with(['grade'=>null,'subject'=>null ]);
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
		$quiz=online_quiz::find($id);

		$title = array('' => 'Select One') + title::where('grade', $quiz['grade'])
				->where('subject',$quiz['subject'])->lists('title', 'title');


		return view('question/editQuiz',compact ('quiz','title'))->with(['grade'=>null,'subject'=>null ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditOnlineQuizRequest $request,$id)
	{
		$quiz=online_quiz::find($id);
		$input = Request::all();

		$quiz->update( $input);
		return redirect('viewquiz');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$quiz=online_quiz::find($id);
		$quiz->delete( Request::all());

		return redirect('question/viewQuiz');
	}


	public function search()
	{
		$input = Request::all();

		if($input['grade']==null && $input['subject']==null)
		{
			$quiz= online_quiz::all();
			return view('question/viewQuiz', compact('quiz'));
		}

		if($input['grade']!=null && $input['subject']==null)
		{
			$quiz= online_quiz::all()->where('grade',$input['grade']);
			return view('question/viewQuiz', compact('quiz'));
		}

		if($input['grade']==null && $input['subject']!=null)
		{
			$quiz= online_quiz::all()->where('subject',$input['subject']);
			return view('question/viewQuiz', compact('quiz'));
		}

		if($input['grade']!=null && $input['subject']!=null)
		{
			$quiz= online_quiz::all()
				->where('grade',$input['grade'])
				->where('subject',$input['subject']);
			return view('question/viewQuiz', compact('quiz'));
		}

	}



}
