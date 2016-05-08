@extends('appAdmin')
@section('content')

<!--View Questions-->


{!! Form::open(array('url'=>'viewquiz','method'=>'POST')) !!}
<div class="form-group">
    <table style="margin-top: 10px;margin-left: 250px">
        <tr></tr>
        <tr style="height: 5px">
            <td style="width: 100px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
            <td>{!! Form::select('grade', array('' => 'Select One', '2' => '2', '3' => '3', '4' => '4'), '',
                                ['class' => 'form-control', 'style' => "margin-top:-10px"])!!}</td>
            @if($errors->has('grade'))
                <td><ul class="alert alert-danger" style="height: 35px;margin-left: 5px">{{$errors->first('grade')}}</ul></td>
            @endif
        </tr>
        <tr style="height: 5px">
            <td style="width: 100px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
            <td>{!! Form::select('subject', array('' => 'Select One', 'English' => 'English', 'Maths' => 'Maths', 'Environmental Studies' => 'Environmental Studies'), '',
                                ['class' => 'form-control', 'style' => "margin-top:-10px"])!!}</td>
            @if($errors->has('subject'))
                <td ><ul class="alert alert-danger" style="height: 35px;margin-left: 5px">{{$errors->first('subject')}}</ul></td>
            @endif
        </tr>
        <tr>
            <td></td>
            <td><div class="form-group" >
                    {!! Form::submit('Search',['class' => 'btn btn-primary form-control']) !!}
                </div>
            </td>
        </tr>
    </table>
</div>
{!! Form::close() !!}

<h4 class="list-group-item active">Quizzes</h4>
<div class="table-responsive" style="height: 600px">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Grade</th>
            <th>Subject</th>
            <th>Title</th>
            <th>No Of Questions</th>
            <th>Time</th>
            <th></th>
        </tr>
        </thead>

        @foreach($quiz as $quiz)
            <tbody>
            <tr class="success">
                <td>{{$quiz->id}}</td>
                <td>{{$quiz->grade}}</td>
                <td>{{$quiz->subject}}</td>
                <td>{{$quiz->title}}</td>
                <td>{{$quiz->noOfQuestions}}</td>
                <td>{{$quiz->time}}</td>
                <td style="width: 100px"><a href="/editquiz/{{$quiz->id}}">Edit</a> |
                    <a href="<?php echo 'DeleteQuiz/' .$quiz->id ?>" onclick="if (! confirm('Do you want to Delete This Record?'))
                                {return false;}">Delete</a></td>
            </tbody>
        @endforeach
    </table>
</div>


@endsection