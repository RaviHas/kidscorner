<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAdminRequest extends Request {

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
			'username'=>'required|min:4|unique:admins,username|unique:users,email',
			'email'=>'required|email',
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',

		];
	}

	public function messages()
	{
		return [

			'username.unique' => 'Sorry, the username is already taken. Select a different username. ',
		];
	}

}
