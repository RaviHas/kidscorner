@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add a Story Book</div>
            <div class="panel-body">
                <br>
                @include('flash::message')
                {!! Form::open(array('url'=>'addstory','method'=>'POST', 'files'=>true)) !!}
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Title">Title</label></td>
                            <td style="width: 400px">{!! Form::text('title', $title ,['class'=>'form-control','readonly' => 'true']) !!}</td>
                        </tr>
                    </table>
                </div>

                <hr>

                <p style="margin-left: 300px; color: blue"> <b> Left Page </b> </p>
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Image" >Image</label></td>
                            <td>
                                <input type='file' name='file1' id ='file1' onchange="readURL(this);" />
                                <img id="im" src="#" alt="image" />
                                <script>
                                    function readURL(input1)
                                    {
                                        if (input1.files && input1.files[0])
                                        {
                                            var reader = new FileReader();
                                            reader.onload = function (e)
                                            {
                                                $('#im')
                                                        .attr('src', e.target.result)
                                                        .width(450)
                                                        .height(360);
                                            };
                                            reader.readAsDataURL(input1.files[0]);
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        @if($errors->has('file1'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('file1')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <hr>

                <p style="margin-left: 300px; color: blue"> <b> Right Page </b> </p>
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Image" >Image</label></td>
                            <td>
                                <input type='file' name='file2' id ='file2' onchange="readURL1(this);" />
                                <img id="imm" src="#" alt="image" />
                                <script>
                                    function readURL1(input)
                                    {
                                        if (input.files && input.files[0])
                                        {
                                            var reader = new FileReader();
                                            reader.onload = function (e)
                                            {
                                                $('#imm')
                                                        .attr('src', e.target.result)
                                                        .width(450)
                                                        .height(360);
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        @if($errors->has('file2'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('file2')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <hr>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Status">Status</label></td>
                            <td><select name="status" id="status" style="width: 200px;color:#080808 ">
                                    <option value="">Select One</option>
                                    <option value="pending">Pending</option>
                                    <option value="finish">Finish</option>
                                </select></td>
                        </tr>
                        @if($errors->has('status'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('status')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <br/>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="width: 200px">Add Content</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection