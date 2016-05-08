@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">Upload a file &nbsp;&nbsp;&nbsp;&nbsp; (Maximum file size 1000MB)</div>
                <div class="panel-body">

                    <div class="upld" style="margin-left: 30px; margin-top: 30px; padding: 20px">
                        <script src="dist/sweetalert2.min.js"></script>

                        <link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">
                        @include('flash::message')
                        {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true, 'class'=>'upldform')) !!}

                        <div class="control-group">
                            <div class="controls">
                                <div class="form-group col-md-5">
                                    {!! Form::label('Grade', 'Grade') !!}
                                </div>

                                <div class="form-group col-md-7">
                                    {!! Form::select('grade',array(''=>'Select A Grade','2'=>'2','3'=>'3','4'=>'4'),null,array('class'=>'form-control')) !!}

                                    @if($errors->has('grade'))
                                        <ul class="alert alert-danger"> {{$errors->first('grade')}}</ul>
                                    @endif
                                </div>

                                <div class="form-group col-md-5">
                                    {!! Form::label('Subject', 'Subject') !!}
                                </div>

                                <div class="form-group col-md-7">
                                    {!! Form::select('subject',array(''=>'Select A Subject','Maths'=>'Maths','English'=>'English','Environmental Studies'=>'Environmental Studies'),null,array('class'=>'form-control')) !!}


                                        @if($errors->has('subject'))
                                            <ul class="alert alert-danger"> {{$errors->first('subject')}}</ul>

                                        @endif
                                </div>

                                <div class="form-group col-md-5">
                                    {!! Form::label('Title', 'Title') !!}
                                </div>

                                <div class="form-group col-md-7">
                                    {!! Form::text('title',null,['class' => 'form-control']) !!}

                                    @if($errors->has('title'))

                                        <ul class="alert alert-danger" > {{$errors->first('title')}}</ul>
                                    @endif

                                </div>

                                <div class="form-group col-md-5">
                                    {!! Form::label('file', 'Select The File') !!}
                                </div>

                                <div class="form-group col-md-7">
                                    {!! Form::file('image',['class' => 'form-control']) !!}
                                      <p class="errors">{!!$errors->first('image')!!}</p>

                                    @if(Session::has('errorUpldFile'))
                                        <ul class="alert alert-danger" >
                                            <p class="errors">
                                                {!! Session::get('errorUpldFile') !!}
                                            </p>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-md-offset-5">

                            {!! Form::submit('Upload',array('class'=>'btn btn-primary','style'=>'width: 200px')) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection