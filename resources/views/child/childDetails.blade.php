@include('sweet::alert')
@extends('kids')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1>{{$child->childname}} {{$child->childlastname}} </h1>
        </div>
    </header>



    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-md-offset-2" >

                <div class="panel-body">

                    <div style="margin-top: 5%">

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
                            <img src="/uploads/{{$child->url}}
                                    " style="width: 150px;height: 150px;border-radius: 25%" >
                        </div>

                        <div style="width: 150px;height: 150px; margin-left: 40%;margin-top: 8px;">
                        {!! Form::open(array('url'=>"oneChild/{$child->id}",'method'=>'POST', 'files'=>true)) !!}
                            {!! Form::label('url','Change photo :') !!}
                            {!! Form::file('file') !!}
                        <div style="margin-top: 5%; margin-left: 9%">
                        {!! Form::submit('Upload',['class'=>'btn btn-upload']) !!}
                        {!! Form ::close()!!}
                        </div>
                        </div>

                        <table class="table ">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tr>
                                <td></td>
                                <td ><h4  >
                                        Child Name
                                    </h4>
                                </td>
                                <td><h4 >:</h4></td>
                                <td ><h4 >
                                        {{$child->childname}} {{$child->childlastname}}
                                    </h4>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td ><h4>
                                        User Name
                                    </h4>
                                </td>
                                <td><h4 >:</h4></td>
                                <td ><h4 >
                                        {{$child->username}}
                                    </h4>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td ><h4 >
                                        Grade
                                    </h4>
                                </td>
                                <td><h4 >:</h4></td>
                                <td ><h4 >
                                        {{$child->grade}}

                                    </h4>
                                </td>
                            </tr>

                        </table>


                       <div style="padding-left: 50px;padding-right: 50px;background-color:#00b3ee "><h2 style="color:white; margin-left:250px">Results</h2> </div>

                            <table class="table table-striped table-bordered table-hover ">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Title</th>
                                    <th>Result</th>

                                </tr>
                                </thead>

                                @foreach($results as $result)
                                    <tbody>
                                    <tr class="alert-warning">
                                        <td>{{++$i}}</td>
                                        <td>{{$result->subject}}</td>
                                        <td>{{$result->title}}</td>
                                        <td>{{$result->result}}</td>

                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection