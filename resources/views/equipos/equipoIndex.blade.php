@extends('layouts.Layout')

@section('title', 'Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a class="link" href="/equipo/create">Registrar Equipo</a>
		<a class="link" href="/equipo-search">Buscar Equipo</a>
		<a class="link" href="/equipo">Mostrar Equipos</a>
		<a class="link" href="/equipo-pdf">Descargar PDF Equipos</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Equipos</h1>
		<table border="1" align="center"  class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nombre</th>
					<th scope="col">Creación</th>
					<th scope="col">Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipos as $equipo)
					<tr>
						<td>{{$equipo->id}}</td>
						<td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
						<td>{{$equipo->fecha_creacion}}</td>
						<td>
							<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="150px" alt="No Disponible">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	
@endsection  