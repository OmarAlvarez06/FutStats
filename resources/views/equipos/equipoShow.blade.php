@extends('layouts.Layout')

@section('title', 'Mostrar Equipo')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a class="link" href="/equipo/create">Registrar</a>
		<a class="link" href="/equipo">Mostrar</a>
		<a class="link" href="#">Editar</a>
		<a class="link" href="#">Observaciones</a>
	</div>

	<div class="main">
		<h1 align="center">Equipo</h1>

		<div class="container mt-5 d-flex justify-content-center">
			<div class="card p-3">
				<div class="d-flex align-items-center">
					<div class="image"> 
					<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="400px" alt="No Disponible">
					</div>
					<div class="ml-3 w-100">
						<h4 class="mb-0 mt-0">{{$equipo->nombre}}</h4> 
						<span>{{$equipo->fecha_registro}}</span>
						<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
							<div class="d-flex flex-column"> <span>ID</span> <span >{{$equipo->id}}</span> </div>
							<?php
								$activo = 'No';
								if($equipo->activo == 1)
									$activo = 'Si';
							?>
							<div class="d-flex flex-column"> <span>Activo</span> <span>{{$activo}}</span> </div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<br><br>

	</div>
@endsection