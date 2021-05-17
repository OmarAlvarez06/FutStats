@extends('layouts.Layout')

@section('title', 'Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="main">
		<h1 align="center">Equipos</h1>
		<table border="1" align="center">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Fecha de Registro</th>
					<th>Imagen</th>
					<th>Activo</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipos as $equipo)
					<tr>
						<td>{{$equipo->id}}</td>
						<td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
						<td>{{$equipo->fecha_registro}}</td>
						<td>{{$equipo->imagen}}</td>
						<td>{{$equipo->activo}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection  