

@extends('appAdmin')

@section('content')

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">Add a new Event</div>
            <div class="panel-body">
                <br>


                <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

                <link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">

                @include('flash::message')
                {!! Form::open(array('url'=>'calendars','method'=>'POST', 'files'=>true)) !!}
                <div class="form-group col-md-5">
                     {!! Form::label('titles', 'Event Title') !!}
                </div>
                <div class="form-group col-md-7">
                     {!! Form::text('title',null,['class' => 'form-control']) !!}


                     @if($errors->has('title'))

                        <ul class="alert alert-danger"> {{$errors->first('title')}}</ul>

                     @endif

                </div>


                <div class="form-group col-md-5">

                    {!! Form::label('Types', 'Event Type') !!}

                </div>

                <div class="form-group col-md-7">
                    {!! Form::select('type', array('' => 'Select A Type','Workshop' => 'Workshop', 'Social' => 'Social','Other' => 'Other'), 'Select A Type', ['id' => 'type','class' => 'form-control']) !!}

                    {!! Form::hidden('color','', ['id' => 'color']) !!}


                    @if($errors->has('type'))

                        <ul class="alert alert-danger" > {{$errors->first('type')}}</ul>

                    @endif
                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('dates', 'Starting Date') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('date', 'eventDate', $value = null, $options = array('class' => 'form-control')) !!}

                    @if($errors->has('eventDate'))

                        <ul class="alert alert-danger" > {{$errors->first('eventDate')}}</ul>
                    @endif

                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('dates', 'Ending Date') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('date', 'endDate', $value = null,$options = array('class' => 'form-control')) !!}

                    @if($errors->has('endDate'))

                        <ul class="alert alert-danger" > {{$errors->first('endDate')}}</ul>

                    @endif
                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('Venue', 'Venue') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::text('venue',null,['class' => 'form-control']) !!}


                    @if($errors->has('venue'))

                        <ul class="alert alert-danger" > {{$errors->first('venue')}}</ul>
                    @endif

                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('Time', 'Starting Time') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('time', 'time', $value = null,$options = array('class' => 'form-control')) !!}

                    @if($errors->has('time'))

                        <ul class="alert alert-danger" > {{$errors->first('time')}}</ul>

                    @endif
                    @if(Session::has('errorTime'))

                        <ul class="alert alert-danger" >{!! Session::get('errorTime') !!}</ul>

                    @endif
                    @if(Session::has('errorDate'))

                        <ul class="alert alert-danger" >{!! Session::get('errorDate') !!}</ul>

                    @endif
                </div>
                <div class="form-group col-md-5">
                    {!! Form::label('Event Photo') !!}
                </div>
                <div class="form-group col-md-7">

                    <input type='file' name='photo' id ='photo' class ='form-control'/>

                    @if($errors->has('photo'))

                        <ul class="alert alert-danger" > {{$errors->first('photo')}}</ul>
                    @endif
                </div>

                <div class="form-group col-md-6 col-md-offset-5">
                    {!! Form::submit('Add', array('class'=>'btn btn-primary','style'=>'width: 200px')) !!}

                </div>


                {!! Form::close() !!}

            <script>
                $(function(){
                    $('#type').on('change', function(){
                        if ( $('#type').val() == 'Workshop' )
                            $('#color').val('Orange');

                        else if ( $('#type').val() == 'Social' )
                            $('#color').val('Red');
                        else if ( $('#type').val() == 'Other' )
                            $('#color').val('Green');
                    });
                });
            </script>


        </div>
    </div>
</div>
@endsection