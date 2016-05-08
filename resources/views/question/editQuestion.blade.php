@extends('appAdmin')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Question</div>
            <div class="panel-body">
                <br>

                <!--add new question-->
                {!! Form::model($quiz,['method' => 'PATCH','files'=>true, 'action' => ['QuestionController@update', $quiz->id]]) !!}
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                            <td style="width: 200px">{!! Form::text('grade', $quiz->grade ,['class'=>'form-control','readonly' => 'true']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
                            <td style="width: 200px">{!! Form::text('subject', $quiz->subject ,['class'=>'form-control','readonly' => 'true']) !!}</td>
                        </tr>
                    </table>
                </div>

                <hr>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Title" style="margin-bottom: 20px">Title</label></td>
                            <td style="width: 300px">{!! Form::select('title', $categories, null, ['class' => 'form-control'] )!!}
                            </td>
                        </tr>
                        @if($errors->has('title'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('title')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>
                <hr>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="QuestionType" style="margin-bottom: 20px">Question Type</label></td>
                            <td style="width: 200px">{!! Form::select('questiontype', array($quiz->questiontype => $quiz->questiontype, 'questiontext' => 'Text Question', 'questionimage' => 'Image Question', 'both' => 'Both'), '',
                                ['class' => 'form-control',])!!}</td>
                        </tr>
                        @if($errors->has('questiontype'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('questiontype')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 200px"><label for="Question">Question</label></td>
                            <td style="width: 500px">{!! Form::textarea('questiontext',null,['class'=>'form-control','rows' => '5','width' => '400px' ]) !!}</td>
                        </tr>
                        @if($errors->has('questiontext'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:600px;height: 40px">{{$errors->first('questiontext')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td></td>
                            <td style="padding:10px;"><input type='file' name='questionimage' id ='questionimage' onchange="readURL(this);" />
                                <img id="im" src="/{{$quiz->questionimage}}" alt="image"  style="width:480px;height:260px;" /></td>
                        </tr>
                        @if($errors->has('questionimage'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:500px;height: 40px">{{$errors->first('questionimage')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                    <script>
                        function readURL(input)
                        {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e)
                                {
                                    $('#im')
                                            .attr('src', e.target.result)
                                            .width(480)
                                            .height(260);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>

                <hr>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Answer1" style="margin-bottom: 20px">Answer1</label></td>
                            <td style="width: 500px">{!! Form::text('answer1',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('answer1'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('answer1')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 200px"><label for="Answer2" style="margin-bottom: 20px">Answer2</label></td>
                            <td style="width: 500px">{!! Form::text('answer2',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('answer2'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('answer2')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 200px"><label for="Answer3" style="margin-bottom: 20px">Answer3</label></td>
                            <td style="width: 500px">{!! Form::text('answer3',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('answer3'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('answer3')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 200px"><label for="Answer4" style="margin-bottom: 20px">Answer4</label></td>
                            <td style="width: 500px">{!! Form::text('answer4',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('answer4'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('answer4')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td style="width: 200px"><label for="CAnswer" style="margin-bottom: 20px">Correct Answer</label></td>
                            <td style="width: 200px">{!! Form::select('canswer', array($quiz->canswer => $quiz->canswer,'1' => '1', '2' => '2', '3' => '3', '4' => '4'), '',
                                ['class' => 'form-control',])!!}</td>
                        </tr>
                        @if($errors->has('canswer'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px">{{$errors->first('canswer')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <button type="submit" class="btn btn-primary" style="width: 200px">Update Question </button>
                    </div>
                </div>
                <input type="hidden" name="id" value={{$quiz->id}} />

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection