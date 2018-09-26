<!DOCTYPE html>
<html>
<head>
	<title>Academic Assistant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style_user.css">
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
						<a id="cal_li" class="nav-link js-scroll-trigger" href="/calendar">Academic Calendar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" id="prom_li" href="/average">Average Notes</a>
					</li>
					<li class="nav-item">
						<a id="graf_li" class="nav-link js-scroll-trigger" href="/graphics">Graphics</a>
					</li>
					<li class="nav-item">
						<a id="SignOut" class="nav-link js-scroll-trigger">Sign Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" id="form">
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Average</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>		
					@if (count($subject)>0)
						@foreach($subject as $subject)
						<tbody>
							<tr>
								<th scope="row">{{$subject->id}}</th>
								<td>{{$subject->name}}</td>
								<td>{{$subject->average}}</td>
								<td><a href="{{route('subject.show',$subject->id)}}">Show Notes</a></td>
								<td><a href="{{route('subject.delete',$subject->id)}}">Delete</a></td>
							</tr>
						</tbody>	
						@endforeach
					@else
						<tr>
							<td colspan="3">No hay datos</td>
						</tr>
					@endif
					</table> 
			</div>
			<div class="card-footer">
				<div class="row">
					<input type="button" id="btnAdd" value="Add Subject" onclick="window.location='{{route('subject.create')}}'">
				</div>
			</div>
		</div>
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
	<script src="dist/particles.min.js"></script>
	<script src="js/particles.js"></script>
	<!--Carga de los js para el funcionamiento del sitio
	<script src="js/login_signup.js"></script>
	<script src="js/promedio.js"></script>-->
</body>
</html>
