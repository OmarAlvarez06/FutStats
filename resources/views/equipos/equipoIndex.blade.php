<x-app-layout>
    <br>
	<div class="menu">
		<a class="link" href="/equipo/create">Registrar Equipo</a>
		<a class="link" href="/equipo-search">Buscar Equipo</a>
		<a class="link" href="/equipo">Mostrar Equipos</a>
		<a class="link" href="/equipo-pdf">Descargar PDF Equipos</a>
	</div>

	<div class="container mx-auto px-4 sm:px-8 main">
		<h1 class="display-4 text-center">Equipos</h1>
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								ID
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Equipo
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Fundación
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Registrado El
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Sede
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($valores as $valor)
						<tr>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$valor['equipo']->id}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full" src="{{$valor['equipo']->imagen}}" alt="Imagen Del Equipo" />
									</div>

									<div class="ml-3">
										<a href="{{route('equipo.show', $valor['equipo'])}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$valor['equipo']->nombre}}
										</a>
									</div>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$valor['equipo']->fundacion}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$valor['equipo']->created_at}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full"
											src="{{$valor['sede']->imagen}}"
											alt="Imagen Del Equipo" />
									</div>

									<div class="ml-3">
										<a href="{{route('sede.show', $valor['sede'])}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$valor['sede']->nombre}}
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
