@extends('appAdmin')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add a Story Book</div>
            <div class="panel-body">
                <br>

                {!! Form::open(array('url'=>'/addstorybook/addstory','method'=>'POST', 'files'=>true)) !!}
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Title" >Title</label></td>
                            <td style="width: 400px">{!! Form::text('title',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('title'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('title')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="CoverPage" >Cover Page</label></td>
                            <td>
                                <input type='file' name='file' id ='file' onchange="readURL(this);" />
                                <img id="im" src="#" alt="image" />
                                <script>
                                    function readURL(input)
                                    {
                                        if (input.files && input.files[0])
                                        {
                                            var reader = new FileReader();
                                            reader.onload = function (e)
                                            {
                                                $('#im')
                                                        .attr('src', e.target.result)
                                                        .width(250)
                                                        .height(250);
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        @if($errors->has('file'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('file')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="form-group">
                    <table>
                        <tr>
                            <td style="width: 200px"><label for="Description" >Discription</label></td>
                            <td style="width: 400px">{!! Form::textarea('description',null,['class'=>'form-control']) !!}</td>
                        </tr>
                        @if($errors->has('description'))
                            <tr><td></td>
                                <td><ul class="alert alert-danger" style="width:400px;height: 40px;margin-top: 5px">{{$errors->first('description')}}</ul></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="width: 200px">Create</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection