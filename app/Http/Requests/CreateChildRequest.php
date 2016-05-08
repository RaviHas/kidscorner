<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateChildRequest extends Request {

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
			'username'=>'required|min:4|unique:children,username|unique:users,email',
			'grade'=>'required|numeric',
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',
			'childname'=>'required|alpha',
			'childlastname'=>'required|alpha'
		];
	}

	public function messages()
	{
		return[

			'username.unique'=>'Sorry, the username is already taken. ',
			'username.required'=>'Username is required. ',
			'grade.numeric'=>'Please select a grade',
			'password_confirmation.required'=>'Password Confirmation is required',
			'childname.alpha'=>'First Name may only contain letters.',
			'childlastname.alpha'=>'Last Name may only contain letters.',
			'childlastname.required'=>'Last name is required.',
			'childname.required'=>'First Name is required.',

		];
	}

}
