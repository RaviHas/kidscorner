@extends('kids')
@section('content')
    <div class="container">
        <header id="head" class="secondary" style="height:160px">
            <div class="container">
                <img src="assets/images/qq.png" alt="" class="img-rounded pull-left" width="200" height="150">
                <img src="assets/images/kids.png" alt="" class="img-rounded pull-right" width="200" height="150">
                <h1>Online Quiz</h1>
                <p></p>

            </div>
        </header>
        <div class="col-md-12">
            <div class="grey-box-icon b3">
                {!! Form::open([ 'url' => '/onlineexam1'])  !!}
                <div class="form-group" style="margin-left: 120px">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Grade" style="margin-bottom: 20px">Grade</label></td>
                            <td> {!! Form::select('grade', array('' => 'Select One', '2' => '2', '3' => '3', '4' => '4'), '',
                                ['class' => 'form-control',])!!}</td>
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
                        <tr>
                            <td style="width: 200px"><label for="Subject" style="margin-bottom: 20px">Title</label></td>
                            <td>{!! Form::select('title', $title, null, ['class' => 'form-control'] )!!}</td>
                        </tr>
                        @if($errors->has('title'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:200px;height: 40px">{{$errors->first('title')}}</ul></td>
                            </tr>
                        @endif
                        <tr>
                            <td></td>
                            <td ><button type="submit" class="btn btn-primary" style="width: 150px;margin-top: 20px">Next</button></td>
                        </tr>

                    </table>
                </div>
                {!! Form::close() !!}




            </div>
        </div><!--grey box -->
        </div>
    </div>
@endsection