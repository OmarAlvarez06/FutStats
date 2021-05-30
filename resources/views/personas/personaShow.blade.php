@extends('layouts.Layout')

@section('title', 'Mostrar Persona')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
		<a class="link" href="/persona">Mostrar</a>
		<a class="link" href="{{ route('persona.edit', $persona) }}">Editar</a>
		<form action="{{ route('persona.destroy', $persona) }}" method="POST">
			@csrf
			@method('DELETE')
			<input type="submit" class="link" value="Eliminar" style="border:none;">
		</form>
		<a class="link" href="#">Observaciones</a>
	</div>
		
	<div class="main">
		<h1 align="center" class="display-4">Persona</h1>

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
							<div class="d-flex flex-column"> <span>ID</span> <span >{{$persona->id}}</span> </div>
							<div class="d-flex flex-column"> <span>Edad</span> <span>{{$persona->edad}}</span> </div>
							<div class="d-flex flex-column"> <span>Sexo</span> <span>{{$persona->sexo}}</span> </div>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>

		<br><br>

	</div>
@endsection