@extends('appAdmin')
@section('content')

{!! Form::open(array('url'=>'viewstory','method'=>'POST')) !!}


<h4 class="list-group-item active">Story Books</h4>
<div class="table-responsive" style="height: 600px">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Cover Page</th>
            <th>Decription</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>

        @foreach($storybook as $storybook)
            <tbody>
            <tr class="success">
                <td>{{$storybook->id}}</td>
                <td>{{$storybook->title}}</td>
                <td><img src="{{$storybook->file}}" alt="No Image" style="width:80px;height:30px;"></td>
                <td>{{$storybook->description}}</td>
                <td>{{$storybook->status}}</td>
                <td style="width: 100px"><a href="viewcontent/{{$storybook->id}}">View</a> |
                    <a href="<?php echo 'DeleteStoryBook/'.$storybook->id ?>" onclick="if (! confirm('Do you want to Delete This Record?'))
                                {return false;}">Delete</a></td>
            </tbody>
        @endforeach
    </table>
</div>


@endsection