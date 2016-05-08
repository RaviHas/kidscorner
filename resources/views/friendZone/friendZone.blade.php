@extends('childhome')

@section('content')


    <header id="head" class="secondary" onclick="window.location.assign('/friendzone')">
        <div class="container">
            <h1>Friends Zone</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
        </div>
    </header>

    <section class="container" >

        <div class="row">

            <article class="col-md-8 maincontent">
                <div class="share" style="background-color: rgb(95, 198, 78); padding: 2%;margin-top: 1%; border-radius: 3%">
                    <h3>Share</h3>
                    {!! Form::open(['url' => 'friendzone','method'=>'POST', 'files'=>true]) !!}
                    <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 800px">
                                {!! Form::textarea('status',null,['class' => 'form-control', 'rows' => '7']) !!}
                                @if($errors->has('status'))
                                    <p class="alert alert-danger"> {{ $errors->first('status') }}</p>
                                @endif
                            </td>
                            <td style="padding: 10px">
                                <img id="im" src="assets/images/upload.png" alt="image" style="width:280px;height:130px;" />
                                <input type='file' name='file' id ='file'  onchange="readURL(this);" />
                                @if($errors->has('file'))
                                    <p class="alert alert-danger"> {{ $errors->first('file') }}</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                            <script>
                                function readURL(input)
                                {
                                    if (input.files && input.files[0])
                                    {
                                        var reader = new FileReader();
                                        reader.onload = function (e)
                                        {
                                            $('#im')
                                                    .attr('src', e.target.result)
                                                    .width(250)
                                                    .height(150);
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',['class' => 'btn btn-primary form-control', ]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>



                <hr style="border: outset; border-color: #cdffe4; border-width:1px ">

                @foreach($shares as $share )
                    <table >
                        <tr>
                            <br>
                            <td style="width: 3000px"><div class="propic">PP</div><h4 style="display: inline;">&nbsp&nbsp{{$share->username}} </h4> </td>
                            <td style="width: 3000px"><h5 style="text-align:end; margin-right: 2%">{{$share->published}}</h5></td>
                        </tr>
                    </table>
                    <article style="padding: 20px 0px 0px 10px;">
                        <a style="font-size: medium; color: #737373">&nbsp{{$share->status}}</a>
                    </article>
                    <table>

                        <tr>
                            <td style="width: 3500px; padding-left: 120px">
                                @if($share->file != null)
                                    <div class="portfolio-items isotopeWrapper clearfix" id="3">

                                        <article class="col-sm-8 isotopeItem webdesign">
                                            <div class="portfolio-item">
                                                <img src="/{{$share->file}}" alt="" />
                                                <div class="portfolio-desc align-center">
                                                    <div class="folio-info">
                                                        <a href="/{{$share->file}}" class="fancybox">
                                                            <h5>VIEW</h5>
                                                            <i class="fa fa-link fa-2x"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endif
                                <table>
                                    <tr>
                                        <td style="width: 3500px; padding-left: 20px">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="friendzone/like/{{$share->id}}"><i class="fa fa-thumbs-o-up faa-bounce animated"></i> Like
                                                            @if($me==1)
                                                                <i class="fa fa-check"></i>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td style="padding-left: 100px">
                                                        @foreach($like as $i)
                                                            @if($i->sid==$share->id)
                                                                <p style="display: inline; color: #3e94ec; font-family: 'FontAwesome'">{{$i->total}}</p>
                                                                <p style="display: inline"> of your friends like this</p>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                        <td style="width: 400px">
                                            @if(Auth::user()->id == $share->uid)
                                                <div style=" float: right;">
                                                    <a href=" <?php echo 'friendzone/delete/'.$share->id ?>"
                                                       id="alert" onclick = "if (! confirm('Do You Want to delete This Record??')) { return false; }">Delete&nbsp</a>
                                                    <a href="/friendzone/{{$share->id}}/edit" class="default_popup" >Edit</a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <hr>
                @endforeach

            </article>

            <aside class="col-md-4 sidebar sidebar-right">

                <div class="row panel">
                    <div class="col-xs-12">
                        <h2>Notifications</h2>
                        <ul>
                        @foreach($noti as $noti)
                            <li><i class="fa fa-comments-o"></i>&nbsp{{$noti->uname}} liked your post. &nbsp&nbsp at &nbsp{{$noti->created_at}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>

            </aside>

        </div>
    </section>



@endsection