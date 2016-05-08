<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddStoryBookRequest extends Request {

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
			'title' => 'required|unique:storybooks,title',
			'file' => 'required|mimes:jpeg,bmp,png,jpg,gif|max:1000',
			'description' => 'required',

		];
	}

	public function messages()
	{
		return[
			'title.required'=>'Title is required',
			'title.unique' => 'Title is already added',
			'file.required' => 'Choose the image file',
			'file.mimes' => 'File should be a image (.jpeg, .jpg, .png, .bmp, .gif)',
			'file.max' => 'Size exceed Please select a image less than 1MB!',
			'description.required'=>'Description is required '

		];
	}

}
