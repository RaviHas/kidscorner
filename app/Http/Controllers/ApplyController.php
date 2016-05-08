<?php namespace App\Http\Controllers;
use App\Notification;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
use Alert;
use App\course;
use App\Upldtbl;
use DB;
use App\Http\Requests;
class ApplyController extends Controller {


    public function upload(Requests\UpldRequest $request) {

        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules -mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('image' => 'required');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            Session::flash('errorUpldFile', 'Please insert a file');
           // $res = false;
            return Redirect('upload')->withInput();
        }
        else {

            // checking file is valid.
            if (Input::file('image')->isValid()) {
                // upload path
                $destinationPath = 'uploads';
                // getting image extension
                $extension = Input::file('image')->getClientOriginalExtension();
                //Getting original name of uploaded file
                $name = Input::file('image')->getClientOriginalName();
                //Getting path of uploaded file
                $path = Input::file('image')->getRealPath();


                if (file_exists(public_path('uploads/'.$name))) {
                    Session::flash('errorUpldFile', 'uploaded file is already exists.');
                    //return Redirect('upload');
                    return redirect()->back()->withInput();
                }


                // uploading file to given path
                Input::file('image')->move($destinationPath, $name);
                $request->all();

                $input=Request::all();
                $input['url'] = "uploads/".$name;

                $url=$input['url'];
                $grade = $input['grade'];
                $subject = $input['subject'];


                $course=course::all();
                foreach($course as $c){

                    if($c->id==$grade){
                        $grade=$c->grade;


                    }
                    if($c->id==$subject){

                        $subject=$c->subject;

                    }
                }

                $input['grade']=$grade;
                $input['subject']=$subject;
                $title=$input['title'];

                Upldtbl::create($input);
                $upldId = DB::table('upldtbls')->max('id');

                $noti='Grade '.$grade.' '.$subject.' material regarding '.$title.' is uploaded now!';
                flash()->success('Successfully Added','Good Job');
                $this->addNoti($noti,$upldId);
                return redirect('upload');

            }
            else {
                // sending back with error message.
                Session::flash('errorUpld', 'uploaded file is not valid');
                return Redirect('upload');
            }
        }


    }
    public function addNoti($noti,$upldID){
        $input['noti']=$noti;
        $input['upldId']=$upldID;
        Notification::create($input);
        return redirect('upload');
    }
}