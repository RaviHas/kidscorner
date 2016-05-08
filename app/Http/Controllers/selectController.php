<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use App\course;
use DB;
use App\Http\Controllers\Controller;

use Request;
class selectController extends Controller {


    public function index()
    {

        return view('upld/select');

    }
    public function index1()
    {


        $input=Request::all();
        $g = $input['grade'];
        $s = $input['subject'];

        if(strcmp($g,'Select A Grade')==0 || strcmp($s,'Select A Subject')==0) {



            Session::flash('msg', 'Please select the both Subject and Grade.');
            return redirect()->back()->withInput();



        }

        else{

            $u = DB::table('upldtbls')->where('grade',$g)->where('subject',$s)->get();
            return view('upld/2Eng',compact('u'));

        }

    }

    public function index2($id){

        $u = DB::table('upldtbls')->where('id',$id)->get();
        return view('upld/2Eng',compact('u'));
    }

}
