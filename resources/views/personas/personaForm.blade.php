@extends('layouts.Layout')

@section('title', 'Registro/Edición De Personas')

@section('main')
	
	<div class="menu">
		<a class="link" href="/persona-search">Buscar Persona</a>
		<a class="link" href="/persona">Mostrar Personas</a>
		<a class="link" href="/persona-pdf">Descargar PDF Personas</a>
	</div>

	@if(isset($persona))
		<form action="{{ route('persona.update', $persona)}}" method="POST" enctype="multipart/form-data">
			@method('PATCH')
	@else
		<form action="{{ route('persona.store')}}" method="POST" enctype="multipart/form-data">
	@endif
			@csrf

			<div class="main">

				<!-- Sub-Title -->
				<h1 class="display-4" align="center">Registrar/Editar Persona</h1>
				<br><br>

				<div class="form-group row inputing">
					<!-- Nombre -->
					<label class="col-sm-2 col-form-label" for="nombre">Nombre Completo</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="nombre" placeholder="Ingresa Aquí Tu Nombre" value="{{ $persona->nombre ?? '' }}">
					</div>
				</div>

				
				<div class="form-group row inputing">
					<!-- Edad -->
					<label for="edad" class="col-sm-2 col-form-label">Edad</label>
					<div class="col-sm-10">
						<input class="form-control" type="number" name="edad" min="1" max="100" placeholder="Ingresa Aquí Tu Edad" value="{{ $persona->edad ?? '' }}">
					</div>
				</div>

			
				<fieldset class="form-group inputing">
					<div class="row">	
					<!-- Sexo -->
					<legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" value="M" checked>
							<label class="form-check-label" for="sexo">
								Hombre
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" value="F">
							<label class="form-check-label" for="sexo">
								Mujer
							</label>
						</div>
						<div class="form-check disabled">
						<input class="form-check-input" type="radio" name="sexo" value="O">
						<label class="form-check-label" for="sexo">
							Otro
						</label>
						</div>
					</div>
					</div>
				</fieldset>

				<div class="form-group row inputing">
					<!-- Rol -->
					<label for="rol" class="col-sm-2 col-form-label">Rol</label>
					<div class="col-sm-10">
						<select name="rol">
							<option value="Jugador">Jugador</option>
							<option value="Entrenador">Entrenador</option>
							<option value="Auxiliar">Auxiliar</option>
						</select>
					</div>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Imagen</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="uploadInput" name="imagen" onchange="readURL(this);" value="imagen">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>

				<div class="text-center">
					<img  id="openedImage" class="rounded mx-auto d-block" src="#">
					<br>
				</div>


				<h1 align="center" class="display-4">Equipo</h1>
				<table border="1" align="center"  class="table table-dark table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Imagen</th>
							<th scpoe="col">Seleccionar?</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($equipos as $equipo)
							<tr>
								<td>{{$equipo->id}}</td>
								<td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
								<td>
									<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="150px" alt="No Disponible">
								</td>
								<td>
									<input type="radio" name="equipo" value="{{$equipo->id}}">
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
				<!-- Boton Enviar -->
				<button class=" btn btn-success btn-lg btn-block">Enviar</button>

			</div>
		</form>
@endsection