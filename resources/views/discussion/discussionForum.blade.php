@extends('kids')

@section('content')

    <header id="head" class="secondary" onclick="window.location.assign('/disscussionforum')">
        <div class="container">
            <h1>Disscussion Forum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
        </div>
    </header>

    <section class="container" >

        <div class="row">

            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <br />
                <br />
                <h2>Public Topic</h2>

                <!--form to submit a topic-->
                {!! Form::open(['id' => 'form1', 'url' => '/disscussionforum']) !!}
                <div class="form-group">
                    @include('flash::message')
                    {!! Form::textarea('topic',null,['class' => 'form-control', 'rows' => '5']) !!}
                    @if($errors->has('topic'))
                        <p class="alert alert-danger"> {{ $errors->first('topic') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit('Start a new Discussion',['class' => 'btn btn-primary form-control' ]) !!}
                </div>
                {!! Form::close() !!}
                <hr style="border: outset; border-color: #cdffe4; border-width:1px ">
                <div class="panel panel-default">
                    <!--select each row in table and assign to a variable-->
                    @foreach($topics as $topic)
                        <table >
                            <tr>
                                <br>
                                <td style="width: 3000px;padding: 10px 0px 20px 0px;"><div class="propic">PP</div><h4 style="display: inline; ">&nbsp&nbsp{{$topic->username}} </h4> </td>
                                <td style="width: 3000px;"><h5 style="text-align:end; margin-right: 2%;">{{$topic->published}}</h5></td>
                            </tr>
                        </table>

                        <!--view topic-->
                        <article style="padding: 0px 0px 0px 10px;">
                            <a href="/disscussionforum/{{$topic->id}}" style="font-size: medium; color: #737373">&nbsp{{$topic->topic}}</a>
                            <br>

                            <!--Track user inorder to give edit delete permission-->
                            @if(Auth::user()->id == $topic->uid)
                                <div class="btn-div" style="float: right">
                                    <a id="del" href=" <?php echo 'deleteTopic/'.$topic->id ?> " onclick = "if (! confirm('Do You Want to delete This Record??')) { return false; }">Delete&nbsp</a>
                                    <a href="/disscussionforum/{{$topic->id}}/editTopic" class="default_popup">Edit</a>
                                </div>
                                @endif
                        </article>
                        <!--view reply for each topic-->
                        @if($topic->id == $pid )
                            <div style="width: 550px; margin-left: 12% ">
                                <hr>
                                @foreach($replys as $reply)
                                    <table >
                                        <tr>
                                            <td style="width: 3000px"><h5 style="display: inline">{{$reply->uname}} </h5> </td>
                                            <td style="width: 3000px"><h6 style="text-align:end; margin-right: 2%;">{{$reply->published}}</h6></td>
                                        </tr>
                                    </table>

                                    <article>
                                        <p style="font-size: small ;">{{$reply->reply}}</p>
                                        <!--Track user inorder to give edit delete permission for replies-->
                                        @if(Auth::user()->id == $reply->uid)
                                            <div class="btn-div" style="float: right">
                                                <a href="/disscussionforum/{{$topic->id}}/{{$reply->id}}/delete" style="font-size: smaller;" onclick = "if (! confirm('Do You Want to delete This Record??')) { return false; }">Delete&nbsp</a>
                                                <a href="/disscussionforum/{{$topic->id}}/{{$reply->id}}/editReply" class="default_popup" style="font-size: smaller;">Edit</a>
                                            </div>
                                        @endif
                                    </article>
                                    <br>
                                    <hr>
                                @endforeach


                                <!--form to submit a reply-->
                                <div class="post">
                                    {!! Form::open(['id' => 'form2','url' => "disscussionforum/{$pid}"]) !!}
                                    <div class="form-group">
                                        {!! Form::textarea('reply',null,['class' => 'form-control', 'rows' => '4']) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        @if($errors->has('reply'))
                                            <p class="alert alert-danger"> {{ $errors->first('reply') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('Post',['class' => 'btn btn-primary form-control']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                        <hr style="border: outset; border-color: #cdffe4; border-width:1px ">
                    @endforeach
                </div>

                 </article>
            <!-- /Article -->

            <!-- Sidebar -->
            <aside class="col-md-4 sidebar sidebar-right">

                <div class="row panel">
                    <div class="col-xs-12">
                        <h3 style="margin-top: 25%">My Topics</h3>

                        @foreach($mytopics as $mytopic)
                            <table >
                                <tr>
                                    <br>
                                    <td style="width: 3000px;padding: 10px 0px 20px 0px;"><h4 style="display: inline; ">&nbsp&nbsp{{$mytopic->username}} </h4> </td>
                                    <td style="width: 3000px;"><h5 style="text-align:end; margin-right: 2%;">{{$mytopic->published}}</h5></td>
                                </tr>
                            </table>

                            <!--view topic-->
                            <article style="padding: 0px 0px 0px 10px;">
                                <a href="/disscussionforum/{{$mytopic->id}}" style="font-size: medium; color: #737373">&nbsp{{$mytopic->topic}}</a>
                                <br>

                                <!--Track user inorder to give edit delete permission-->
                                @if(Auth::user()->id == $mytopic->uid)
                                    <div class="btn-div" style="float: right">
                                        <a id="del" href=" <?php echo 'deleteTopic/'.$topic->id ?> " onclick = "if (! confirm('Do You Want to delete This Record??')) { return false; }">Delete&nbsp</a>
                                        <a href="/disscussionforum/{{$topic->id}}/editTopic" class="default_popup">Edit</a>
                                    </div>
                                @endif
                            </article>
                            <hr style="border: outset; border-color: #cdffe4; border-width:1px ">
                        @endforeach

                    </div>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>

    </section>



@endsection()