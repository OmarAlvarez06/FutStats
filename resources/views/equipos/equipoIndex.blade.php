@extends('layouts.Layout')

@section('title', 'Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a href="/equipo/create">Registrar</a>
		<a href="/equipo">Mostrar</a>
		<a href="#">Editar</a>
		<a href="#">Observaciones</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Equipos</h1>
		<table border="1" align="center"  class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Fecha de Registro</th>
					<th scope="col">Imagen</th>
					<th scope="col">Activo</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipos as $equipo)
					<tr>
						<td>{{$equipo->id}}</td>
						<td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
						<td>{{$equipo->fecha_registro}}</td>
						<td>
							<img src="/uploads/equipos/{{$equipo->imagen}}"  class="img-thumbnail" width="150px" alt="No Disponible">
						</td>
						<td>{{$equipo->activo}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection  