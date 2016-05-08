<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('kid', 'HomeController@kids');

Route::get('/disscussionforum', 'DiscussionController@index');

Route::post('/disscussionforum','DiscussionController@storeTopic');

Route::post('/disscussionforum/{id}','DiscussionController@storeReplys');

Route::get('/deleteTopic/{id}','DiscussionController@deleteTopic');

Route::get('/disscussionforum/deleteTopic/{id}','DiscussionController@deleteTopic');

Route::get('disscussionforum/{id}/{cid}/delete','DiscussionController@deleteReply');

Route::get('disscussionforum/{id}','DiscussionController@show');

Route::get('disscussionforum/{id}/editTopic','DiscussionController@editTopic');

Route::patch('disscussionforum/{id}/editTopic','DiscussionController@updateTopic');

Route::get('disscussionforum/{id}/{cid}/editReply','DiscussionController@editReply');

Route::patch('disscussionforum/{id}/{cid}/editReply','DiscussionController@updateReply');

Route::get('/paint','PaintController@index');

Route::get('/friendzone','friendZoneController@index');

Route::post('/friendzone','friendZoneController@store');

Route::get('friendzone/delete/{id}','friendZoneController@delete');

Route::get('friendzone/{id}/edit','friendZoneController@edit');

Route::patch('friendzone/{id}/edit','friendZoneController@update');

Route::get('friendzone/like/{id}','friendZoneController@handelLike');

Route::get('/classroom','classRoomController@index');

Route::get('/classroom/{subject}','classRoomController@show');

Route::get('/classroom/{grade}/{subject}/{title}','classRoomController@showcontent');

Route::get('/course','CourseController@index');

Route::post('/addcourse','CourseController@store');

Route::post('/coursedrop/{grade}/{subject}','CourseController@store');

Route::get('/viewcourse','CourseController@show');

Route::get('/viewcourse/delete/{id}','CourseController@delete');

Route::get('/viewcourse/edit/{id}','CourseController@edit');

Route::patch('/viewcourse/edit/{id}','CourseController@update');

Route::get('/attempt/{title}','classRoomController@attemptquiz');

Route::get('/coursedrop/{grde}/{subject}','CourseController@droptitle');

Route::get('/parent/{grade}','HomeController@showcourses');

/////////////////////////////////////////////////////////////////

Route::get('addChildAccount','ChildController@loadAddChildAccountPage');

Route::get('oneChild/addChildAccount','ChildController@loadAddChildAccountPage');

Route::post('addChildAccount','ChildController@addNewChildAccount');

Route::get('/viewChildAccounts','ChildController@viewChildAccounts');

Route::get('oneChild/viewChildAccounts','ChildController@viewChildAccounts');

Route::get('oneChild/{id}','ChildController@showChildProfile');

Route::post('oneChild/{id}','ChildController@uploadPhoto');

Route::get('DeleteChild/{id}','ChildController@deleteChild');

Route::get('editChild/{id}','ChildController@loadEditPage');

Route::patch('editChild/{id}','ChildController@updateChildAccount');

Route::get('changePw/{id}','ChildController@loadEditPasswordPage');

Route::post('changePw/{id}','ChildController@updatePassword');

Route::get('admin','AdminController@index');

Route::get('pageNotFound',function(){return view('errors/404');});

//Route::get('dbFail',function(){return view('errors/405');});

Route::get('noInternetConnection',function(){return view('errors/SwiftException');});

Route::get('graph','AdminController@loadGraphOfVisitedUsers');

Route::get('addAdmin','AdminController@loadAddAdmin');

Route::post('addAdmin','AdminController@addAdmin');

Route::get('sendMail','AdminController@loadMail');

Route::get('viewUsers','AdminController@viewUsers');

Route::post('sendMail','AdminController@sendMail');

Route::get('myProfile','ParentController@loadParentProfile');

Route::post('myProfile','ParentController@uploadPhoto');

Route::get('DeleteQChild/{id}','AdminController@deleteChildUser');

Route::get('DeleteQParent/{id}','AdminController@deleteParentUser');

/////////////////////////////////////////////////////////////////

