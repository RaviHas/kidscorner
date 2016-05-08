<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddStoryBookRequest;
use App\Http\Requests\AddStoryContentRequest;
use App\Http\Requests\EditStoryContentRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\storybook;
use App\storycontent;
use Input;
use Request;
use DB;


class LibraryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('storyBook/addStoryBook');
	}

	public function index1()
	{
		$storybook = storybook::all();
		return view('storyBook/viewStoryBook',compact('storybook'));
	}

	public function index3()
	{
		$storybook = storybook::all();
		return view('storyBook/viewStoryBooks',compact('storybook'));
	}

	public function showcontent($id)
{
	$story=storybook::find($id);
	$content=storycontent::where('titleid', $story['id'])->paginate(1);
	//return $content;
	//$content=DB::table('storycontents')->where('titleid', $story['id'])->paginate();
	//return $content;
	return view('storyBook/viewStory',compact('story','content'));
}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addstorybook(AddStoryBookRequest $request)
	{
		$input = Request::all();
		$title=$input['title'];
		if(Input::hasFile('file'))
		{
			$file = Input::file('file');
			$file->move('storybook', $file->getClientOriginalName());
			$name = $file->getClientOriginalName();
			$name=$input['file']->getClientOriginalName();
			$input['file']="storybook/$name";
		}
		storybook::create($input);
		return redirect("addstorybook/addstory/$title");

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function showaddstorybook($title)
	{
		return view('storyBook/addStory',compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddStoryContentRequest $request)
	{
		$input1=null;
		$input = Request::all();
		$title=$input['title'];

		if(Input::hasFile('file1'))
		{
			$file1 = Input::file('file1');
			$file1->move('storycontent', $file1->getClientOriginalName());
			$name = $file1->getClientOriginalName();
			$name=$input['file1']->getClientOriginalName();
			$input['file1']="storycontent/$name";
			$input1['file1'] = $input['file1'];
		}

		if(Input::hasFile('file2'))
		{
			$file2 = Input::file('file2');
			$file2->move('storycontent', $file2->getClientOriginalName());
			$name = $file2->getClientOriginalName();
			$name=$input['file2']->getClientOriginalName();
			$input['file2']="storycontent/$name";
			$input1['file2'] = $input['file2'];
		}

		//get the story title id
		$id = DB::table('storybooks')->where('title', $input['title'])->pluck('id');
		$input1['titleid'] =$id;

		//store in storycontent
		storycontent::create($input1);

		//update the status of storybook
		storybook::where('id', $id)->update(array('status' => $input['status']));
		flash()->success('Successfully Added','Good Job');
		if($input['status']=="pending")
			return redirect("addstorybook/addstory/$title");
		else
			return view('storyBook/addStoryBook');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$story=storybook::find($id);
		$content=storycontent::all()->where('titleid', $story['id']);
		//return $story['file'];
		return view('storyBook/editcontent',compact('story','content'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$content=storycontent::find($id);
		$title=DB::table('storybooks')->where('id', $content['titleid'])->pluck('title');

		return view('storyBook/editContent1',compact ('content','title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,EditStoryContentRequest $request)
	{
		$input = Request::all();
		$content=storycontent::find($id);
		if(Input::hasFile('file1')) {
			$file1 = Input::file('file1');
			$file1->move('uploads', $file1->getClientOriginalName());
			$name1 = $file1->getClientOriginalName();
			$name=$input['file1']->getClientOriginalName();
			$input['file1']="uploads/$name1";

		}
		if(Input::hasFile('file2')) {
			$file2 = Input::file('file2');
			$file2->move('uploads', $file2->getClientOriginalName());
			$name2 = $file2->getClientOriginalName();
			$name2=$input['file2']->getClientOriginalName();
			$input['file2']="uploads/$name2";

		}
		$content->update($input);
		$story=storybook::find($content['titleid']);
		$content=storycontent::all()->where('titleid', $story['id']);
		return view('storyBook/editcontent',compact('story','content'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$id1=storybook::find($id)->pluck('id');

		$storycontent= storycontent::all()->where('titleid',$id1);
		$storybook=storybook::find($id);

		foreach($storycontent as $s) {
			$s->delete( Request::all());
		}
		$storybook->delete( Request::all());
		return redirect('viewstory');
	}



	public function deleteContent($id)
	{
		$content1=storycontent::find($id);
		$content1->delete(Request::all());
		$story=storybook::find($content1['titleid']);
		$content=storycontent::all()->where('titleid', $story['id']);
		return view('storyBook/editcontent',compact('story','content'));


		/*$id1=DB::table('storycontents')->where('id', $id)->pluck('titleid');
		$storybook=storybook::all()->where('id',$id1);
		$content1=storycontent::find($id);
		$content1->delete(Request::all());
		$content=storycontent::all()->where('titleid', $storybook[0]['id']);

		$story['id']=$storybook[0]['id'];
		$story['title']=$storybook[0]['title'];
		$story['file']=$storybook[0]['file'];
		$story['description']=$storybook[0]['description'];
		$story['status']=$storybook[0]['status'];


		return view('storyBook/editcontent',compact('story','content'));*/
	}

}
