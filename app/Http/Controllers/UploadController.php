<?php namespace App\Http\Controllers;

use App\course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Upldtbl;
use DB;
use Request;
use Session;
class UploadController extends Controller {




    public function index()
    {
        return view('upld/upld');

    }

    public function dispUplds()
    {
        $upldtbls=Upldtbl::all();
        return view('upld/viewUpload',compact('upldtbls'));
    }

    public function deleteUpld($id)
    {

        $upld = Upldtbl::where('id', '=', $id) ->first();
        $upld->delete();
        $this->dltNoti($id);
        return redirect('/hgh');

    }

    public function dltNoti($id)
    {
        $notif = Notification::where('upldId', '=', $id) ->first();
        $notif->delete();
        return redirect('/hgh');
    }

    public function editUplds($id1,$id2,$id3,$id4,$id5)
    {
        $ids=$id1;
        $sub=$id2;
        $grade=$id3;
        $fileN=$id4;
        $title=$id5;

        return view('upld/upld1',compact('sub','title','grade','fileN','ids'));
    }

    public function edit1(Requests\UpldRequest1 $request)
    {

        $grade = $_POST['grade'];
        $subject = $_POST['subject'];
        $id = $_POST['id'];
        $title = $_POST['title'];


        $uplds = Upldtbl::findOrFail($id);

        $uplds->update($request->all());

        DB::table('upldtbls')
            ->where('id', $id)
            ->update(['title' => $title, 'subject' => $subject, 'grade' => $grade]);


        $noti='Grade '.$grade.' '.$subject.' material regarding '.$title.' is uploaded now!';
        $this->editNoti($id,$noti);
        return redirect('/hgh');
    }

    public function editNoti($upldId,$noti){
        DB::table('notifications')
            ->where('upldId', $upldId)
            ->update(['noti' => $noti]);
        return redirect('upload');
    }

    public function disUpldsEng2()
    {
        $upldtbls=Upldtbl::all();
        return view('upld/2Eng',compact('upldtbls'));
    }






}

