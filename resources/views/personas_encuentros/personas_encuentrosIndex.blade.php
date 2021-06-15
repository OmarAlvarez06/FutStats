@extends('layouts.Layout')

@section('title', 'Observaciones')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR Encuentros REGISTRADAS -->
	<div class="menu">
		<a class="link" href="/personaencuentro/create">Crear una observacion</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Observaciones</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Nombre jugador</th>
					<th scope="col">Equipo local</th>
					<th scope="col">Equipo visitante</th>
					<th scope="col">Sede</th>
					<th scope="col">Fecha</th>
					<th scope="col">Observacion</th>
					<th scope="col">Minuto</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($personas_encuentros as $notaciones)
					<tr>
						<td>{{$notaciones->nombre}}</td>
						<td>{{$notaciones->equipo_local}}</td>
						<td>{{$notaciones->equipo_visitante}}</td>
						<td>{{$notaciones->sede}}</td>
						<td>{{$notaciones->fecha_hora}}</td>
						<td>{{$notaciones->observacion_tipo}}</td>
						<td>{{$notaciones->minuto}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection