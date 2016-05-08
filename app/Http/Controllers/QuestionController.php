<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateQuizRequest;
use App\Http\Requests\AddTitleRequest;
use App\Http\Requests\AddQuizRequest;
use App\Http\Requests\EditQuizRequest;
use App\Http\Controllers\Controller;
use Input;
use Request;
use DB;
use App\quiz;
use App\title;
use Redirect;
use Alert;
use withInput;
use Illuminate\Http\Respons;

class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('question/addQuestion');
	}

	public function addQues(CreateQuizRequest $request)
	{
		$grade = Input::get('grade');
		$subject = Input::get('subject');
		$categories = array('' => 'Select One') + title::where('grade', $grade)
				->where('subject',$subject)->lists('title', 'title');

		return view('question/addQues',compact('grade','subject','categories'));
	}

	public function addtitle($grade,$subject)
	{
		return view('question/addTitle',compact('grade','subject'));
	}

	public function title(AddTitleRequest $request)
	{
		$grade=Input::get('grade');
		$subject=Input::get('subject');
		title::create(Input::get());
		return redirect("addq/$grade/$subject");

	}

	public function qqq($grade,$subject)
	{
		$categories = array('' => 'Select One') + title::where('grade', $grade)
				->where('subject',$subject)->lists('title', 'title');

		return view('question/addQues',compact('grade','subject','categories'));
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
	public function store(AddQuizRequest $request)
	{
		$input = Request::all();
		if (Input::hasFile('questionimage'))
		{
				$file = Input::file('questionimage');
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$file->move('questions',$fileName); // uploading file to given path
				$input['questionimage'] = "questions/$fileName";
		}
		flash()->success('Successfully Added','Good Job');
		quiz::create($input);
		return redirect('addq');
	}


	public function viewQuestion()
	{
		$quiz = quiz::all();

		return view('question/viewQues',compact('quiz'));
	}

	public function search()
	{
		$input = Request::all();

		if($input['grade']==null && $input['subject']==null)
		{
			$quiz= quiz::all();
			return view('question/viewQues', compact('quiz'));
		}

		if($input['grade']!=null && $input['subject']==null)
		{
			$quiz= quiz::all()->where('grade',$input['grade']);
			return view('question/viewQues', compact('quiz'));
		}

		if($input['grade']==null && $input['subject']!=null)
		{
			$quiz= quiz::all()->where('subject',$input['subject']);
			return view('question/viewQues', compact('quiz'));
		}

		if($input['grade']!=null && $input['subject']!=null)
		{
			$quiz= quiz::all()
				->where('grade',$input['grade'])
				->where('subject',$input['subject']);
			return view('question/viewQues', compact('quiz'));
		}


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
		$quiz=quiz::find($id);
		$grade=$quiz['grade'];
		$subject=$quiz['subject'];
		$categories = array('' => 'Select One') + title::where('grade', $quiz['grade'])
				->where('subject',$quiz['subject'])->lists('title', 'title');

		return view('question/editQuestion',compact ('quiz','categories','grade','subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,EditQuizRequest $request)
	{

		$quiz=quiz::find($id);
		$input = Request::all();

		if (Input::hasFile('questionimage'))
		{
			$file = Input::file('questionimage');
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			$file->move('questions',$fileName); // uploading file to given path
			$input['questionimage'] = "questions/$fileName";
		}

		$quiz->update( $input);
		return redirect('viewques');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$quiz=quiz::find($id);
		$quiz->delete( Request::all());

		return redirect('viewques');
	}



}
