<x-app-layout>
	<br>
    <div class="menu">
		<a class="link" href="/persona/create">Registrar Persona</a>
		<a class="link" href="/persona-search">Buscar Persona</a>
		<a class="link" href="/persona-pdf">Descargar PDF Personas</a>
		<a class="link" href="/persona-excel">Descargar Excel Personas</a>
	</div>

	<div class="container mx-auto px-4 sm:px-8 main">
		@if (isset($mensaje))
			@include('layouts.mensaje',$mensaje)
		@endif

		<h1 class="display-4 text-center">Personas</h1>
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								ID
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Persona
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Edad
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Rol
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Sexo
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Registrado El
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Equipo
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($personas as $persona)
						<tr>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$persona->id}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full" src="{{$persona->imagen}}" alt="Imagen De La Persona" />
									</div>

									<div class="ml-3">
										<a href="{{route('persona.show', $persona)}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$persona->nombre}}
										</a>
									</div>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$persona->edad}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$persona->rol}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$persona->sexo}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$persona->created_at}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full"
											src="{{$persona->equipo->imagen}}"
											alt="Imagen Del Equipo" />
									</div>

									<div class="ml-3">
										<a href="{{route('equipo.show', $persona->equipo)}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$persona->equipo->nombre}}
										</a>
									</div>
								</div>
							</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="restaurador"></div>

</x-app-layout>
