@extends('layouts.personaLayout')

@section('title', 'Mostrar Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="main">
		<h1 align="center">Persona</h1>

		<label for="id">ID de la persona:</label>
		<input type="text" name="id" value="{{$persona->id}}">

		<table border="1" align="center">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Rol</th>
					<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$persona->id}}</td>
					<td>{{$persona->nombre}}</td>
					<td>{{$persona->edad}}</td>
					<td>{{$persona->sexo}}</td>
					<td>{{$persona->rol}}</td>
					<td><img src="{{$persona->Imagen}}"></td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection