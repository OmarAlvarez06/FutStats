<x-app-layout>
	<br>
	    
	<div class="menu">
		<a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
		<a class="link" href="/sede-excel">Descargar Excel Sedes</a>
	</div>
	
	<div class="container mx-auto px-4 sm:px-8 main">
		<h1 class="display-4 text-center">Sedes</h1>
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								ID
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Sede
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Ubicación
							</th>
							<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Registrado El
							</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($sedes as $sede)
						<tr>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$sede->id}}</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full" src="{{$sede->imagen}}" alt="Imagen De La Sede" />
									</div>

									<div class="ml-3">
										<a href="{{route('sede.show', $sede)}}" class="text-black hover:text-red-500 whitespace-no-wrap">
											{{$sede->nombre}}
										</a>
									</div>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								
								<a href="{{'https://www.google.com/maps/place/'.$sede->ubicacion}}" target="_blank" class="text-black hover:text-red-500 whitespace-no-wrap">
									{{$sede->ubicacion}}
								</a>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">{{$sede->created_at->format('d/m/Y')}}</p>
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
