@extends('layouts.Layout')

@section('title', 'Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a class="link" href="/equipo/create">Registrar</a>
		<a class="link" href="/equipo">Mostrar</a>
		<a class="link" href="#">Observaciones</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Equipos</h1>
		<table border="1" align="center"  class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Fecha de Registro</th>
					<th scope="col">Activo</th>
					<th scope="col">Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipos as $equipo)
					<tr>
						<td>{{$equipo->id}}</td>
						<td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
						<td>{{$equipo->fecha_registro}}</td>
						<?php
							$activo = 'No';
							if($equipo->activo == 1)
								$activo = 'Si';
						?>
						<td>{{$activo}}</td>
						<td>
							<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="150px" alt="No Disponible">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<button class=" btn btn-success"><a href="{{URL::to('/equipo-pdf')}}">Descargar PDF</a></button>
	</div>

	
@endsection  