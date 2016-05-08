<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;


class AddStoryContentRequest extends Request {

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
			'file1' => 'required',
			'file2' => 'required',
			'status' => 'required'

		];
	}

	public function messages()
	{
		return[
			'file1.required'=>'Choose a image for left page',
			'file2.required'=>'Choose a image for right page',
			'status.required'=>'Status is required ',

		];
	}

}
