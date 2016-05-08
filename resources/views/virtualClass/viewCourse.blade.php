@extends('appAdmin')

@section('content')
    <h4 align="center" class="list-group-item active">Uploaded Materials</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th><p align="center">Grade</p></th>
                <th><p align="center">Subject</p></th>
                <th><p align="center">Title</p></th>
                <th><p align="center">Discription</p></th>
                <th><p align="center">Colour</p></th>
                <th><p align="center">Video</p></th>
                <th><p align="center">Quize</p></th>


            </tr>
            </thead>
            @foreach($course as $courses)

                <tbody>
                <tr class="success">
                    <td align="center">{{$courses->grade}}</td>
                    <td align="left">{{$courses->subject}}</td>
                    <td align="left">{{$courses->title}}</td>
                    <td align="left">{{$courses->discription}}</td>
                    <td align="left">{{$courses->colour}}</td>
                    <td align="left">{{$courses->video}}</td>
                    <td align="left">{{$courses->quiz}}</td>
                    <td align="left" style="width: 85px"><a href="/viewcourse/edit/{{$courses->id}}">Edit</a> |
                        <a href="/viewcourse/delete/{{$courses->id}}">Delete</a></td>
                </tbody>
            @endforeach
        </table>
    </div>









@endsection