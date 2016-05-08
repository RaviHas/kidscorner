@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add a New Coruse</div>
            <div class="panel-body">
                <br>

                {!! Form::model($course, ['method'=> 'PATCH', 'action'=>['CourseController@update',$course->id ]]) !!}

                <table>
                    <tr>
                        <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                        <td>{!! Form::select('grade', array('Select One' => 'Select One', '2' => '2', '3' => '3', '4' => '4'), $grade,
                               ['class' => 'form-control','id' => 'grade','style' => "width:220px", 'onchang'=>"window.location.href = '/coursedrop/'+document.getElementById('grade').value +'/'+document.getElementById('subject').value "])!!}
                        </td>
                        <!--  'onchange'=>"window.location.href = '/home/'+document.getElementById('subject').value +'/'+document.getElementById('colour').value "
                        <td><select name="grade" id="grade" style="width: 200px;height:30px;color:#080808 ">
                                 <option value="">Select One</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                             </select>
                         </td>-->
                    @if($errors->has('grade'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="width:220px;height: 40px">{{$errors->first('grade')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                    <tr>
                        <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
                        <td>{!! Form::select('subject', array('Select One' => 'Select One', 'English' => 'English', 'Maths' => 'Maths', 'Environmental Studies' => 'Environmental Studies'), $subject,
                                ['class' => 'form-control', 'id' => "subject", 'style' => "width:220px" , 'onchang'=>"window.location.href = '/coursedrop/'+document.getElementById('grade').value +'/'+document.getElementById('subject').value"])!!}
                        </td>
                    </tr>
                    @if($errors->has('subject'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="width:220px;height: 40px">{{$errors->first('subject')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                        <td style="width: 200px"><label for="title" style="margin-bottom: 20px">Title</label></td>
                        <td style="width: 500px">
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </td>
                    </tr>
                    @if($errors->has('title'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="height: 40px">{{$errors->first('title')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                        <td style="width: 200px"><label for="discription" style="margin-bottom: 20px">Discription</label></td>
                        <td style="width: 500px">{!! Form::textarea('discription',null,['class'=>'form-control', 'rows' => 3]) !!}</td>
                    </tr>
                    @if($errors->has('discription'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="height: 40px">{{$errors->first('discription')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                        <td style="width: 200px"><label for="colour" style="margin-bottom: 20px">Colour</label></td>
                        <td>{!! Form::select('colour', array($course->colour => $course->colour, '#DC143C' => 'Crimson', '#8A2BE2' => 'BlueViolet',
                             '#0000CD' => 'MediumBlue', '#32CD32' => 'LimeGreen', '#FFD700"' => 'Gold'), '',
                               ['class' => 'form-control', 'id' => "colour",'style' => "width:220px" ])!!}
                        </td>
                    @if($errors->has('colour'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="width:220px;height: 40px">{{$errors->first('colour')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                    <tr>
                        <td style="width: 200px"><label for="video" style="margin-bottom: 20px">Video</label></td>
                        <td>{!! Form::select('video', $video, '',
                               ['class' => 'form-control','style' => "width:220px" ])!!}
                        </td>
                    @if($errors->has('video'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="width:220px;height: 40px">{{$errors->first('video')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                    <tr>
                        <td style="width: 200px"><label for="quiz" style="margin-bottom: 20px">Quiz</label></td>
                        <td >{!! Form::select('quiz', $quiz, '',['class' => 'form-control','style' => "width:220px" ])!!}
                        </td>
                    @if($errors->has('quiz'))
                        <tr><td></td>
                            <td><ul class="alert alert-danger" style="width:220px;height: 40px">{{$errors->first('quiz')}}</ul></td>
                        </tr>
                    @endif
                    <tr>
                </table>

                <div class="form-group">
                    {!! Form::submit('Edit Course',['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection