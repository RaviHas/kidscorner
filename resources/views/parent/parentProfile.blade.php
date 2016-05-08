@include('sweet::alert')
@extends('kids')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1>
                @foreach($parent as $a)
                    {{$a->name}}
                @endforeach
            </h1>
        </div>
    </header>


    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-md-offset-2" >

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="width: 150px;height: 150px; margin-left: 40%;margin-top: 8px;">
                        <img src="/uploads/{{$a->url}}
                                " style="width: 150px;height: 150px;border-radius: 25%" >
                    </div>

                    <div style="margin-top: 5%;width: 55%;margin-left: 25%;" >

                            <div style="margin-top: 5%;width: 55%;margin-left: 30%;" >

                                    {!! Form::open(array('url'=>"myProfile",'method'=>'POST', 'files'=>true)) !!}

                                    <p style="color: #00b3ee">
                                    {!! Form::label('file','Change photo :') !!}
                                    {!! Form::file('file') !!}</p>
                                    {!! Form::submit('Upload',['class'=>'btn btn-upload']) !!}
                                    {!! Form ::close()!!}
                            </div>

                            <div style="margin-top: 2%">
                                <table class="table ">

                                        <tr>
                                            <td>Name :</td>
                                            <td>{{$a->name}}</td>
                                        </tr>

                                        <tr>

                                            <td>Email :</td>
                                            <td>{{$a->email}}</td>
                                        </tr>

                                </table>
                            </div>
                   </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


@endsection