<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/omar_style.css')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brian Gaytan & Omar Alvarez">

	<!-- Time javaScript -->
	<script type="text/javascript">
		function GiveTime () {
			var hora = new Date()
			var hoy = new Date();
			document.write(hoy.getYear()+"-"+hoy.getMonth()+"-"+hoy.getDate()+" "+hora.getHours()+":"+hora.getMinutes+":00");
  		}
	</script>
	<title>Registro Persona</title>
</head>
<body>
	<nav class="a">
	  <img class="img-fluid" src="http://localhost/fut-Stats/public/images/logo_icon.png" alt="FutStats Logo Icon">
	</nav>

	<ul>
		<li><a class="active" href="#">Inicio</a></li>
		<li><a href="/persona">Mostrar Personas</a></li>
		<li><a href="persona/create">Registrar Persona</a></li>
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

		<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
		MOSTRAR PERSONAS REGISTRADAS -->
		<form action="{{ route('persona.store')}}" method="POST">
			@csrf

			<div class="main">
				<!-- Sub-Title -->
				<h1 align="center">Registrar Persona</h1>
				<br>

				<!-- Nombre Completo -->
				<label for="nombre">Nombre Completo:</label>
				<input type="text" name="nombre">
				<br>

				<!-- Edad -->
				<label for="edad">Edad:</label>
				<input type="number" name="edad" min="1" max="100">
				<br>

				<!-- Sexo -->
				<label for="sexo">Sexo:</label><br>
				<input type="radio" name="sexo" value="M">
				<label for="sexo">Hombre</label>
				<input type="radio" name="sexo" value="F">
				<label for="sexo">Mujer</label>
				<input type="radio" name="sexo" value="O">
				<label for="sexo">Otro</label>
				<br>

				<!-- Rol -->
				<label for="rol">Rol:</label>
				<select name="rol">
					<option value="Jugador">Jugador</option>
					<option value="Entrenador">Entrenador</option>
					<option value="Auxiliar">Auxiliar</option>
				</select>
				<br>

				<!-- Boton Enviar -->
				<input type="submit" value="Enviar" name="Enviar">
			</div>
		</form>
		

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