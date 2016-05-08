<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet"  media="screen"  href="{!! asset('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!--[if lt IE 9]>
    <script src="/js/html5.js"></script>
    <link rel="stylesheet" href="/css/ie.css">

    <![endif]-->
    <link href="{{ URL::asset('assets/css/popup.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap-theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">

</head>
<body>

<header id="head" class="secondary" style="margin-bottom: 2%">
    <div class="container">
        <h1>Disscussion Forum</h1>
        <p>Edit your topic here!</p>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #2aaae2; color: white; font-size: medium">Edit your comment</div>

            </div>

            <div class="share" style="background-color: rgb(95, 198, 78); padding: 2%;margin-top: 1%; border-radius: 3%">
                <h3>Share</h3>
                {!! Form::model($share, ['method'=> 'PATCH','files'=>true, 'action'=>['friendZoneController@update',$share->id,  ]]) !!}
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
                                <img id="im" src="/{{$share->file}}" alt="image" style="width:280px;height:130px;" />
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

        </div>
    </div>
</div>
</body>
</html>