<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadImageRequest extends Request {

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
			'file'=> 'required|mimes:jpeg,bmp,png,jpg|max:800'
		];
	}

	public function messages()
	{
		return[

			'file.required'=>'You have not selected a file',
			'file.mimes'=>'Please select a file of jpeg,bmp,png,jpg type',
			'file.max'=>'Please select an image less than 800kb'

		];
	}

}
