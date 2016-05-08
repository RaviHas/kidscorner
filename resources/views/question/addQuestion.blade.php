@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add a New Question</div>
            <div class="panel-body">
                <br>
                <!--go to addQues page for add questions according to grade and subject-->
                {!! Form::open([ 'method' => 'GET', 'action' => 'QuestionController@addQues'])  !!}
                <div class="form-group" style="margin-left: 150px">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                           <td> {!! Form::select('grade', array('' => 'Select One', '2' => '2', '3' => '3', '4' => '4'), '',
                                ['class' => 'form-control',])!!}</td>
                        </tr>
                        @if($errors->has('grade'))
                           <tr><td></td>
                               <td><ul class="alert alert-danger" style="width:200px;height: 40px">{{$errors->first('grade')}}</ul></td>
                           </tr>
                        @endif


                        <tr>
                            <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Subject</label></td>
                            <td>{!! Form::select('subject', array('' => 'Select One', 'English' => 'English', 'Maths' => 'Maths', 'Environmental Studies' => 'Environmental Studies'), '',
                                ['class' => 'form-control',])!!}</td>
                        </tr>
                        @if($errors->has('subject'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:200px;height: 40px">{{$errors->first('subject')}}</ul></td>
                            </tr>
                        @endif

                    </table>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <button type="submit" class="btn btn-primary" style="width: 100px">Next</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection