@extends('admin/appAdmin')

@section('content')


    <div style="width: 35%; margin-left: 35%; border-radius: 10px">

            <div class="style-box-one Style-one-clr-one" style="border-radius: 10px;">
                <a href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <h3>Total Number of Views</h3>
                           <h4>{{$number}}</h4>
                </a>
            </div>

    </div>

    <hr>

    <h2 style="margin-left:5% ">Today's Visted Users</h2>

    <div style="width: 40%;margin-top: 2%; float: left;margin-left: 5%">

        <div class="panel panel-primary" >
            <div class="panel-heading">
               <h3>Parents</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="float: left">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($parents as $parent)
                        <tr class="alert-warning">
                            <td>{{++$i}}</td>
                            <td>{{$parent->user_id}}</td>
                            <td>{{$parent->name}}</td>
                            <td>{{$parent->created_at}}</td>

                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <div style="width: 40%;margin-top: 2%;float: left;margin-left: 10%">

        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3>Children</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="float: left">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($child as $children)
                            <tr class="alert-warning">
                                <td>{{++$j}}</td>
                                <td>{{$children->user_id}}</td>
                                <td>{{$children->name}}</td>
                                <td>{{$children->created_at}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>






@endsection

