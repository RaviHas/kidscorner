<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateQuizRequest extends Request {

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
			'grade'=>'required',
			'subject'=>'required',
		];
	}

	public function messages()
	{
		return[
			'grade.required'=>'Choose the Grade',
			'subject.required'=>'Choose the Subject',
		];
	}

}
