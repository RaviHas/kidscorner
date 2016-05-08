<?php namespace App\Services;

use App\User;
use Validator;
use App\Parents;
use Mail;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255|alpha',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user=User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'type'=>'parent'
		]);

		Parents::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => $data['password'],
			'url'=>'images(1).jpg',
		]);


		$this->sendMailToParent($data['name'],$data['email'],$data['password'],$data);

		return $user;

	}

	public function sendMailToParent($user,$username,$password,$array)
	{
		Mail::send('mail/parentAccountMail', array(
			'user'=>$user,
			'username'=>$username,
			'password'=>$password), function($message) use ($array)
		{
			$message->from('no-reply@site.com', "Kids corner");
			$message->subject("Welcome to kids corner");
			$message->to($array['email']);
		});
	}

}
