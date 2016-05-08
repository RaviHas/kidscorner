@extends('appAdmin')

@section('content')
    <script src="dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">

    <h4 align="center" class="list-group-item active">Events</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th><p align="center">Event Title</p></th>
                <th><p align="center">Event Type</p></th>
                <th><p align="center">Starting Date</p></th>
                <th><p align="center">Venue</p></th>
                <th><p align="center">Starting Time</p></th>

                <th><p align="center">Action</p></th>
            </tr>
            </thead>

            @foreach($events as $evnts)
                <tbody>
                <tr class="success">
                    <td align="center">{{$evnts->title}}</td>
                    <td align="center">{{$evnts->type}}</td>
                    <td align="center">{{$evnts->eventDate}}</td>
                    <td align="center">{{$evnts->venue}}</td>
                    <td align="center">{{$evnts->time}}</td>
                    <td hidden>{{$evnts->id}}</td>
                    <td align="center" style="width: 85px"><a href="/ecalendar/{!!$evnts->id!!}/{!!$evnts->eventDate!!}/{!!$evnts->title!!}/{!!$evnts->time!!}/{!!$evnts->venue!!}/{!!$evnts->type!!}/{!!$evnts->endDate!!}">Update</a> |
                        <a href="/dcalendar/{!!$evnts->id!!}"  onclick="
                                if( ! confirm('Are you sure you want to delete?')){return false;}">
                            Delete</a></td>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection