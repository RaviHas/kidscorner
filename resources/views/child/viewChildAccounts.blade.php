@extends('kids')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1>My Child Accounts</h1>
        </div>
    </header>



    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-md-offset-2" >

                <div class="panel-body">

                    <div style="margin-top: 5%">

                    @include('flash::message')

                    <table class="table table-striped table-bordered table-hover ">
                    <thead>
                    </thead>
                        @foreach($children as $user)
                            <tbody>
                            <tr class="alert-warning">
                                <td>{{++$i}}</td>
                                <td>
                                    <img src="/uploads/{{$user->url}}" style="width: 50px;height: 50px; border-radius: 3px;" >
                                </td>
                                <td>  <a  href="oneChild/{{$user->id}}"> {{$user->username}}</a></td>
                                <td> <a href="{{action('ChildController@loadEditPage',[$user->id])}}"> Edit Profile</a></td>
                                <td><a  href="changePw/{{$user->id}}"> Change Password</a></td>
                                <td > <a class="btn btn-danger"  href="<?php echo 'DeleteChild/' .$user->id ?>" onclick="
                                if( ! confirm('Do you want to delete this user ?')){return false;}">
                                        Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"></script>
<script>
    $('#flash-overlay-modal').modal();
    //$('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

