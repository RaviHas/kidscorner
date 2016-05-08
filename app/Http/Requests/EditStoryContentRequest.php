<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use DB;
use Input;

class EditStoryContentRequest extends Request {

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
		\Validator::extend( 'check_file1', function () {
			$file1=DB::table('storycontents')
				->where('id',$this->id)
				->pluck('file1');
			if ($file1 == null && (!(Input::hasFile('file1')))) {
				return false;
			}
			else {
				return true;
			}
		},'Choose a image for left page' );

		\Validator::extend( 'check_file2', function () {
			$file2=DB::table('storycontents')
				->where('id',$this->id)
				->pluck('file2');
			if ($file2 == null && (!(Input::hasFile('file2')))) {
				return false;
			}
			else {
				return true;
			}
		},'Choose a image for right page' );


		return [
			'file1' => 'check_file1',
			'file2' => 'check_file2',
		];
	}

	public function messages()
	{
		return[
			'file1.required'=>'Choose a image for left page',
			'file2.required'=>'Choose a image for right page',
		];
	}


}
