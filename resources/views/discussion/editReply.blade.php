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

<header id="head" class="secondary" style="margin-top: 10%; margin-bottom: 5%">
    <div class="container">
        <h1>Disscussion Forum</h1>
        <p>Edit your reply here!</p>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #2aaae2; color: white; font-size: medium">Edit your comment</div>

            </div>

            {!! Form::model($reply, ['method'=> 'PATCH', 'action'=>['DiscussionController@updateReply', $topic->id, $reply->id]]) !!}
            <div class="form-group">
                {!! Form::textarea('reply',null,['class' => 'form-control']) !!}
                @if($errors->has('topic'))
                    <p class="alert alert-danger"> {{ $errors->first('topic') }}</p>
                @endif
            </div>
            <div class="form-group">
                <table>
                    <tr>
                        <td style="width: 250px"></td>
                        <td style="width: 250px; padding-right: 1px">
                            {!! Form::submit('Submit',['class' => 'btn btn-primary form-control', 'onclick' => "if (! confirm('Do You Want to edit This Record??')) { return false; }"]) !!}
                        </td>
                        <td style="width: 250px; padding-left: 1px">
                            {!! Form::button('Cancel',['class' => 'btn btn-danger form-control','onClick' => "window.location.assign('/disscussionforum')"]) !!}
                        </td>
                        <td style="width: 250px"></td>
                    </tr>
                </table>
                <hr>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
</body>
</html>