Route::get('evntform', 'EventCalController@viewForm');

Route::get('vcalendar', 'EventCalController@viewCal1');

Route::get('vcalendarc', 'EventCalController@viewCal2');

Route::post('calendars','EventCalController@store');

Route::get('dcalendar', 'EventCalController@index4');

Route::get('dcalendar/{id}', 'EventCalController@index5');

Route::get('upload', 'UploadController@index');

Route::post('apply/upload', 'ApplyController@upload');

Route::get('hgh', 'UploadController@dispUplds');

Route::get('hgh/{id}','UploadController@deleteUpld');

Route::get('hgh1/{id1}/{id2}/{id3}/{id4}/{id5}', 'UploadController@editUplds');

Route::post('hgh1', 'UploadController@edit1');

Route::get('select', 'selectController@index');

Route::post('apply/select', 'selectController@index1');

Route::get('select/{id}', 'selectController@index2');

Route::get('eng2', 'UploadController@disUpldsEng2');

Route::get('event/{id}', 'EventCalController@disk');

Route::get('ecalendar/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}/{id7}','EventCalController@edit');

Route::post('ecalendar', 'EventCalController@edit1');

Route::get('homeContact','ContactController@index');

Route::post('homeContact1','ContactController@contact');

Route::get('homeContact2','ContactController@index2');

/////////////////////////////////////////////////////////////////

Route::get('addQuestion','QuestionController@index');

Route::get('addq','QuestionController@addQues');

Route::get('/addtitle/{grade}/{subject}','QuestionController@addtitle');

Route::get('addtitle','QuestionController@title');

Route::post('addquestion','QuestionController@store');

//Route::get('qqq/','QuestionController@qqq');

Route::get('/addq/{grade}/{subject}', array('as' => 'qqq', 'uses' => 'QuestionController@qqq'));

Route::get('viewques','QuestionController@viewQuestion');

Route::post('viewques','QuestionController@search');

Route::get('DeleteQ/{id}','QuestionController@delete');

Route::get('/quiz/{id}','QuestionController@edit');

Route::patch('/quiz/{id}','QuestionController@update');

Route::get('/genquiz','QuizController@index');

Route::get('/onlinequiz','QuizController@store');

Route::get('/genquiz/{grde}/{subject}','QuizController@droptitle');

Route::get('/editquiz/{grde}/{subject}/{noq}/{time}','QuizController@editdroptitle');

Route::get('/viewquiz','QuizController@display');

Route::post('viewquiz','QuizController@search');

Route::get('DeleteQuiz/{id}','QuizController@delete');

Route::get('/editquiz/{id}','QuizController@edit');

Route::patch('/editquiz/{id}','QuizController@update');

Route::get('/onlineExam','ExamController@index');

Route::post('/onlineexam1','ExamController@Exam');

Route::post('mark','ExamController@mark');

Route::post('/certdownload', function()
{
	$file= public_path(). "/abc.jpg";
	$headers = array(
		'Content-Type'=>'image/jpg',
	);
	return Response::download($file, 'certificate.jpg', $headers);
});

Route::get('library','LibraryController@index');

Route::get('addstorybook/addstory/{title}','LibraryController@showaddstorybook');

Route::post('addstorybook/addstory','LibraryController@addstorybook');

Route::post('addstory','LibraryController@store');

Route::get('viewstory','LibraryController@index1');

Route::get('DeleteStoryBook/{id}','LibraryController@delete');

Route::get('viewcontent/{id}','LibraryController@show');

Route::get('viewcontent/content/{id}','LibraryController@edit');

Route::get('/DeleteC/{id}','LibraryController@deleteContent');

Route::get('content/{id}/edit','LibraryController@edit');

Route::patch('content/{id}/edit','LibraryController@update');

Route::get('storybooks','LibraryController@index3');

Route::get('/storybooks/{id}/story','LibraryController@showcontent');

/////////////////////////////////////////////////////////////////




Route::get('upload', 'UploadController@index');

Route::post('apply/upload', 'ApplyController@upload');

Route::get('hgh', 'UploadController@dispUplds');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
