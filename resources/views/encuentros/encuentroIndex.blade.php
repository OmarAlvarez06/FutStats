<x-app-layout>
    <h1 class="display-4 text-center">Encuentros</h1>
	<br>
	<div class="menu">
		<a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>

	<div class="main">
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Equipo Local</th>
					<th scope="col">Resultado</th>
					<th scope="col">Equipo Visitante</th>
					<th scope="col">Sede</th>
					<th scope="col">Observaciones</th>
					<th scope="col">Fecha</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($encuentros as $encuentro)
					<tr>
						<td>
							<a href="{{route('encuentro.show',$encuentro['encuentro'])}}">{{$encuentro['encuentro']->id}}</a>
						</td>
						<td>
							<img src="{{$encuentro['equipo_local']->imagen}}" class="card-img-top" alt="No Disponible">
							<h5 style="text-align: center;"><a href="{{ route('equipo.show', $encuentro['equipo_local'])}}">{{$encuentro['equipo_local']->nombre}}</a></h5>
						</td>
						<td>
							<span style="text-align: center; font-size: larger;"><b>{{$encuentro['encuentro']->resultado}}</b></span>
						</td>
						<td>
							<img src="{{$encuentro['equipo_visitante']->imagen}}" class="card-img-top" alt="No Disponible">
							<h5 style="text-align: center;"><a href="{{ route('equipo.show', $encuentro['equipo_visitante'])}}">{{$encuentro['equipo_visitante']->nombre}}</a></h5>
						</td>
						<td>
							<img src="{{$encuentro['sede']->imagen}}" class="card-img-top" alt="No Disponible">
							<h5 style="text-align: center;"><a href="{{ route('sede.show', $encuentro['sede'])}}">{{$encuentro['sede']->nombre}}</a></h5>
						</td>
						<td>{{$encuentro['encuentro']->observaciones}}</td>
						<td>{{$encuentro['encuentro']->fecha_hora}}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>

		
	</div>

	<div class="restaurador"></div>
</x-app-layout>
