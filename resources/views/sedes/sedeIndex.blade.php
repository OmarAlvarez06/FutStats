@extends('layouts.Layout')

@section('title', 'Sedes')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR Sedes REGISTRADAS -->

    
	<div class="menu">
		<a href="/sede">Mostrar</a>
	</div>
    

	<div class="main">
		<h1 align="center" class="display-4">Sedes</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Ubicacion</th>
					<th scope="col">Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($sedes as $sede)
					<tr>
						<td>{{$sede->id}}</td>
						<td>
							<a href="{{ route('sede.show', $sede)}}">{{$sede->nombre}}</a>
						</td>
						<td>{{$sede->ubicacion}}</td>
						<td>
							<img src="/uploads/sedes/{{$sede->imagen}}"  class="img-thumbnail rounded mx-auto d-block" width="400px" height="400px" alt="No Disponible">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection  