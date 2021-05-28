@extends('layouts.Layout')

@section('title', 'Encuentros')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR Encuentros REGISTRADAS -->
	<div class="menu">
		<a class="link" href="/encuentro/create">Registrar</a>
		<a class="link" href="/encuentro">Mostrar</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Encuentros</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
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

		<button class=" btn btn-primary"><a href="{{URL::to('/persona-pdf')}}">Descargar PDF</a></button>
	</div>
@endsection  