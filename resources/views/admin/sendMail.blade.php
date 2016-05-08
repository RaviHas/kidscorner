@extends('admin/appAdmin')

@section('content')



    {!! Form::open(array('url'=>'sendMail','method'=>'POST')) !!}

    {!! Form::label('subject','Subject :') !!}
    {!! Form::text('subject',null,['class'=>'form-control']) !!}
    @if ($errors->has('subject'))
        <div class="alert alert-danger">
            {{ $errors->first('subject') }}<br>
        </div>
    @endif

    {!! Form::label('body','E-mail :') !!}
    {!! Form::textArea('body',null,['class'=>'form-control']) !!}
    @if ($errors->has('body'))
        <div class="alert alert-danger">
            {{ $errors->first('body') }}<br>
        </div>
    @endif

    <div style="width: 500px; margin-left: 40%; margin-top: 2%">
        {!! Form::submit('Send',['class'=>'btn btn-primary ',]) !!}
    </div>

@endsection