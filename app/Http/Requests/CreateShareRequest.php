<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class CreateShareRequest extends Request {

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
			'status' => 'min:3',
			'file' => 'required|mimes:jpeg,bmp,png,jpg|max:1000',
		];
	}

	public function messages()
	{
		return[

			'file.required' => 'Choose the image file',
			'file.mimes' => 'File should be a image (.jpeg, .jpg, .png, .bmp, .gif)',
			'file.max' => 'Size exceed Please select a photo less than 1MB!',

		];
	}

}

