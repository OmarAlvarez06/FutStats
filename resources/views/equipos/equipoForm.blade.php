@extends('layouts.Layout')

@section('title', 'Registro Equipos')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a class="link" href="/equipo/create">Registrar</a>
		<a class="link" href="/equipo">Mostrar</a>
		<a class="link" href="#">Editar</a>
		<a class="link" href="#">Observaciones</a>
	</div>

	<form action="{{ route('equipo.store')}}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="main">
			<!-- Sub-Title -->
			<h1 class="display-4" align="center">Registrar Equipo</h1>
			<br><br>

			<div class="form-group row inputing">
				<!-- Nombre -->
				<label class="col-sm-2 col-form-label" for="nombre">Nombre</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="nombre" placeholder="Ingresa Aquí El Nombre Del Equipo">
				</div>
			</div>


			<div class="form-group row inputing">
				<!-- Fecha Creación -->
				<label class="col-sm-2 col-form-label" for="fecha_registro">Fecha De Creación</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_registro" >
				</div>
			</div>


			<div class="form-group row inputing">
				<!-- Logo Del Equipo -->
				<label for="imagen" class="col-sm-2 col-form-label">Logo</label>
				<div class="col-sm-10">
					<input  id="uploadInput" class="form-control form-control-lg" type="file" name="imagen" onchange="readURL(this);">
				</div>
			</div>

			<div class="text-center">
				<img  id="openedImage" class="rounded mx-auto d-block" src="#">
				<br>
			</div>

			<!-- Boton Enviar -->
			<button class=" btn btn-success btn-lg btn-block">Enviar</button>

		</div>
	</form>
@endsection