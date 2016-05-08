@extends('kids')

@section('content')

    <section class="container">
        <h1 align="center">Choose your course</h1>
        <br>

        {!! Form::open(array('url'=>'apply/select','method'=>'POST')) !!}


            <div class="form-group col-md-5">
                {!! Form::label('Grade', 'Grade') !!}
            </div>

            <div class="form-group col-md-7">
                <select name="grade" class = "form-control" >
                    <option value="Select A Grade">Select A Grade</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="form-group col-md-5">
                {!! Form::label('Subject', 'Subject') !!}
            </div>

            <div class="form-group col-md-7">
                <select name="subject" class = "form-control">
                    <option value="Select A Subject">Select A Subject</option>
                    <option value="English">English</option>
                    <option value="Maths">Maths</option>
                    <option value="Environmental Studies">Environmental Studies</option>
                </select>
                @if(Session::has('msg'))
                    <ul class="alert alert-danger" >{!! Session::get('msg') !!}</ul>
                @endif

            </div>

            <div class="form-group col-md-6 col-md-offset-5">
                {!! Form::submit('Next', array('class'=>'btn btn-primary','style'=>'width: 200px')) !!}
            </div>
        {!! Form::close() !!}


        <img src="images/select.jpg">


    </section>
@endsection

