<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Input;

class UpdateEventRequest extends Request {

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

		$input = Input::all();
		return [
			'title' => 'required',
			'eventDate' => 'required|date|after:yesterday',
			'endDate' => 'date|after:'.date( 'Y-m-d', strtotime( $input['eventDate'] . ' -1 day' ) ),
			'venue' => 'required',
			'time' => 'required',
			'type' => 'required',

		];
	}

	public function messages(){
		return [
			'title.required' => 'Event Title is required.',
			'type.required' => 'Event Type is required.',
			'eventDate.after' => 'Event Date is passed.',
			'eventDate.required' => 'Event Date is required.',
			'venue.required' => 'Venue is required.',
			'time.required' => 'Starting Time is required.',
			'endDate.after' => 'Ending Date should be equal or greater than Starting Date'
		];
	}
}
