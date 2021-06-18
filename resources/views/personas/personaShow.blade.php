<x-app-layout>
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
		<h1 class="display-4 text-center">Persona</h1>
		<div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
			<div class="flex flex-col">
				<div class="bg-white shadow-md  rounded-3xl p-4">
					<div class="flex-none lg:flex">
						<div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
							<img src="{{$persona->imagen}}" alt="Logo Del Equipo"  class=" w-96 h-96 object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
						</div>
						<div class="flex-auto ml-3 justify-evenly py-2">
							<div class="flex flex-wrap ">
								<div class="w-full flex-none text-xs text-blue-700 font-medium ">
									<span>{{$persona->id}}</span><span> - Persona</span>
								</div>
								<h2 class="flex-auto text-lg font-medium">{{$persona->nombre}}</h2>
							</div>
							<p class="mt-3"></p>
							<div class="flex py-4  text-sm text-gray-600">
								<div class="flex-1 items-center">
									<p><b>Rol: </b></p>
									<p>{{$persona->rol}}</p>
								</div>
								<br>
								<div class="flex-1 items-center">
									<p><b>Registrado: </b></p>
									<p>{{$persona->created_at}}</p>
								</div>
							</div>
							<p class="mt-3"></p>
							<div class="flex py-4  text-sm text-gray-600">
								<div class="flex-1 items-center">
									<p><b>Edad: </b></p>
									<p>{{$persona->edad}}</p>
								</div>
								<br>
								<div class="flex-1 items-center">
									<p><b>Sexo: </b></p>
									<p>{{$persona->sexo}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="flex flex-col ">
				<div class="bg-white shadow-md  rounded-3xl p-4">
					<div class="flex-none lg:flex">
						<div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
							<img src="{{$equipo->imagen}}" alt="Foto Del Equipo" class=" w-96 h-96  object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
						</div>
						<div class="flex-auto ml-3 justify-evenly py-2">
							<div class="flex flex-wrap ">
								<div class="w-full flex-none text-xs text-blue-700 font-medium ">
									<span>{{$equipo->id}}</span><span> - Equipo</span>
								</div>
								<a href="{{route('equipo.show',$equipo)}}" class="flex-auto text-lg font-medium text-black hover:text-red-500 whitespace-no-wrap">{{$equipo->nombre}}</a>
							</div>
							<p class="mt-3"></p>
							<div class="flex py-4  text-sm text-gray-600">
								<div class="flex-1 items-center">
									<p><b>Fundación: </b></p>
									<p>{{$equipo->fundacion}}</p>
								</div>
								<br>
								<div class="flex-1 items-center">
									<p><b>Registrado: </b></p>
									<p>{{$equipo->created_at}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="restaurador"></div>
	
</x-app-layout>
