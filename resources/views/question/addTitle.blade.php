@extends("appAdmin")
@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Add a New Title</div>
            <div class="panel-body" style="margin-left: 150px">
            <br>

            {!! Form::open([ 'method' => 'GET', 'action' => 'QuestionController@title'])  !!}
            <div class="form-group">
            <table>
                <tr>
                    <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                    <td style="width: 300px">{!! Form::text('grade', $grade ,['class'=>'form-control','readonly' => 'true']) !!}</td>
                </tr>
                <tr>
                    <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
                    <td style="width: 300px">{!! Form::text('subject', $subject ,['class'=>'form-control','readonly' => 'true']) !!}</td>
                </tr>
                <tr>
                    <td style="width: 200px"><label for="Title" style="margin-bottom: 20px">Title</label></td>
                    <td style="width: 300px">{!! Form::text('title', null ,['class'=>'form-control']) !!}</td>
                </tr>
                @if($errors->has('title'))
                    <tr><td></td>
                        <td><ul class="alert alert-danger" style="width:300px;height: 40px">{{$errors->first('title')}}</ul></td>
                    </tr>
                @endif

            </table>
            </div>

            <div class="form-group">
                <div class="col-md-5 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="width: 100px">Add Title</button>
                </div>
            </div>

            {!! Form::close() !!}
          </div>
    </div>
 </div>
 @endsection