<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendMailRequest extends Request {

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
			'subject'=>'required',
			'body'=>'required'
		];
	}

	public function messages()
	{
		return[

			'subject'=>'Subject is required.',
			'body'=>'Content of the message cannotbe empty.'

		];
	}

}
