@extends('kidsExam')

@section('content')
    <div class="container">
        <header id="head" class="secondary" style="height:160px">
            <div class="container">
                <!--<img src="assets/images/qq.png" alt="" class="img-rounded pull-left" width="200" height="150">-->
               <img src="assets/images/kids.png" alt="" class="img-rounded pull-right" width="200" height="150">
                <h1>Online Quiz</h1>
                <p style="font-size: larger">{{$title}}</p>
                <p  style="margin-top: -50px;margin-left: -1000px"> <table style="border:0px;">
                    <tr>
                        <td style="width:100px;font-size: medium"><h1>Time</h1></td>
                        <td colspan="4"><span id="ms_timer"></span></td>
                    </tr>
                </table></p>

            </div>
        </header>
        <div class="col-md-12">
            <div style="padding: 30px; background-color: #F1FDEC; margin-top: 10px">
                <div class="form-group" >

                    {!! Form::open(array('url'=>'mark','method'=>'POST','id'=>'form1', 'files'=>true)) !!}



                    <br>

                    <input type="hidden" name="grade" value={{$grade}} />
                    <input type="hidden" name="subject" value={{$subject}} />
                    <input type="hidden" name="title" value="{{$title}}" />
                    <input type="hidden" name="noOfQus" value={{$noOfQus}} />
                    @foreach($quize as $quize)
                        @if($quize!=null)
                            <table>
                                @if( $quize->questiontype == 'questiontext')
                                    <tr><p style="font-size: 22px ; color: #000000">{{++$no}}&nbsp;.&nbsp;{{$quize->questiontext}}</p></tr>
                                @elseif($quize->questiontype == 'questionimage')
                                    <tr><p style="font-size: 22px ; color: #000000">{{++$no}}</p></tr>
                                    <tr> <img src="{{$quize->questionimage}}" alt="Mountain View" style="width:600px;height:250px;margin-left: 20px"></tr>
                                @else
                                    <tr><p style="font-size: 22px ; color: #000000">{{++$no}}&nbsp;.&nbsp;{{$quize->questiontext}}</p> </p> </tr>
                                    <tr><img src="{{$quize->questionimage}}" alt="Mountain View" style="width:600px;height:250px;margin-left: 20px"></tr>
                                    <tr></tr>
                                @endif
                            </table>

                            <input type="hidden" name="id{{$no}}" value={{$quize->id}}>

                            <table style="margin-left: 50px;margin-top: 20px">

                                <tr>
                                    <input name="q{{$no}}" type="hidden" value="0" />
                                    <td style="width: 450px; font-size: 20px">
                                        <p style="display: inline"><input name="q{{$no}}" type="radio" value="1" style=" width: 1em; height: 1em;" >&nbsp;&nbsp;{{$quize->answer1}} </p>
                                    </td>
                                    <td style="width: 450px; font-size: 20px">
                                        <p style="display: inline"> <input name="q{{$no}}" type="radio" value="2"style=" width: 1em; height: 1em;" >&nbsp;&nbsp;{{$quize->answer2}} </p>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="width: 450px; font-size: 20px">
                                        <p style="display: inline"><input name="q{{$no}}" type="radio" value="3" style=" width: 1em; height: 1em;">&nbsp;&nbsp;{{$quize->answer3}}</p>
                                    </td>
                                    <td style="width: 450px; font-size: 20px">
                                        <p style="display: inline"><input name="q{{$no}}" type="radio" value="4" style=" width: 1em; height: 1em;">&nbsp;&nbsp;{{$quize->answer4}} </p>
                                    </td>
                                </tr>
                            </table>
                            <hr style="border: outset; border-color: #cdffe4; border-width:2px ">
                        @endif
                    @endforeach

                    {!! Form::submit('Submit Answers',['class' => 'btn btn-primary form-control']) !!}

                    {!! Form::close() !!}


            </div>
        </div><!--grey box -->
    </div>
    </div>
@endsection