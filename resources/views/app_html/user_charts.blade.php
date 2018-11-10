<!DOCTYPE html>
<html>
<?php
    function connect(){
        $mysqli = new mysqli('localhost', 'root', '17032000JsH2018+', 'academicassistant');
        $mysqli->set_charset("utf8");
        if(!$mysqli)
            exit();
           
        $con=mysqli_select_db($mysqli,'academicassistant');
        if(!$con)
            exit();
        
        return $mysqli;
    }
    $mysqli = connect();
    $con = mysqli_query($mysqli,"SELECT * FROM notes");
    ?>    
<head>
	<title>Academic Assistant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="{{ asset('css/style_user.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Carga amcharts-->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/3/themes/black.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class= "navbar-brand js-scroll-trigger" id="menu" >Academic Assistant</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<i class="material-icons">menu</i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a id="cal_li" class="nav-link js-scroll-trigger" href="">Academic Calendar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" id="prom_li" href="/home">Average Notes</a>
					</li>
					<li class="nav-item">
						<a id="graf_li" class="nav-link js-scroll-trigger" href="">Graphics</a>
					</li>
					<li class="nav-item">
						<a id="SignOut" class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							Logout
						</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}			
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    <div id="chartdiv">

    <script>
        var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "black",
    "marginTop":0,
    "marginRight": 80,
    "dataProvider": [
            <?php while($row = mysqli_fetch_array($con)){ ?>
            {    
                "year":"<?php echo $row['name_note']?>",
                "value":<?php echo $row['qualification']?>
            },
    <?php } ?>
    ],
    
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left"
    }],
    "graphs": [{
        "id":"g1",
        "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
        "bullet": "round",
        "bulletSize": 8,
        "lineColor": "#d1655d",
        "lineThickness": 2,
        "negativeLineColor": "#637bb6",
        "type": "smoothedLine",
        "valueField": "value"
    }],
    "chartScrollbar": {
        "graph":"g1",
        "gridAlpha":0,
        "color":"#888888",
        "scrollbarHeight":55,
        "backgroundAlpha":0,
        "selectedBackgroundAlpha":0.1,
        "selectedBackgroundColor":"#888888",
        "graphFillAlpha":0,
        "autoGridCount":true,
        "selectedGraphFillAlpha":0,
        "graphLineAlpha":0.2,
        "graphLineColor":"#c2c2c2",
        "selectedGraphLineColor":"#888888",
        "selectedGraphLineAlpha":1

    },
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY",
        "cursorAlpha": 0,
        "valueLineEnabled":true,
        "valueLineBalloonEnabled":true,
        "valueLineAlpha":0.5,
        "fullWidth":true
    },
    "dataDateFormat": "YYYY",
    "categoryField": "year",
    "categoryAxis": {
        "minPeriod": "YYYY",
        "parseDates": true,
        "minorGridAlpha": 0.1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    }
});

chart.addListener("rendered", zoomChart);
if(chart.zoomChart){
	chart.zoomChart();
}

function zoomChart(){
    chart.zoomToIndexes(Math.round(chart.dataProvider.length * 0.4), Math.round(chart.dataProvider.length * 0.55));
}
        </script>
    </div>





	<!--cargar Jquery, Popper.js, y el js para bootstrap -->
	<script
	src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<!--Carga Particles.js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
	<canvas class="background"></canvas>
	<script src="{{asset('dist/particles.min.js')}}"></script>
	<script src="{{asset('js/particles.js')}}"></script>
    
    <!--<script src="{{asset('js/chart.js')}}"></script>-->
</body>
</html>