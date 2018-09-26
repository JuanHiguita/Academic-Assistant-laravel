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
            <h3>Edit Subject</h3>
            <div class="card-body">
            <form method="POST" action="{{route('subject.update',$subject->id)}}" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input  type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$subject->name}}">
                </div>
                <div class="form-group">
                    <label for="name_note">Name Note</label>
                    <input type="tetx" name="name_note" class="form-control" id="name_note" placeholder="Name of Note">
                    <label for="qualification">Qualification</label>
                    <input type="number" name="qualification" class="form-control" id="qualification" placeholder="Quialification">
                    <label for="percentage">Percentage</label>
                    <input type="number" name="percentage" class="form-control" id="percentage" placeholder="percentage">
                    
                </div>
                <input type="button" class="btn btn-primary" id="btnAddNote" value="Add Note">
                <button type="submit" class="btn btn-primary">Update</button>
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