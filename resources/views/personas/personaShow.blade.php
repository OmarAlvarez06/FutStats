@extends('layouts.personaLayout')

@section('title', 'Mostrar Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="main" align="center">
		<h1 align="center">Persona</h1>

		<label for="id">ID:</label>
		<input type="text" class="opaco" name="id" value="{{$persona->id}}" readonly>
		<br><br>

		<label for="id">Nombre completo:</label>
		<input type="text" class="opaco" name="nombre" value="{{$persona->nombre}}" readonly>
		<br><br>

		<label for="id">Edad:</label>
		<input type="text" class="opaco" name="edad" value="{{$persona->edad}}" readonly>
		<br><br>

		<label for="id">Sexo:</label>
		<input type="text" class="opaco" name="sexo" value="{{$persona->sexo}}" readonly>
		<br><br>

		<label for="id">Rol:</label>
		<input type="text" class="opaco" name="rol" value="{{$persona->rol}}" readonly>
		<br><br>

		<label for="id">Imagen:</label>
		<img src="{{$persona->Imagen}}">
		<br><br>

		<!-- Boton Enviar -->
		<button class="buttonEditar">Editar</button>
	</div>
@endsection