@extends('layouts.personaLayout')

@section('title', 'Registro Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<form action="{{ route('persona.store')}}" method="POST">
		@csrf

		<div class="main">
			<!-- Sub-Title -->
			<h1 align="center">Registrar Persona</h1>
			<br><br>

			<!-- Nombre Completo -->
			<label for="nombre">Nombre Completo:</label>
			<input type="text" name="nombre">
			<br><br>

			<!-- Edad -->
			<label for="edad">Edad:</label>
			<input type="number" name="edad" min="1" max="100">
			<br><br>

			<!-- Sexo -->
			<label for="sexo">Sexo:</label>
			<input type="radio" name="sexo" value="M">
			<label for="sexo">Hombre</label>
			<input type="radio" name="sexo" value="F">
			<label for="sexo">Mujer</label>
			<input type="radio" name="sexo" value="O">
			<label for="sexo">Otro</label>
			<br><br>

			<!-- Rol -->
			<label for="rol">Rol:</label>
			<select name="rol">
				<option value="Jugador">Jugador</option>
				<option value="Entrenador">Entrenador</option>
				<option value="Auxiliar">Auxiliar</option>
			</select>
			<br><br>

			<!-- Rol -->
			<label for="imagen">Imagen de la persona:</label>
			<input type="file" name="imagen">
			<br><br>

			<!-- Boton Enviar -->
			<button class="buttonEnviar">Enviar</button>
		</div>
	</form>
@endsection