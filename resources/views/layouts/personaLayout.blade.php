<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/omar_style.css')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brian Gaytan & Omar Alvarez">
	<title>@yield('title')</title>
</head>
<body>
	<nav class="a">
	  <img class="img-fluid" src="http://localhost/fut-Stats/public/images/logo_icon.png" alt="FutStats Logo Icon">
	</nav>

	<ul>
		<li><a class="active" href="#">Inicio</a></li>
		<li><a href="/persona">Mostrar Personas</a></li>
		<li><a href="{{route('persona.create')}}">Registrar Persona</a></li>
		<li><a href="#">Registrar Director</a></li>
		<li><a href="#">Mostrar Jugadores</a></li>
		<li><a href="#">Mostrar Equipos</a></li>
		<li><a href="#">Encuentros</a></li>
		<li><a href="#">Resultados</a></li>
	</ul>	

	<div style="overflow:auto;">
		<div class="menu">
			<a href="#">Jugador</a>
			<a href="#">Equipo</a>
			<a href="#">Encuentro</a>
			<a href="#">Observaciones</a>
		</div>

		@section('main')
		@show

		<div class="right">

			<ul>
				<li><a href="#">Hombres</a></li>
				<li><a href="#">Mujeres</a></li>
				<li><a href="#">Todos</a></li>
			</ul>

			<h2>Resultados</h2>

			<div>
				<a href="#">Equipo Local</a>
				<label> vs </label>
				<a href="#">Equipo Visitante</a><br><hr>
				
				<a href="#">Equipo Local</a>
				<label> vs </label>
				<a href="#">Equipo Visitante</a><br><hr>

				<a href="#">Equipo Local</a>
				<label> vs </label>
				<a href="#">Equipo Visitante</a><br><hr>

				<a href="#">Equipo Local</a>
				<label> vs </label>
				<a href="#">Equipo Visitante</a><br><hr>
			</div>

			<h2>Encuentros</h2>

			<div>
				<a href="#">Equipo Local</a><h3>vs</h3><a href="#">Equipo Visitante</a><br><hr>
				<a href="#">Equipo Local</a><h3>vs</h3><a href="#">Equipo Visitante</a><br><hr>
				<a href="#">Equipo Local</a><h3>vs</h3><a href="#">Equipo Visitante</a><br><hr>
				<a href="#">Equipo Local</a><h3>vs</h3><a href="#">Equipo Visitante</a><br><hr>
				<a href="#">Equipo Local</a><h3>vs</h3><a href="#">Equipo Visitante</a><br><hr>
			</div>
		</div>
	</div>

	<div class="footer">
		Fut-Stats developed by Omar and Braian.
	</div></body>
</html>