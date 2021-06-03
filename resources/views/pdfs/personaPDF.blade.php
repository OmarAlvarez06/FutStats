@extends('layouts.pdfLayout')

@section('title', 'Personas PDF')

@section('principal')
<h1 align="center" class="display-4">Personas</h1>
	<table border="1" align="center" class=" table-dark table table-image">
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
					<td class="w-25">
						<img src="{{public_path($persona->imagen)}}"  width="300px" height="300px" alt="No Disponible">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection