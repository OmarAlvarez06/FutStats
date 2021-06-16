<x-app-layout>

	<h1 class="display-4 text-center">Mostrar Persona</h1>
    <br>
	
	<div class="menu">
		<a class="link" href="/persona/create">Registrar Persona</a>
		<a class="link" href="/persona-search">Buscar Persona</a>
		<a class="link" href="/persona">Mostrar Personas</a>
		<a class="link" href="/persona-pdf">Descargar PDF Personas</a>
		<a class="link" href="{{ route('persona.edit', $persona) }}">Editar Persona</a>
		<form action="{{ route('persona.destroy', $persona) }}" method="POST">
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
						<img src="{{$persona->imagen}}"  class="img-thumbnail" width="400px" alt="No Disponible">
					</div>
					<div class="ml-3 w-100">
						<h4 class="mb-0 mt-0">{{$persona->nombre}}</h4> 
						<span>{{$persona->rol}}</span>
						<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
							<div class="d-flex flex-column"> <span><b>ID</b></span> <span >{{$persona->id}}</span> </div>
							<div class="d-flex flex-column"> <span><b>Edad</b></span> <span>{{$persona->edad}}</span> </div>
							<div class="d-flex flex-column"> <span><b>Sexo</b></span> <span>{{$persona->sexo}}</span> </div>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
		<br><br>

		<h2 align="center">Equipo</h2>

		<div class="container mt-5 d-flex justify-content-center">
			<div class="card p-3">
				<div class="d-flex align-items-center">
					<div class="image"> 
					<img src="{{$equipo->imagen}}"  class="img-thumbnail" width="400px" alt="No Disponible">
					</div>
					<div class="ml-3 w-100">
						<h4 class="mb-0 mt-0"><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></h4> 
						<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
							<div class="d-flex flex-column"> <span><b>ID</b></span> <span >{{$equipo->id}}</span> </div>
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
