@extends('kids')

@section('content')
    <section class="container">

          <?php
            $time=$ev->time;
            $title=$ev->title;
            $date=$ev->eventDate;
            $v=$ev->venue;
            $photo=$ev->photo;
            $h=substr($time,0,-6);
            $min=substr($time,3,-3);
            $y=substr($date,0,-6);
            $m=substr($date,5,-3);
            $d=substr($date,8);
            $dl=substr($date,-1);
            if($dl==1)
                $s1="st";
            else if($dl==2)
                $s1="nd";
            else if($dl==3)
                $s1="rd";
            else
                $s1="th"
          ?>

              @if(0<=$h && 12>$h)
                  <?php $s="AM";?>
              @elseif(12<=$h && 24>$h)
                  <?php
                    $s="PM";
                  if($h==13){
                      $h=1;
                  }
                  elseif($h==14){
                      $h=2;
                  }
                  else if($h==15){
                      $h=3;
                  }
                  else if($h==16){
                      $h=4;
                  }
                  else if($h==17){
                      $h=5;
                  }
                  else if($h==18){
                      $h=6;
                  }
                  else if($h==19){
                      $h=7;
                  }
                  else if($h==20){
                      $h=8;
                  }
                  else if($h==21){
                      $h=9;
                  }
                  else if($h==22){
                      $h=10;
                  }
                  else if($h==23){
                      $h=11;
                  }

                  ?>
              @endif

              @if($m==1)
                  <?php $month = "January"; ?>
              @endif

              @if($m==2)
                  <?php $month = "February"; ?>
              @endif

              @if($m==3)
                  <?php $month = "March"; ?>
              @endif

              @if($m==4)
                  <?php $month = "April"; ?>
              @endif

              @if($m==5)
                  <?php $month = "May"; ?>
              @endif

              @if($m==6)
                  <?php $month = "June"; ?>
              @endif

              @if($m==7)
                  <?php $month = "July"; ?>
              @endif

              @if($m==8)
                  <?php $month = "August"; ?>
              @endif

              @if($m==9)
                  <?php $month = "September"; ?>
              @endif

              @if($m==10)
                  <?php $month = "October"; ?>
              @endif

              @if($m==11)
                  <?php $month = "November"; ?>
              @endif

              @if($m==12)
                  <?php $month = "December"; ?>
              @endif

              @if(strcmp($title,'New Year Day')==0)
                  <h1 align="center">Sinhala And Tamil New Year Festival</h1>
                  <div style="float: left">
                      <image src="{!!asset($photo)!!}" width="800px"></image>
                  </div>
                  <div style="float:right" >
                      <br>
                      <table>
                          <tr><td><h2 align="left">On:&nbsp;</h2><h1>{{$d}}<sup>{{$s1}}</sup>&nbsp;of &nbsp; {{$month}} &nbsp;{{$y}}</h1></td></tr>
                          <tr><td><h2 align="left">At:&nbsp;</h2> <h1>{{$h}}:{{$min}} &nbsp;{{$s}}</h1></td></tr>
                          <tr><td><h2 align="left">Venue:&nbsp;</h2><h1>{{$v}} </h1></td></tr>

                      </table>
                  </div>

              @elseif(strcmp($title,'Grade 2 Workshop')==0)
                  <h1 align="center">Workshop For Grade 2 Students</h1>
                  <div style="float: left">
                          <image src="{!!asset($photo)!!}" width="800px"></image>
                  </div>
                  <div style="float:right" >
                      <br>
                      <table>

                          <tr><td><h2 align="left">On:&nbsp;</h2><h1>{{$d}}<sup>{{$s1}}</sup>&nbsp;of &nbsp; {{$month}} &nbsp;{{$y}}</h1></td></tr>
                          <tr><td><h2 align="left">At:&nbsp;</h2> <h1>{{$h}}:{{$min}} &nbsp;{{$s}}</h1></td></tr>
                          <tr><td><h2 align="left">Venue:&nbsp;</h2><h1>{{$v}} </h1></td></tr>

                      </table>
                  </div>

              @else
                  <div >
                      <br>
                      @if($photo!=null)
                      <div style="float: left">
                          <image src="{!!asset($photo)!!}" width="800px"></image>
                      </div>
                      <div style="float:right" >
                          <br>
                      <table>
                          <tr><td><h1>Title:&nbsp;&nbsp;<font color=" blue">{{$title}}</font> </h1></td></tr>
                          <tr><td><h1>On:&nbsp;&nbsp;<font color=" blue">{{$d}}<sup>{{$s1}}</sup>&nbsp;of &nbsp; {{$month}} &nbsp;{{$y}}</font></h1></td></tr>
                          <tr><td><h1>At:&nbsp;&nbsp;<font color=" blue">{{$h}}:{{$min}} &nbsp;{{$s}}</font></h1></td></tr>
                          <tr><td><h1>Venue:&nbsp;&nbsp;<font color=" blue">{{$v}} </font></h1></td></tr>

                      </table>
                      </div>
                      @else
                          <table align="center">
                              <tr><td><h1>Title:&nbsp;&nbsp;<font color=" blue">{{$title}}</font> </h1></td></tr>
                              <tr><td><h1>On:&nbsp;&nbsp;<font color=" blue">{{$d}}<sup>{{$s1}}</sup>&nbsp;of &nbsp; {{$month}} &nbsp;{{$y}}</font></h1></td></tr>
                              <tr><td><h1>At:&nbsp;&nbsp;<font color=" blue">{{$h}}:{{$min}} &nbsp;{{$s}}</font></h1></td></tr>
                              <tr><td><h1>Venue:&nbsp;&nbsp;<font color=" blue">{{$v}} </font></h1></td></tr>

                          </table>
                      @endif
                  </div>

              @endif







        </section>
@endsection