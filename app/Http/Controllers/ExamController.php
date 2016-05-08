<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\online_quiz;
use App\quiz;
use App\results;
use Carbon\Carbon;

use Request;
use DB;
use Auth;
use File;
use Response;

class ExamController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = array('' => 'Select One') + online_quiz::lists('title', 'title');
		return view('onlineExam/onlineExam',compact('title'));
	}

	public function Exam()
	{
		$no=0;
		$input = Request::all();
		$grade=$input['grade'];
		$subject=$input['subject'];
		$title=$input['title'];


		$noOfQus=DB::table('online_quizzes') ->where('title',$input['title'])
									->where('grade',$input['grade'])
									->where('subject',$input['subject'])
									->pluck('noOfQuestions');

		$time=DB::table('online_quizzes')	->where('title',$input['title'])
									->where('grade',$input['grade'])
									->where('subject',$input['subject'])
									->pluck('time');

		$quiz=quiz::all()
			->where('grade', $grade)
			->where('subject', $subject)
			->where('title',$input['title']);

		$quize = $quiz->random($noOfQus);//get random 5 questions from db

		return view('onlineExam/onlineExam1',compact('grade','subject','quize','no','time','title','noOfQus'));

	}


	public function mark()
	{
		$mark=0;
		$date=Carbon::now();
		$date1=$date->toDateString();
		$input = Request::all();
		$no=$input['noOfQus'];
		//return $input;
		//get the correct answers for 5 questions from quize table
		for($i=1;$i<=$no;$i++)
		{

			$can=DB::table('quizzes')->where('id',$input['id'.$i])->pluck('canswer');
			if($can==$input['q'.$i])
				$mark=$mark+20;
		}

		//get the template to certificate
		$path = 'assets/images/cer.jpg';
		$image = imagecreatefromjpeg($path);

		$color = imagecolorallocate($image, 0, 0, 0);
		$string = Auth::user()->name;
		$fontSize = 60;
		$x = 290;
		$y = 260;

		$string1 = $input['grade'];
		$x1 = 380;
		$y1 = 318;

		if($mark>=75)
		{
			$color1 = imagecolorallocate($image, 255, 0, 0);
			$string2 = 'Distinction Pass (A)';
			$x2 = 280;
			$y2 = 370;
		}
		else if($mark>=55 && $mark<75)
		{
			$color1 = imagecolorallocate($image, 255, 0, 0);
			$string2 = 'Very Good Pass (B)';
			$x2 = 285;
			$y2 = 370;
		}
		else if($mark>=35 && $mark<55)
		{
			$color1 = imagecolorallocate($image, 255, 0, 0);
			$string2 = 'Credit Pass (C)';
			$x2 = 295;
			$y2 = 370;
		}

		$string3 = $date1;
		$x3 = 145;
		$y3 = 390;

		$string4 = $input['subject'].' - '.$input['title'] ;
		$x4 = 250;
		$y4 = 410;
		$color2 = imagecolorallocate($image,6,174,0);

		// write on the image
		imagestring($image, $fontSize, $x, $y, $string, $color);
		imagestring($image, $fontSize, $x1, $y1, $string1, $color);
		if($mark>=35)
		{
			imagestring($image, $fontSize, $x2, $y2, $string2, $color1);
		}
		imagestring($image, $fontSize, $x3, $y3, $string3, $color);
		imagestring($image, $fontSize, $x4, $y4, $string4, $color2);

		if($mark>=35) {
			imagejpeg($image, $fileName = 'abc.jpg', $quality = 100);// save the image
		}
		else{
			if(!File::exists('public/abc.jpg')){
				File::delete('abc.jpg');
			}
		}

		$array['child_name']= $string;
		$array['grade']= $input['grade'];
		$array['subject']= $input['subject'];
		$array['title']= $input['title'];
		$array['result']= $mark;
		$array['date']= $date1;

		$count = DB::table('results')
			->select( DB::raw('count(*) as count'))
			->where('child_name', $array['child_name'])
			->where('grade', $array['grade'])
			->where('subject', $array['subject'])
			->where('title', $array['title'])
			->pluck('count');

		if($count==0) {
			results::create($array);
		}
		else{
			$results = DB::table('results')
				->where('child_name', $array['child_name'])
				->where('grade', $array['grade'])
				->where('subject', $array['subject'])
				->where('title', $array['title'])
				->pluck('result');

			$id = DB::table('results')
				->where('child_name', $array['child_name'])
				->where('grade', $array['grade'])
				->where('subject', $array['subject'])
				->where('title', $array['title'])
				->pluck('id');

			if($results < $mark)
			{
				$quiz=results::find($id);
				$quiz->update( $array);
			}
		}
		return view('onlineExam/results',compact('mark'));
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
