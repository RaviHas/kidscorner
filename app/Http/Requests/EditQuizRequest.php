<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
use DB;

class EditQuizRequest extends Request {

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
		\Validator::extend( 'check_typequestiontext', function () {
			if($this->questiontype == 'questiontext'){
				if (Input::hasFile('questionimage')) {
					return false;
				}
			}
			else{
				return true;
			}
		},'Not allowed to upload images as you selected the question type as text.' );

		\Validator::extend( 'check_typequestionimage', function () {
			if($this->questiontype=='questionimage'){
				if ($this->questiontext != null) {
					return false;
				}
			}
			else{
				return true;
			}
		},'Not allowed to add text question as you selected the question type as image.' );


		\Validator::extend( 'check_typequestionboth', function () {
			if($this->questiontype=="both"){
				$image=DB::table('quizzes')
					->where('id',$this->id)
					->pluck('questionimage');
				if ($image == null && (!(Input::hasFile('questionimage')))) {
					return false;
				}
				else{
					return true;
				}
			}
			else{
				return true;
			}
		},'Image is required as you selected the question type as both.' );

		return [
			'grade' => 'required',
			'subject' => 'required',
			'title' => 'required',
			'questiontype' => 'required',
			'questiontext' => 'required_if:questiontype,questiontext|required_if:questiontype,both|check_typequestionimage',
			'questionimage' => 'mimes:jpeg,bmp,png,jpg,gif|max:1000|check_typequestiontext|check_typequestionboth',
			'answer1' => 'required',
			'answer2' => 'required',
			'answer3' => 'required',
			'answer4' => 'required',
			'canswer' => 'required'

		];
	}

	public function messages()
	{
		return[
			'grade.required'=>'Choose the Grade',
			'subject.required'=>'Choose the Subject',
			'title.required'=>'Choose the Title',
			'questiontype.required'=>'Choose the Question Type',
			'questiontext.required_if' => 'Question is required',
			'questionimage.mimes' => 'File should be a image (.jpeg, .jpg, .png, .bmp, .gif)',
			'questionimage.max' => 'Size exceed Please select a photo less than 1MB!',
			'answer1.required'=>'Answer1 is required ',
			'answer2.required'=>'Answer2 is required ',
			'answer3.required'=>'Answer3 is required ',
			'answer4.required'=>'Answer4 is required ',
			'canswer.required'=>'Choose the Correct Answer'

		];
	}

}
