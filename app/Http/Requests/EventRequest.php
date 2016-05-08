<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Input;

class EventRequest extends Request {

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
			'title' => 'required|unique:event_cals,title',
			'eventDate' => 'required|date|after:yesterday',
			'endDate' => 'date|after:'.date( 'Y-m-d', strtotime( $input['eventDate'] . ' -1 day' ) ),
			'venue' => 'required',
			'time' => 'required',
			'type' => 'required',
			'photo' => 'mimes:jpeg,bmp,png,jpg|max:1000'
		];
	}

	public function messages(){
		return [
			'title.required' => 'Event Title is required.',
			'title.unique' => 'Event Title is already there.',
			'eventDate.after' => 'Event Date is passed.',
			'eventDate.required' => 'Starting Date is required.',
			'venue.required' => 'Venue is required.',
			'time.required' => 'Starting Time is required.',
			'type.required' => 'Select an Event type',
			'endDate.after' => 'Ending Date should be equal or greater than Starting Date',

		];
	}
}
