@extends('appAdmin')
@section('content')
    <div class="form-group" style="margin-left: 25%">
    <table>
        <tr><img src="/{{$story->file }}" alt="Mountain View" style="width:150px;height:150px; margin-left: 18%; margin-bottom:20px;"></tr>
        <tr>
            <td style="width: 100px"><label for="Title" style="margin-bottom:20px;">Title</label></td>
            <td style="width: 250px">{!! Form::text('title', $story->title ,['class'=>'form-control','readonly' => 'true']) !!}</td>
        </tr>
        <tr>
            <td style="width: 100px"><label for="Satus" style="margin-bottom:20px;">Status</label></td>
            <td style="width: 250px">{!! Form::text('status', $story->status ,['class'=>'form-control','readonly' => 'true']) !!}</td>
        </tr>
        <tr>
            <td style="width: 100px"><label for="Description" style="margin-bottom:20px;">Description</label></td>
            <td style="width: 250px">{!! Form::textarea('description', $story->description ,['class'=>'form-control','readonly'
             => 'true', 'rows' => 3]) !!}</td>
        </tr>

    </table>
    </div>
    <div class="form-group" style="margin-left: 5%">
        @foreach($content as $content)

            @if($content->file1!=null)
                <?php $a=$content->file1; ?>
            @endif

            @if($content->file2!=null)
                <?php $b=$content->file2; ?>
            @endif

            <table >
                <tr>
                    <td style="width: 300px"><p style="display: inline; color: white; font-size: medium"><img src="/{{$a }}" alt="Mountain View" style="width:300px;height:300px;"></td>
                    <td style="width: 300px"><p style="display: inline; color: white; font-size: medium"><img src="/{{$b }}" alt="Mountain View" style="width:300px;height:300px;"></td>
                    <td style="width: 100px"><a href="/content/{{$content->id}}/edit"> Edit</a> |
                        <a href="<?php echo '/DeleteC/' .$content->id ?>" onclick="if (! confirm('Do you want to Delete This Record?'))
                               {return false;}">Delete</a></td>
                </tr>
                <br/>
            </table>

        @endforeach
    </div>
@endsection