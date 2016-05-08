<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use DB;


class AddTitleRequest extends Request {


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
		\Validator::extend( 'composite_unique', function () {
			$count = DB::table('titles')
				->select( DB::raw('count(*) as count'))
				->where('grade', $this->grade)
				->where('subject',$this->subject)
				->where('title',$this->title)
				->pluck('count');
			if($count==0){
				return true;
			}
			else{
				return false;
			}
	    },'Sorry, The Title is already used.' );





		return [
			'title'=>'required|composite_unique',
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'Title is required',
		];
	}

}
