@extends('admin/appAdmin')

@section('content')




    <script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">


        window.onload = function () {


            var dps=<?php echo json_encode($user_info2);?>;


        var chart = new CanvasJS.Chart("chartContainer",{
            title :{
                text: "Visited Users"
            },
            axisX: {
                title: "Date",
                intervalType: "month",
                valueFormatString: "MMM",
                interval:1,
            },
            axisY: {
                title: "Number of Users",
                includeZero: false,
                interval:5
            },
            data: [{
                type: "line",
                dataPoints : dps
            }]
        });
        //alert(dps);
        chart.render();
        }
    </script>
    <div id="chartContainer" style="height: 50%; width: 100%;">

    </div>


@endsection