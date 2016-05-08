<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateChildRequest extends Request {

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

			'grade'=>'required|numeric',
			'childname'=>'required|alpha',
			'childlastname'=>'required|alpha'
		];
	}

	public function messages()
	{

		return[

			'grade.numeric'=>'Please select a grade',
			'childname.alpha'=>'First Name may only contain letters.',
			'childlastname.alpha'=>'Last Name may only contain letters.',
			'childlastname.required'=>'Last name is required.',
			'childname.required'=>'First Name is required.',

		];
	}

}
