@extends('kids')

@section('content')


    <section class="container">
        <?php
            $a=true;

        ?>

        @foreach($u as $up)
            @while($a)
                <h1 align="center">Grade {{$up->grade}} &nbsp; {{$up->subject}}</h1>
                {{$a=false}}
            @endwhile
        @endforeach

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                @foreach($u as $up)
                    <?php

                    $grades=$up->grade;
                    $sub=$up->subject;
                    $surl=$up->url;
                    $lensize= strlen($surl);
                    $pos = strpos($surl, ".");
                    $pos1 = strpos($surl, "/");
                    $extract=abs($lensize-1-$pos)*-1;
                    $ext=substr($surl,$extract);
                    $extract1=abs($lensize-$pos1-1)*-1;
                    $fileName=substr($surl,$extract1);
                    $nfileName=substr($fileName,0,-4);
                    ?>

                    @if($grades==2 && strcmp($sub,"English")==0)



                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/2Eng.jpg') !!}" width="250px">
                                    <p  > <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>



                    @endif

                    @if($grades==2 && strcmp($sub,"Environmental Studies")==0)



                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/2Env.jpg') !!}" width="250px">
                                    <p > <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==2 && strcmp($sub,"Maths")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/2Math.gif') !!}" width="250px">
                                    <p> <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==3 && strcmp($sub,"Maths")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/3Math.jpg') !!}" width="250px">
                                    <p  > <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==3 && strcmp($sub,"Environmental Studies")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/3Env.jpg') !!}" width="250px" >
                                    <p > <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==3 && strcmp($sub,"English")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/3Eng.jpg') !!}" width="250px">
                                    <p> <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==4 && strcmp($sub,"Maths")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/4Math.jpg') !!}" width="250px">
                                    <p> <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==4 && strcmp($sub,"English")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/4Eng.jpg') !!}" width="250px" >
                                    <p> <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                    @if($grades==4 && strcmp($sub,"Environmental Studies")==0)


                        <td align="center">
                            <div class="arr1">
                                <a href="/{{$surl}} ">
                                    <img src="{!! asset('images/4Env.jpg') !!}" width="250px" >
                                    <p > <b><?php echo $nfileName;?></b></p>
                                </a>
                            </div>
                        </td>

                    @endif

                @endforeach
            </table>
        </div>

        <style>
            .arr1:hover{
                transform: scale(1.05,1.05);
                transition: 0.2s all ease-in-out;
                cursor:pointer;
            }
            .arr1 {
                padding: 1%;
                float: left;


            }
        </style>

    </section>
@endsection

