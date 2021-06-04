@extends('layouts.Layout')

@section('title', 'Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="menu">
		<a class="link" href="/persona/create">Registrar Persona</a>
		<a class="link" href="/persona-search">Buscar Persona</a>
		<a class="link" href="/persona">Mostrar Personas</a>
		<a class="link" href="/persona-pdf">Descargar PDF Personas</a>
	</div>

	<div class="main table-index">
		<h1 align="center" class="display-4">Personas</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nombre</th>
					<th scope="col">Edad</th>
					<th scope="col">Sexo</th>
					<th scope="col">Rol</th>
					<th scope="col">Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($personas as $persona)
					<tr>
						<td>{{$persona->id}}</td>
						<td>
							<a href="{{route('persona.show', $persona)}}">{{$persona->nombre}}</a>
						</td>
						<td>{{$persona->edad}}</td>
						<td>{{$persona->sexo}}</td>
						<td>{{$persona->rol}}</td>
						<td>
							<img src="{{$persona->imagen}}"  class="img-thumbnail rounded mx-auto d-block" width="150px" alt="No Disponible">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection  