@extends('layouts.Layout')

@section('title', 'Mostrar Equipo')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="main" align="center">
		<h1 align="center">Equipo</h1>

		<label for="id">ID:</label>
		<input type="text" class="opaco" name="id" value="{{$equipo->id}}" readonly>
		<br><br>

		<label for="nombre">Nombre:</label>
		<input type="text" class="opaco" name="nombre" value="{{$equipo->nombre}}" readonly>
		<br><br>

		<label for="fecha_registro">Fecha de Registro:</label>
		<input type="text" class="opaco" name="nombre" value="{{$equipo->fecha_registro}}" readonly>
		<br><br>

		<label for="id">Imagen:</label>
		<img src="{{$equipo->Imagen}}">
		<br><br>

		<label for="activo">Activo:</label>
		<input type="text" class="opaco" name="activo" value="{{$equipo->activo}}" readonly>
		<br><br>

		<!-- Boton Enviar -->
		<button class="buttonEditar">Editar</button>
	</div>
@endsection