@extends('kids')
@section('content')


    <div class="container">
        <header id="head" class="secondary" style="height:160px">
            <div class="container">
                <img src="/{{$story->file}}" alt="" class="img-rounded pull-left" width="150" height="130">
                <h1>{{$story->title}}</h1>
                <p>{{$story->description}}</p>
            </div>
        </header>
        <br>
        <br>
        <section class="container" style="background-image:url('{{ asset('assets/images/oo.jpg') }}');height: 600px;width:800px ">
            @foreach($content as $contents)
                <?php $a=null; ?>
                <?php $b=null; ?>

                    <?php $a=$contents->file1; ?>
                    <?php $b=$contents->file2; ?>

                <table style="height: 330px;width: 680px;margin-top: 120px;margin-left: 50px">
                    <tr>
                        <td style="width: 340px"><img src="/{{$a}}" alt="Mountain View" style="width:330px;height:300px;"></td>
                        <td style="width: 340px"><img src="/{{$b}}" alt="Mountain View" style="width:330px;height:300px;"></td>
                    </tr>
                </table>
                <br>
            @endforeach
               <table>
                   <tr>
                       <td  style="width: 320px"></td>
                       <td  style="width: 320px">{!! $content->render() !!}</td>
                   </tr>
               </table>
        </section>
    </div>
@endsection