<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\online_quiz;
use DB;

class EditOnlineQuizRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		\Validator::extend( 'grade_required', function () {
			if($this->grade == 'Select One'){
				return false;
			}
			else{
				return true;
			}
		},'Choose the grade.' );

		\Validator::extend( 'subject_required', function () {
			if($this->subject == 'Select One'){
				return false;
			}
			else{
				return true;
			}
		},'Choose the subject.' );

		\Validator::extend( 'composite_unique', function () {

			$rows = DB::table('online_quizzes')->where('grade', $this->grade)
				->where('subject',$this->subject)
				->where('title',$this->title)->pluck('id');

			if($rows != 0){
				return true;
			}

			else
			{
				$count = DB::table('online_quizzes')
					->select( DB::raw('count(*) as count'))
					->where('grade', $this->grade)
					->where('subject',$this->subject)
					->where('title',$this->title)
					->pluck('count');
				if($count==0){
					return true;

				}
				else{
					return false;
				}
			}

		},'The Quiz based on this title is already created.' );

		\Validator::extend( 'check_questions', function () {
			$count = DB::table('quizzes')
				->select( DB::raw('count(*) as count'))
				->where('grade', $this->grade)
				->where('subject',$this->subject)
				->where('title',$this->title)
				->pluck('count');
			if($count>=$this->noOfQuestions){
				return true;
			}
			else{
				return false;
			}
		},'Sorry. Less no of questions in the question bank.' );

		return [
			'grade' => 'grade_required',
			'subject' => 'subject_required',
			'title' => 'required|composite_unique',
			'noOfQuestions' => 'required|integer|check_questions',
			'time' => 'required|integer'

		];
	}

	public function messages()
	{
		return[
			'title.required'=>'Choose the Title',
			'noOfQuestions.required'=>'No of Questions is required ',
			'noOfQuestions.integer'=>'No of Questions should be a integer value',
			'time.required'=>'Time is required',
			'time.integer'=>'Time is not in required format'


		];
	}

}
