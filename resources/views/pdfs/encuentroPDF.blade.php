@extends('layouts.pdfLayout')

@section('title', 'Encuentros PDF')

@section('principal')
        <h1 align="center" class="display-4">Encuentros</h1>
		<table border="1" align="center" class="table table-dark table-striped table-bordered table-hover">
			<thead>
				<tr>
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
							<img src="{{public_path($encuentro['equipo_local']->imagen)}}" alt="No Disponible" width="50px">
							<h5 style="text-align: center;"><a href="{{ route('equipo.show', $encuentro['equipo_local'])}}">{{$encuentro['equipo_local']->nombre}}</a></h5>
						</td>
						<td>
							<span style="text-align: center; font-size: larger;"><b>{{$encuentro['encuentro']->resultado}}</b></span>
						</td>
						<td>
							<img src="{{public_path($encuentro['equipo_visitante']->imagen)}}" alt="No Disponible" width="50px">
							<h5 style="text-align: center;"><a href="{{ route('equipo.show', $encuentro['equipo_visitante'])}}">{{$encuentro['equipo_visitante']->nombre}}</a></h5>
						</td>
						<td>
							<img src="{{public_path($encuentro['sede']->imagen)}}" alt="No Disponible" width="50px">
							<h5 style="text-align: center;"><a href="{{ route('sede.show', $encuentro['sede'])}}">{{$encuentro['sede']->nombre}}</a></h5>
						</td>
						<td>{{$encuentro['encuentro']->observaciones}}</td>
						<td>{{$encuentro['encuentro']->fecha_hora}}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
@endsection