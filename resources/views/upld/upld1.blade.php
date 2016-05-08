@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">Edit Uploaded Material Details</div>
            <div class="panel-body">

                <div class="upld" style="margin-left: 30px; margin-top: 30px; padding: 20px">
                    <script src="dist/sweetalert2.min.js"></script>

                    <link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">

                    {!! Form::open(array('url'=>'hgh1','method'=>'POST', 'files'=>true, 'class'=>'upldform')) !!}

                    <div class="control-group">
                        <div class="controls">
                            <div class="form-group col-md-5">
                                {!! Form::label('Grade', 'Grade') !!}
                            </div>
                            <div class="form-group col-md-7">
                                {!! Form::select('grade', array('' => 'Select A Grade','2' => '2', '3' => '3','4' => '4'), $value=$grade,$options = array('class' => 'form-control')) !!}


                                @if($errors->has('grade'))
                                    <ul class="alert alert-danger" > {{$errors->first('grade')}}</ul>
                                @endif
                            </div>

                            <div class="form-group col-md-5">
                                {!! Form::label('Subject', 'Subject') !!}
                            </div>

                            <div class="form-group col-md-7">
                                {!! Form::select('subject', array('' => 'Select A Subject','English' => 'English', 'Maths' => 'Maths','Environmental Studies' => 'Environmental Studies'), $value=$sub,$options = array('class' => 'form-control')) !!}

                                @if($errors->has('subject'))
                                    <ul class="alert alert-danger" > {{$errors->first('subject')}}</ul>

                                @endif
                            </div>

                            <div class="form-group col-md-5">

                                {!! Form::label('Title', 'Title') !!}
                            </div>

                            <div class="form-group col-md-7">
                                {!! Form::text('title',$value=$title,['class' => 'form-control']) !!}

                                @if($errors->has('title'))
                                    <ul class="alert alert-danger" > {{$errors->first('title')}}</ul>
                                @endif
                            </div>


                            {!! Form::hidden('id',$ids ) !!}
                            <div class="form-group col-md-6 col-md-offset-5">
                                {!! Form::submit('Update',['class'=>'btn btn-primary form-control',
                                            'onclick'=>"if( ! confirm('Are you sure you want to update?')){return false;}"]) !!}
                            </div>

                        </div>
                    </div>



                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection