@include('sweet::alert')
@extends('kids')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1>Create Child Account</h1>
            <p>Create an account for your child at KidsCorner.com!</p>
        </div>
    </header>


    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-md-offset-2" >

                <div class="panel-body">
                    <div style="margin-top: 5%;width: 55%;margin-left: 25%;" >
                    {!! Form::open(array('url'=>'addChildAccount','method'=>'POST')) !!}

                    {!! Form::label('childname','First Name :') !!}
                    {!! Form::text('childname',null,['class'=>'form-control']) !!}

                         @if ($errors->has('childname'))
                            <div class="alert alert-danger">
                             {{ $errors->first('childname') }}<br>
                            </div>
                         @endif



                    {!! Form::label('childlastname','Last Name :') !!}
                    {!! Form::text('childlastname',null,['class'=>'form-control']) !!}

                         @if ($errors->has('childlastname'))
                            <div  class="alert alert-danger">
                             {{ $errors->first('childlastname') }}<br>
                            </div>
                         @endif



                    {!! Form::label('username','User name :') !!}
                    {!! Form::text('username',null,['class'=>'form-control']) !!}

                        @if ($errors->has('username'))
                            <div  class="alert alert-danger">
                            {{ $errors->first('username') }}<br>
                            </div>
                         @endif


                    {!! Form::label('grade','Grade :') !!}
                    <div style="color: black" class="form-group">
                        {!! Form::select('grade',array(
                         'null'=>'Select one','2' => 'Grade 2', '3' => 'Grade 3','4'=>'Grade 4'),null,['class'=>'form-control']
                         ) !!}
                    </div>

                        @if ($errors->has('grade'))
                            <div  class="alert alert-danger">
                            {{ $errors->first('grade') }}<br>
                            </div>
                        @endif



                    {!! Form::label('password','Password :') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}

                        @if ($errors->has('password'))
                            <div  class="alert alert-danger">
                            {{ $errors->first('password') }}<br>
                            </div>
                        @endif


                    {!! Form::label('confirmpassword','Confirm Password :') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

                         @if ($errors->has('confirmpassword'))
                            <div  class="alert alert-danger alert-important">
                             {{ $errors->first('confirmpassword') }}<br>
                            </div>
                         @endif



                <div style="width: 500px; margin-left: 35%; margin-top: 2%">
                    {!! Form::submit('Create',['class'=>'btn btn-primary ',]) !!}
                </div>
                </div>

                {!! Form::close() !!}
                   </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


@endsection