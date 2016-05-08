<?php namespace App\Http\Controllers;

use App\EventCal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;
use App\Notification;
use App\Event;
use Session;
use DB;
use Alert;
use Validator;
use Input;
use Redirect;
class EventCalController extends Controller {


    public function store(Requests\EventRequest $request){

        $request->all();
        $current=Carbon::now();
        $t=substr($current,11,-3);
        $d=substr($current,0,-9);
        $st=explode(":",$t);
        $currentTime=$st[0].$st[1];
        $postTime=$_POST['time'];
        $time=explode(":",$postTime);

        $insertTime=$time[0].$time[1];
        $date=$_POST['eventDate'];
        if(strcmp($d,$date)==0) {
           if ($currentTime > $insertTime) {


               Session::flash('errorTime', 'Time is passed.');
               return redirect()->back()->withInput();
           }
        }
        $events=EventCal::all();
        foreach($events as $ev){
            $ti=substr($ev->time,-8,5);

            if( (strcmp($ev->eventDate,$date)==0) && (strcmp($ev->venue,$_POST['venue'])==0) && (strcmp($ti,$postTime)==0) ){

                Session::flash('errorDate', 'There is already an event for this time,Venue and Starting Date');
                return redirect()->back()->withInput();
            }
        }



        $input=Request::all();

        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            // getting image extension
            $extension = $file->getClientOriginalExtension();
            // renameing image
            $fileName = rand(11111, 99999) . '.' . $extension;
            // uploading file to given path
            $file->move('images', $fileName);
            $input['photo'] = "images/$fileName";
        }


        EventCal::create($input);
        flash()->success('Successfully Added','Good Job');
        Alert::success('Do you want to continue?', 'Successfully Added!');
        return redirect('/evntform');

    }

    public function viewCal1(){

        $events=EventCal::all();
        $notif = DB::table('notifications')->orderBy('id', 'desc')->get();
        return view('event/calanderView',compact('events','notif'));
    }

    public function viewCal2(){

        $events=EventCal::all();
        $notif = DB::table('notifications')->orderBy('id', 'desc')->get();
        return view('event/calanderViewchild',compact('events','notif'));
    }
    public function viewForm(){


        return view('event/evntform');
    }



    public function index4(){


        $events=EventCal::all();
        return view('event/dltevnts',compact('events'));
    }

    public function index5($id){

        $evnt = EventCal::where('id', '=', $id);
        Alert::success('', 'Do you want to Delete?');
        $evnt->delete();
        return redirect('/dcalendar');
    }
    public function edit($id1,$id2,$id3,$id4,$id5,$id6,$id7){
        $id=$id1;
        $date=$id2;
        $title=$id3;
        $time=$id4;
        $venue=$id5;
        $type=$id6;
        $endDate=$id7;

        return view('event/evntform1',compact('date','title','id','time','venue','type','endDate'));
    }
    public function edit1(Requests\UpdateEventRequest $request){

        $request->all();
        $date=$_POST['eventDate'];
        $title=$_POST['title'];
        $id=$_POST['id'];
        $endDate=$_POST['endDate'];


        $events=EventCal::findOrFail($id);
        $current=Carbon::now();
        $t=substr($current,11,-3);
        $d=substr($current,0,-9);
        $st=explode(":",$t);
        $currentTime=$st[0].$st[1];
        $postTime=$_POST['time'];
        $time=explode(":",$postTime);

        $insertTime=$time[0].$time[1];
        $date=$_POST['eventDate'];
        if(strcmp($d,$date)==0) {
            if ($currentTime > $insertTime) {


                Session::flash('errorTime1', 'Time is passed.');
                return redirect()->back()->withInput();
            }
        }

        $events=EventCal::all();
        foreach($events as $ev){
            $ti=substr($ev->time,-8,5);

            if( (strcmp($ev->eventDate,$date)==0) && (strcmp($ev->venue,$_POST['venue'])==0) && (strcmp($ti,$postTime)==0) ){

                Session::flash('errorDate1', 'There is already an event for this time,venue and date');
                return redirect()->back()->withInput();
            }
        }

     DB::table('event_cals')
            ->where('id',$id)
            ->update(['title' => $title,'eventDate' => $date,'endDate'=>$endDate, 'time' => $postTime,'venue' => $_POST['venue'],'type' => $_POST['type'],
            'color' => $_POST['color']]);



        return redirect('/dcalendar');
    }

    public function disk($id)
    {

        $ev = DB::table('event_cals')->where('id', $id)->first();
        return view('event/NewYear',compact('ev'));
    }

}
