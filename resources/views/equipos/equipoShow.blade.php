<x-app-layout>
    <h1 class="display-4 text-center">Mostrar Equipo</h1>
	<br>
	<div class="menu">
		<a class="link" href="/equipo/create">Registrar Equipo</a>
		<a class="link" href="/equipo">Mostrar Equipos</a>
		<a class="link" href="/equipo-search">Buscar Equipo</a>
		<a class="link" href="{{ route('equipo.edit', $equipo) }}">Editar Equipo</a>
		<a class="link" href="/equipo-pdf">Descargar PDF Equipos</a>
		<form action="{{ route('equipo.destroy', $equipo) }}" method="POST">
			@csrf
			@method('DELETE')
			<input type="submit" class="link" value="Eliminar" style="border:none;">
		</form>
	</div>

	<div class="main">
		<div class="container mt-5 d-flex justify-content-center">
			<div class="card p-3">
				<div class="d-flex align-items-center">
					<div class="image"> 
					<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="400px" alt="No Disponible">
					</div>
					<div class="ml-3 w-100">
						<h4 class="mb-0 mt-0">{{$equipo->nombre}}</h4> 
						<span>{{$equipo->fecha_creacion}}</span>
						<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
							<<div class="d-flex flex-column"> <span><b>ID</b></span> <span >{{$equipo->id}}</span> </div>
							<div class="d-flex flex-column"> <span><b>Creación</b></span> <span>{{$equipo->fecha_creacion}}</span> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>

	</div>

	<div class="restaurador"></div>
</x-app-layout>
