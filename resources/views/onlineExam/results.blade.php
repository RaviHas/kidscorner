@extends('kids')

@section('content')

    <div class="container">
    <header id="head" class="secondary" style="height:160px">
        <div class="container">
            <img src="assets/images/qq.png" alt="" class="img-rounded pull-left" width="200" height="150">
            <img src="assets/images/kids.png" alt="" class="img-rounded pull-right" width="200" height="150">
            <h1>Online Quiz</h1>
            <p></p>

        </div>
    </header>

    <div class="col-md-12">
    <div class="grey-box-icon b3">
            <br>
            {!! Form::open(['url' => '/certdownload'])  !!}


            <div class="form-group" style="height: 700px">
                <h1><label for="score" style="margin-left:80px"><font color="#ff1493">Your Score is {{$mark}}/100</font></label></h1>

                @if($mark<35)
                    <div class="form-group">
                        <img src="To-Work-1024x576.png" alt="Mountain View" style="width:736px;height:568px;margin-left: 50px">

                    </div>

                @endif

                @if(File::exists('abc.jpg'))
                    <div class="form-group">
                        <img src="abc.jpg" alt="Mountain View" style="width:736px;height:568px;margin-left: 50px">
                        <br/>
                        <br/>
                        <table>
                            <tr>
                                <td><div class="form-group"  style="margin-left: 450px;width: 200px">
                                        {!! Form::submit('Download',['class' => 'btn btn-primary form-control'])  !!}
                                    </div></td>
                            </tr>
                        </table>
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection