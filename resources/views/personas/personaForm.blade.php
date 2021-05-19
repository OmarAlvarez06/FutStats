@extends('layouts.Layout')

@section('title', 'Registro Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<form action="{{ route('persona.store')}}" method="POST">
		@csrf

		<div class="main">

			<!-- Sub-Title -->
			<h1 class="display-4" align="center">Registrar Persona</h1>
			<br><br>

			<div class="form-group row inputing">
				<!-- Nombre -->
				<label class="col-sm-2 col-form-label" for="nombre">Nombre Completo</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="nombre" placeholder="Ingresa Aquí Tu Nombre">
				</div>
			</div>

			
			<div class="form-group row inputing">
				<!-- Edad -->
				<label for="edad" class="col-sm-2 col-form-label">Edad</label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="edad" min="1" max="100" placeholder="Ingresa Aquí Tu Edad">
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

			<div class="form-group row inputing">
				<!-- Image De La Persona -->
				<label for="imagen" class="col-sm-2 col-form-label">Foto De Perfil</label>
				<div class="col-sm-10">
					<input class="form-control-file" type="file" name="imagen" onchange="readURL(this);">
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