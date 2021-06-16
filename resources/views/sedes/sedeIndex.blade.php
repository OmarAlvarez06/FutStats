
<x-app-layout>
    <h1 class="display-4 text-center">Sedes</h1>
	<br>
	    
	<div class="menu">
		<a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
	</div>
    

	<div class="main table-index">
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
							<img src="{{$sede->imagen}}"  class="img-thumbnail rounded mx-auto d-block" width="400px" height="400px" alt="No Disponible">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="restaurador"></div>

</x-app-layout>
