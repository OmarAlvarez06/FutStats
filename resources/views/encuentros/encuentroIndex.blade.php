@extends('layouts.Layout')

@section('title', 'Encuentros')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR Encuentros REGISTRADAS -->
	<div class="menu">
		<a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>

	<div class="main">
		<h1 align="center" class="display-4">Encuentros</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Equipo Local</th>
					<th scope="col">Equipo Visitante</th>
					<th scope="col">Sede</th>
					<th scope="col">Observaciones</th>
					<th scope="col">Fecha</th>
					<th scope="col">Resultado</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($encuentros as $encuentro)
					<tr>
						<td>{{$encuentro->id}}</td>
						<td>{{$encuentro->id}}</td>
						<td>{{$encuentro->id}}</td>
						<td>{{$encuentro->id}}</td>
						<td>{{$encuentro->id}}</td>
						<td>{{$encuentro->id}}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>

		
	</div>
@endsection  