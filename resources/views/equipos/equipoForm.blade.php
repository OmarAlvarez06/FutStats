@extends('layouts.Layout')

@section('title', 'Registro Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<form action="{{ route('equipo.store')}}" method="POST">
		@csrf

		<div class="main">
			<!-- Sub-Title -->
			<h1 align="center">Registrar Equipo</h1>
			<br><br>

			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre">
			<br><br>

			<!-- Fecha de creacion -->
			<label for="fecha_registro">Fecha de creacion:</label>
			<input type="date" name="fecha_registro">
			<br><br>

			<!-- Rol -->
			<label for="imagen">Imagen o logo:</label>
			<input type="file" name="imagen">
			<br><br>

			<!-- Boton Enviar -->
			<button class="buttonEnviar">Enviar</button>
		</div>
	</form>
@endsection