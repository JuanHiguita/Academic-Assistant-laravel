<!DOCTYPE html>
<html>
<head>
	<title>Academic Assistant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="{{ asset('css/style_user.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class= "navbar-brand js-scroll-trigger" id="menu" href="">Academic Assistant</a>
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
	
    <div class="container" id="form">
		<h1 class="tittleForm">Add Note</h1>
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{route('subject.createNote',$subject->id)}}" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="hidden" name="subject_id" value="{{$subject->id}}">
					<h3 name="name" id="name">{{$subject->name}}</h3>
					
                </div>
                <div class="form-group">
                    <label for="name_note">Name Note</label>
                    <input type="tetx" name="name_note" class="form-control" id="name_note" placeholder="Name of Note">
                    <label for="qualification">Note</label>
                    <input type="number" step="0.01" name="qualification" class="form-control" id="qualification" placeholder="Note">
                    <label for="percentage">Percentage</label>
                    <input type="number" step="0.01" name="percentage" class="form-control" id="percentage" placeholder="percentage">
                    
				</div>
                <button type="submit" class="btn btn-primary btnSave" onclick="window.location='{{route('subject.createNote',$subject->id)}}'">Add</button>
            </form>
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
	<script src="{{asset('dist/particles.min.js')}}"></script>
	<script src="{{asset('js/particles.js')}}"></script>
</body>
</html>