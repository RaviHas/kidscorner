@extends('appAdmin')

@section('content')
    <h4 align="center" class="list-group-item active">Uploaded Materials</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th><p align="center">Subject</p></th>

                <th><p align="center">Grade</p></th>
                <th><p align="center">Unit</p></th>
                <th><p align="center">Action</p></th>


            </tr>
            </thead>
            @foreach($upldtbls as $uplds)
                <?php



                $surl=$uplds->url;
                $lensize= strlen($surl);
                $pos = strpos($surl, ".");
                $pos1 = strpos($surl, "/");
                $extract=abs($lensize-1-$pos)*-1;
                $ext=substr($surl,$extract);
                $extract1=abs($lensize-$pos1-1)*-1;
                $fileName=substr($surl,$extract1);
                ?>

                <tbody>
                <tr class="success">
                    <td align="left">{{$uplds->subject}}</td>
                    <td align="left">{{$uplds->grade}}</td>
                    <td align="left"><?php echo $fileName;?></td>

                    <td align="left" style="width: 85px"><a href="/{{$surl}}">Open</a> |
                        <a href="/hgh/{{$uplds->id}}">Delete</a></td>
                </tbody>
            @endforeach
        </table>
    </div>









@endsection