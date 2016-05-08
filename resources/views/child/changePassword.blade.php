@include('sweet::alert')
@extends('kids')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h3>Change Password of {{$child->childname}} {{$child->childlastname}}</h3>
        </div>
    </header>



    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-md-offset-2" >

                <div class="panel-body">
                    <div style="margin-top: 5%;width: 55%;margin-left: 25%;">

                        <div class="form-group">

                            @if(Session::has('flash_message'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                                    {{Session::get('flash_message')}}
                                </div>
                            @endif

                            
                            {!! Form::model($child,['method'=>'POST','action'=>['ChildController@updatePassword',$child->id]])  !!}

                            {!! Form::label('password','Current Password :') !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}


                                    @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}<br>
                                    </div>
                                    @endif


                            {!! Form::label('new_password','New Password :') !!}
                            {!! Form::password('new_password',['class'=>'form-control']) !!}

                                    @if ($errors->has('new_password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('new_password') }}<br>
                                    </div>
                                    @endif



                            {!! Form::label('confirm_password','Confirm Password :') !!}
                            {!! Form::password('new_password_confirmation',['class'=>'form-control']) !!}

                                    @if ($errors->has('new_password_confirmation'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('new_password_confirmation') }}<br>
                                    </div>
                                    @endif


                            {!! Form::hidden('id',$child->id) !!}

                            <div style="width: 150px;margin-left: 35%;margin-top: 2%">
                                {!! Form::submit('Update',['class'=>'btn btn-primary form-control','onclick' => "if (! confirm('Do You Want to change the password?')) { return false; }"]) !!}

                            </div>

                            {!! Form::close() !!}




                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection