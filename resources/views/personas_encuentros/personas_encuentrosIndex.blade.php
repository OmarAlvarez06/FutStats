<x-app-layout>
    <h1 class="display-4 text-center">Observaciones</h1>
	<br>
	<div class="menu">
		<a class="link" href="/personaencuentro/create">Crear Observación</a>
	</div>

	<div class="main">
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Jugador</th>
					<th scope="col">Equipo Local</th>
					<th scope="col">Equipo Visitante</th>
					<th scope="col">Sede</th>
					<th scope="col">Fecha</th>
					<th scope="col">Observación</th>
					<th scope="col">Minuto</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($personas_encuentros as $notaciones)
					<tr>
						<td>{{$notaciones->nombre}}</td>
						<td>{{$notaciones->equipo_local}}</td>
						<td>{{$notaciones->equipo_visitante}}</td>
						<td>{{$notaciones->sede}}</td>
						<td>{{$notaciones->fecha_hora}}</td>
						<td>{{$notaciones->observacion_tipo}}</td>
						<td>{{$notaciones->minuto}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="restaurador"></div>
</x-app-layout>