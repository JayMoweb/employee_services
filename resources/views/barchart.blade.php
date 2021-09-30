<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bar Chart</title>
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
    <div class="container">
        <h2>BarChart</h2>
        <div class="panel-body">
            <div id="bar-chart"></div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        Highcharts.chart('bar-chart',{
            charts: {
                type : 'column'
            },
            tittle : {
                text : 'Employee Salary'
            },
            xAxis: {
                categories : <?= $employee ?>,
                crosshair : true
            },
            yAxis : {
                min :0,
                title: {
                    text : 'Salary'
                }
            },
            tooltips : {
                headerFormat : '<span style="font-size :10px">{point.key} Salary</span>',
                pointFormat : '<tr><td style="color:{series.color};padding:0">{series.name}:</td>' + '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat : '</table>',
                shared : true,
                useHTML : true
            },
            
            plotOptions : {
                column : {
                    pointPadding : 0.2,
                    borderWidth : 0
                }
            },
            series : <?= $data ?>
        });
    });
    
</script>