@extends('admin/appAdmin')

@section('content')


    <script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">


        window.onload = function () {


            var ar = [];

            var chart = new CanvasJS.Chart("chartContainer",
                    {
                        theme: "theme2",
                        title:{
                            text: "Visited users"
                        },
                        animationEnabled: false,
                        axisX: {
                            title:"Date",
                            valueFormatString: "DD-MMM",
                            interval:100,
                            //intervalType: "date"

                        },
                        axisY:{
                            title:"Number of Users",
                            includeZero: true,
                            interval:5

                        },
                        data: [
                            {
                                type: "spline",
                                //lineThickness: 3,
                                dataPoints: [

                                    { x: new Date(2016, 02, 26), y: parseInt(<?php echo json_encode(4); ?>) },
                                   { x: new Date(2016, 02, 28), y: 14},
                                    { x: new Date(2016, 02, 29), y: 2,},
                                    { x: new Date(2016, 03, 1), y: 6 },
                                    { x: new Date(2016, 04, 1), y: 5 },
                                    { x: new Date(2016, 05, 1), y: 3 },
                                    { x: new Date(2016, 06, 1), y: 8 },
                                    { x: new Date(2016, 07, 1), y: 4 },
                                    { x: new Date(2016, 08, 1), y: 10 },
                                    { x: new Date(2016, 09, 1), y: 5 },
                                    { x: new Date(2016, 10, 1), y: 0 },
                                    { x: new Date(2016, 11, 1), y: 10 }

                                ]


                            }


                        ]




                    });

            chart.render();

        }
    </script>
    <div id="chartContainer" style="height: 30%; width: 100%;">

    </div>
@endsection