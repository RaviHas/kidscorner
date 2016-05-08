<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class UpldRequest1 extends Request {

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


		return [
			'title'   => 'required',
			'grade'   => 'required',
			'subject'   => 'required'

		];
	}

	public function messages(){
		return [
			'title.required' => 'Title is required.',
			'subject.required' => 'Subject is required.',
			'grade.required' => 'Grade is required.'
		];
	}
}
