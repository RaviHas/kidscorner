@extends('admin/appAdmin')

@section('content')


    <div style="width: 50%; margin-left: 25%; border-radius: 10px">

        {!! Form::open(array('url'=>'addAdmin','method'=>'POST')) !!}

        {!! Form::label('username','Username :') !!}
        {!! Form::text('username',null,['class'=>'form-control']) !!}
            @if ($errors->has('username'))
             <div class="alert alert-danger">
              {{ $errors->first('username') }}<br>
             </div>
            @endif

        {!! Form::label('email','E-mail :') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
            @if ($errors->has('email'))
             <div class="alert alert-danger">
              {{ $errors->first('email') }}<br>
             </div>
            @endif

        {!! Form::label('password','Password :') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
             @if ($errors->has('password'))
             <div class="alert alert-danger">
              {{ $errors->first('password') }}<br>
             </div>
             @endif

        {!! Form::label('confirmpassword','Confirm Password :') !!}
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
             @if ($errors->has('password_confirmation'))
             <div class="alert alert-danger">
              {{ $errors->first('password_confirmation') }}<br>
             </div>
            @endif


        <div style="width: 500px; margin-left: 40%; margin-top: 2%">
            {!! Form::submit('Create',['class'=>'btn btn-primary ',]) !!}
        </div>
    </div>
@endsection