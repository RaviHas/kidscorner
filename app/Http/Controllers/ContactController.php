<?php namespace App\Http\Controllers;

use App\course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Upldtbl;
use DB;
use Request;
use Session;
use Input;
use Mail;
class ContactController extends Controller {


    public function index()
    {
        return view('contact');
    }


    public function contact(){
        $input=Request::all();
        $n=$input['name'];
        $m=$input['message'];
        $s=$input['subject'];
        $email=$input['email'];
        if(empty($n)||empty($m)||empty($s)||empty($email)){
            if(empty($n)){
                Session::flash('errorName','Name is required');
            }
            if(empty($m)){
                Session::flash('errorMsg','Message is required');
            }
            if(empty($s)){
                Session::flash('errorSubj','Subject is required');
            }
            if(empty($email)){
                Session::flash('errorEMail','Email is required');
            }
            return redirect()->back()->withInput();
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$n)) {
            $nameErr = "Only letters and white space allowed";
            Session::flash('errorName1',$nameErr);
            return redirect()->back()->withInput();
        }
        Mail::send('emails.cont',['name'=>$n,'email'=>$email,'messag'=>$m],function($message)use ($s){

            $message->to('chamaraliyanage604@gmail.com','Sajith')->subject($s);
        });
        flash()->success('Successfully send','Good Job');
        return redirect('/homeContact');
    }
}

