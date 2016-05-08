@extends('kids')

@section('content')
    <header id="head" class="secondary" style="height:160px">
        <div class="container">
            <img src="assets/images/aaa.png" alt="" class="img-rounded pull-left" width="200" height="150">
            <img src="assets/images/cc.png" alt="" class="img-rounded pull-right" width="200" height="150">
            <h1>Story Books</h1>
            <p>dffffffffffffffffff</p>

        </div>
    </header>

    <section class="container">

            @foreach($storybook as $storybook)
                <div class="col-md-3">
                    <div class="grey-box-icon b3" style="height: 400px; ">
                        <h4>{{$storybook->title}}</h4>
                        <img src="/{{$storybook->file }}" alt="Mountain View" style="width:150px;height:150px; margin-left: 18%; margin-bottom:20px;">
                        <p>{{$storybook->description}}</p>
                        <p><a href="/storybooks/{{$storybook->id}}/story"><em>Read</em></a></p>
                    </div><!--grey box -->
                </div><!--/span3-->
            @endforeach

    </section>


@endsection