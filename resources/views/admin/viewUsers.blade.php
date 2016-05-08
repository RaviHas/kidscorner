@extends('admin/appAdmin')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-head-line">Users</h1>
    </div>

  </div >

  @include('flash::message')

  <div class="panel panel-primary">

    <div class="panel-heading">
      Child Accounts
    </div>

    <div class="panel-body">
      <div class="table-responsive table-bordered">
        <table class="table table-striped table-bordered table-hover ">
          <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Grade</th>
            <th>Created Date</th>
            <th></th>
          </tr>
          </thead>

          @foreach($users as $user)
            <tbody>
            <tr class="alert-warning">
              <td>{{++$i}}</td>
              <td>{{$user->id}}</td>
              <td>{{$user->childname}}</td>
              <td>{{$user->childlastname}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->grade}}</td>
              <td>{{$user->created_at}}</td>
              <td ><a href="<?php echo 'DeleteQChild/' .$user->id ?>" onclick="if( ! confirm('Do you want to delete this user ?'))
              {return false;}">
                  Delete</a></td>
            </tr>
            </tbody>
          @endforeach
        </table>
      </div>
    </div><!--panel body-->


  </div>

  <div class="panel panel-primary">

    <div class="panel-heading">
      Parent Accounts
    </div>

    <div class="panel-body">
      <div class="table-responsive table-bordered">
        <table class="table table-striped table-bordered table-hover ">
          <thead>
          <tr>

            <th>#</th>
            <th>ID</th>

            <th>Name</th>
            <th>Email</th>
            <th>Created Date</th>
            <th></th>
          </tr>
          </thead>

          @foreach($users2 as $user2)
            <tbody>
            <tr class="alert-warning">
              <td>{{++$j}}</td>
              <td>{{$user2->id}}</td>
              <td>{{$user2->name}}</td>
              <td>{{$user2->email}}</td>
              <td>{{$user2->created_at}}</td>

              <td ><a href="<?php echo 'DeleteQParent/' .$user2->id ?>" onclick="if( ! confirm('Do you want to delete this user ?')){return false;}">Delete</a></td>
            </tr>
            </tbody>
          @endforeach
        </table>
      </div>
    </div><!--panel body-->


  </div>
@endsection