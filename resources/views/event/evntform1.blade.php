@extends('appAdmin')

@section('content')
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">Update an Event</div>
            <div class="panel-body">
                <br>



                <script src="{!!asset('dist/sweetalert2.min.js')!!}"></script>
                <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                <link rel="stylesheet" type="text/css" href="{!!asset('dist/sweetalert2.css')!!}">

                {!! Form::open(array('url'=>'ecalendar','method'=>'POST')) !!}

                <div class="form-group col-md-5">

                    {!! Form::label('titles', 'Event Title') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::text('title',$title,['class' => 'form-control']) !!}


                    @if($errors->has('title'))

                        <ul class="alert alert-danger" > {{$errors->first('title')}}</ul>

                    @endif
                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('Types', 'Event Type') !!}

                </div>

                <div class="form-group col-md-7">
                    {!! Form::select('type', array('' => 'Select A Type','Workshop' => 'Workshop',
                    'Social' => 'Social','Other' => 'Other'),$value=$type,$options = array('id' => 'type','class' => 'form-control'))
                    !!}
                    {!! Form::hidden('color','', ['id' => 'color']) !!}

                    @if($errors->has('type'))

                        <ul class="alert alert-danger" > {{$errors->first('type')}}</ul>
                    @endif
                </div>

                <div class="form-group col-md-5">
                    {!! Form::label('dates', 'Starting Date') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('date', 'eventDate', $value =$date, $options = array('class' => 'form-control')) !!}
                    @if($errors->has('eventDate'))

                        <ul class="alert alert-danger" > {{$errors->first('eventDate')}}</ul>


                    @endif

                </div>


                <div class="form-group col-md-5">
                    {!! Form::label('dates', 'Ending Date') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('date', 'endDate', $value = $endDate,$options = array('class' => 'form-control')) !!}

                    @if($errors->has('endDate'))

                        <ul class="alert alert-danger" > {{$errors->first('endDate')}}</ul>



                    @endif

                </div>


                <div class="form-group col-md-5">
                    {!! Form::label('Venue', 'Venue') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::text('venue',$venue,['class' => 'form-control']) !!}


                    @if($errors->has('venue'))

                        <ul class="alert alert-danger" > {{$errors->first('venue')}}</ul>



                    @endif
                </div>


                <div class="form-group col-md-5">
                    {!! Form::label('Time', 'Stating Time') !!}
                </div>

                <div class="form-group col-md-7">
                    {!! Form::input('time', 'time', $value = $time, $options = array('class' => 'form-control')) !!}

                    @if($errors->has('time'))
                        <ul class="alert alert-danger" > {{$errors->first('time')}}</ul>


                    @endif


                    @if(Session::has('errorTime1'))
                        <ul class="alert alert-danger" >{!! Session::get('errorTime1') !!}</ul>
                    @endif

                    @if(Session::has('errorDate1'))
                        <ul class="alert alert-danger" >{!! Session::get('errorDate1') !!}</ul>
                    @endif

                </div>

                {!! Form::hidden('id',$id ) !!}




                <div class="form-group col-md-6 col-md-offset-5">
                    {!! Form::submit('Update',['class'=>'btn btn-primary form-control',
                    'onclick'=>"if( ! confirm('Are you sure you want to update?')){return false;}"]) !!}
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