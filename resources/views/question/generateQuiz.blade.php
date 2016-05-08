@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Generate a Quiz</div>
            <div class="panel-body">
                <br>

                {!! Form::open([ 'method' => 'GET', 'url' => '/onlinequiz'])  !!}
                <div class="form-group" style="margin-left: 150px">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                            <td> {!! Form::select('grade', array('Select One' => 'Select One', '2' => '2', '3' => '3', '4' => '4'), $grade,
                               ['class' => 'form-control','id' => 'grade','style' => "width:220px", 'onchange'=>"window.location.href = '/genquiz/'+document.getElementById('grade').value +'/'+document.getElementById('subject').value "])!!}</td>
                        </tr>
                        @if($errors->has('grade'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:200px;height: 40px">{{$errors->first('grade')}}</ul></td>
                            </tr>
                        @endif


                        <tr>
                            <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
                            <td style="width: 200px">
                                {!! Form::select('subject', array('Select One' => 'Select One', 'English' => 'English', 'Maths' => 'Maths', 'Environmental Studies' => 'Environmental Studies'), $subject,
                                ['class' => 'form-control', 'id' => "subject", 'style' => "width:220px" , 'onchange'=>"window.location.href = '/genquiz/'+document.getElementById('grade').value +'/'+document.getElementById('subject').value"])!!}
                            </td>
                        </tr>
                        @if($errors->has('subject'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:200px;height: 40px">{{$errors->first('subject')}}</ul></td>
                            </tr>
                        @endif

                       <tr>
                            <td style="width: 200px"><label for="Title" style="margin-bottom: 20px">Title</label></td>
                            <td style="width:350px ">{!! Form::select('title', $title, null, ['class' => 'form-control'] )!!}</td>
                        </tr>
                        @if($errors->has('title'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:350px;height: 40px">{{$errors->first('title')}}</ul></td>
                            </tr>
                        @endif

                        <tr>
                            <td style="width: 200px"><label for="NoOfQuestions" style="margin-bottom: 20px">No of Questions</label></td>
                            <td style="width: 350px">{!! Form::text('noOfQuestions',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('noOfQuestions'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:350px;height: 40px">{{$errors->first('noOfQuestions')}}</ul></td>
                            </tr>
                        @endif

                        <tr>
                            <td style="width: 200px"><label for="Time" style="margin-bottom: 20px">Time for Quiz (Minutes)</label></td>
                            <td style="width: 350px"> {!! Form::input('number', 'time','', ['class'=>'form-control', 'id'=>'time','min'=>'5']) !!}</td>
                        </tr>
                        @if($errors->has('time'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:350px;height: 40px">{{$errors->first('time')}}</ul></td>
                            </tr>
                        @endif

                    </table>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <button type="submit" class="btn btn-primary" style="width: 100px">Add Quiz</button>
                    </div>
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection

