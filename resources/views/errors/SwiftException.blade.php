
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free-educational-responsive-web-template-webEdu">
    <meta name="author" content="webThemez.com">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Kiddo</title>
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet"  media="screen"  href="{!! asset('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2-master/dist/sweetalert2.css' ">
    <script src="assets/sweetalert2-master/dist/sweetalert2.min.js "></script>



    <!-- Custom styles for our template -->

    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap-theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Fixed navbar -->

<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="{!! asset('assets/images/logo.png') !!}" alt="Techro HTML5 template"></a>
        </div>

        <!--/.nav-collapse -->
    </div>
</div>
<div style="margin-top: 10%"></div>
<header id="head" class="secondary">
    <div class="container">
        <h1>No internet connection</h1>
        <a href="home" class="btn btn-default">Reload</a>

    </div>
</header>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{!! 'assets/js/sweetalert2.min.js' !!}"></script>
<script src="{!! 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' !!}"></script>
<script src="{!! 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js' !!}"></script>
<script src="{!! 'assets/js/custom.js' !!}"></script>

<script>
    document.querySelector('#form1').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        swal({
                    title: "Submit Post",
                    text: "Do you want yo submit this post",
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: 'successful',
                            type: 'success'
                        }, function() {
                            form.submit();
                        });

                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
    });

</script>
</body>
</html>
