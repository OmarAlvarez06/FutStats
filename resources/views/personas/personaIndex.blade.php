@extends('layouts.Layout')

@section('title', 'Personas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->
	<div class="main">
		<h1 align="center">Personas</h1>
		<table border="1" align="center">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Rol</th>
					<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($personas as $persona)
					<tr>
						<td>{{$persona->id}}</td>
						<td><a href="{{ route('persona.show', $persona)}}">{{$persona->nombre}}</a></td>
						<td>{{$persona->edad}}</td>
						<td>{{$persona->sexo}}</td>
						<td>{{$persona->rol}}</td>
						<td>{{$persona->imagen}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection  