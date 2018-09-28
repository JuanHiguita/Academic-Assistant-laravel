<!DOCTYPE html>
<html>
<head>
	<title>Academic Assistant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class= "navbar-brand js-scroll-trigger" id="menu" href="../index.html">Academic Assistant</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<i class="material-icons">menu</i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a id="cal_li" class="nav-link js-scroll-trigger" href="academic_calendar.html">Academic Calendar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" id="prom_li" href="average_notes.html">Average Notes</a>
					</li>
					<li class="nav-item">
						<a id="graf_li" class="nav-link js-scroll-trigger" href="graphics.html">Graphics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" id="nav-login" href="login.html">Log In</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<header id="headerLogin">
		<h1 style="text-align: center; color: white;">Sign Up</h1>
	</header>
	<div class="layout">
		<form id="loginForm" class="log-sign form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
			<div class="signup">
				<ul class="loginUl">
					<li class="liLogin">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<input class="text" value="{{ old('name') }}" id="name" type="text" name="name" placeholder="Name" value dispname="Name" maxlength="64" required>
                        <i></i>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
					</li>
					<li class="liLogin">
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						    <input class="text" value="{{ old('last_name') }}" id="last_name" type="text" name="last_name" placeholder="Last Name" value dispname="last_name" maxlength="64" required>
                            <i></i>
                            @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                    </div>
					</li>
					<li class="liLogin">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<input class="email" value="{{ old('email') }}" id="email" type="email" name="email" placeholder="Email" value dispname="Email" maxlength="64" required>
                        <i></i>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div> 
					</li>
					<li class="liLogin">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<input class="password" id="password" type="password" name="password" placeholder="Password" value dispname="Password" minlength="6" required>
                        <i></i>
                        @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
					</li>
					<li class="liLogin">
						<input class="password" id="conf_password" type="password" name="password_confirmation" placeholder="Confirm Your Password" value dispname="Password" minlength="6" required>
                        <i></i>  
                    </li>
					<li class="liLogin">
						<input type="submit" value="Sign Up"  id="signup-button" class="mainbtn submit-signup">
					</li>
				</ul>

				<p style="text-align: center">
					Already have an account?
					<a href="{{route('login')}}">Log In</a>
				</p>
			</div>
		</form>
	</div>

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
	<!--Carga el js para el funcionamíento del sitio-->
    <!--<script src="../js/login_signup.js"></script>-->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
