<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brian Gaytan & Omar Alvarez">
	<link type="image/png" rel="icon" href="{{asset('images/icon.png')}}">
	
	<title>@yield('title')</title>

	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
	<!-- Third party plugin CSS-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
	<!-- Core themes CSS (includes Bootstrap)-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstraping.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/myStyle.css')}}">

</head>
<body id="page-top">
		<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
			<div class="container">
				<img class="img-fluid" src="{{asset('images/logo_icon.png')}}" alt="FutStats Logo Icon">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto my-2 my-lg-0"> <!-- class="active" -->
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="/inicio">Inicio</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="/persona">Personas</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="/equipo">Equipos</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="/sede">Sedes</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Encuentros</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Resultados</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Main Section -->
		<section class="page-section mainSection">

			@section('main')
			@show
			
		<div class="restaurador"></div>

		</section>	

		<footer class="footer">
			Fut-Stats developed by Omar and Brian.
		</footer>

		<!-- Bootstrap core JS-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Third party plugin JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
		<!-- Core theme JS-->
		<script src="{{asset('js/scripts.js')}}"></script>
		<!-- Our JS Functions -->
		<script src="{{asset('js/functions.js')}}"></script>
</body>
</html>