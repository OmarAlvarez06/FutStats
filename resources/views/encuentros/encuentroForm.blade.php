@extends('layouts.Layout')

@section('title', 'Registro De Encuentros')

@section('main')
	
	<div class="menu">
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>


	<form action="{{ route('encuentro.store')}}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="main table-index">

			<!-- Sub-Title -->
			<h1 class="display-4" align="center">Registrar Encuentro</h1>
			<br><br>

			

			<h3 align="center">Equipo Local</h3>
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
								<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="100px" alt="No Disponible">
							</td>
							<td>
								<input type="radio" name="equipo_local" value="{{$equipo->id}}">
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>


			<h3 align="center">Equipo Visitante</h3>
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
								<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="100px" alt="No Disponible">
							</td>
							<td>
								<input type="radio" name="equipo_visitante" value="{{$equipo->id}}">
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<h3 align="center">Sede</h3>
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
					@foreach ($sedes as $sede)
						<tr>
							<td>{{$sede->id}}</td>
							<td><a href="{{ route('sede.show', $sede)}}">{{$sede->nombre}}</a></td>
							<td>
								<img src="{{$sede->imagen}}"  class="img-thumbnail" width="100px" alt="No Disponible">
							</td>
							<td>
								<input type="radio" name="sede" value="{{$sede->id}}">
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="form-group row inputing">
				<!-- Goles Local -->
				<label for="goles_local" class="col-sm-2 col-form-label">Gol(es) Local</label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="goles_local" min="0" max="40" placeholder="Ingresa Aquí El Número De Goles Del Equipo Local" value="0">
				</div>
			</div>

			<div class="form-group row inputing">
				<!-- Goles Local -->
				<label for="goles_visitante" class="col-sm-2 col-form-label">Gol(es) Visitante</label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="goles_visitante" min="0" max="40" placeholder="Ingresa Aquí El Número De Goles Del Equipo Visitante" value="0">
				</div>
			</div>


			<div class="form-group row inputing">
				<!-- Observaciones -->
				<label class="col-sm-2 col-form-label" for="observaciones">Observaciones</label>
				<textarea class="form-control" id="observaciones" rows="3"></textarea>
			</div>

			<div class="form-group row inputing">
				<!-- Fecha -->
				<label class="col-sm-2 col-form-label" for="fecha_hora">Fecha Del Encuentro</label>
				<div class="col-sm-10">
					<input type="datetime-local" name="fecha_hora">
				</div>
			</div>

			
			<!-- Boton Enviar -->
			<button class=" btn btn-success btn-lg btn-block">Enviar</button>

		</div>
	</form>
@endsection