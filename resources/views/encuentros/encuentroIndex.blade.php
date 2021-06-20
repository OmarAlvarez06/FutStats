<x-app-layout>
	<br>
	<div class="menu">
		<a class="link" href="/encuentro/create">Registrar Encuentro</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
		<a class="link" href="/encuentro-excel">Descargar Excel Encuentros</a>
	</div>

	<div class="container mx-auto px-4 sm:px-8 main">
		<h1 class="display-4 text-center">Encuentros</h1>
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								ID
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Equipo Local
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Resultado
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Equipo Visitante
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Fecha & Hora
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
						@foreach ($encuentros as $encuentro)
						<tr>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<a class="text-black hover:text-red-500 whitespace-no-wrap" href="{{route('encuentro.show',$encuentro['encuentro'])}}">{{$encuentro['encuentro']->id}}</a>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full" src="{{$encuentro['equipo_local']->imagen}}" alt="Imagen Del Equipo Local" />
									</div>

									<div class="ml-3">
										<a href="{{route('equipo.show', $encuentro['equipo_local'])}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$encuentro['equipo_local']->nombre}}
										</a>
									</div>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$encuentro['encuentro']->goles_local}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap"> - </p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$encuentro['encuentro']->goles_visitante}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full" src="{{$encuentro['equipo_visitante']->imagen}}" alt="Imagen Del Equipo Visitante" />
									</div>

									<div class="ml-3">
										<a href="{{route('equipo.show', $encuentro['equipo_visitante'])}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$encuentro['equipo_visitante']->nombre}}
										</a>
									</div>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$encuentro['encuentro']->fecha_hora}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$encuentro['encuentro']->created_at}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full"
											src="{{$encuentro['sede']->imagen}}"
											alt="Imagen De La Sede" />
									</div>

									<div class="ml-3">
										<a href="{{route('sede.show', $encuentro['sede'])}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$encuentro['sede']->nombre}}
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
