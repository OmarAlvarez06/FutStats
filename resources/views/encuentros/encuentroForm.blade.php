<x-app-layout>
	<br>
	<div class="menu">
		<a class="link" href="{{route('encuentro.index')}}">Mostrar Encuentros</a>
        <a class="link" href="{{route('encuentro.search')}}">Buscar Encuentros</a>
		<a class="link" href="{{route('encuentro.pdf')}}">Descargar PDF Encuentros</a>
		<a class="link" href="{{route('encuentro.excel')}}">Descargar Excel Encuentros</a>
	</div>


	<form action="{{ route('encuentro.store')}}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="grid mt-8  gap-8 grid-cols-1 main">

			@if ($errors->any())
				<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
	
			<div class="flex flex-col">
				<div class="bg-white shadow-md rounded-3xl p-5">
					<div class="flex flex-col sm:flex-row items-center">
						<h2 class="font-semibold text-lg mr-auto">Registrar Encuentro</h2>
						<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
					</div>
					<div class="mt-5">
						<div class="form">
							<div class="md:space-y-2 mb-3">
								
								<div class="md:flex flex-row md:space-x-4 w-full text-xs">
									<div class="mb-3 space-y-2 w-full text-xs">
										<label for="equipo_local_id" class="font-semibold text-gray-600 py-2">Equipo Local<abbr title="required">*</abbr></label>
										
										<select name="equipo_local_id" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="equipo_local_id">
											@foreach ($equipos as $equipo)
												<option value="{{$equipo->id}}">
													{{$equipo->nombre}}
												</option>
											@endforeach
										</select>
										<p class="text-sm text-red-500 hidden mt-3" id="error">Por Favor Rellene Este Campo</p>
									</div>
									<div class="mb-3 space-y-2 w-full text-xs">
										<label for="equipo_visitante_id" class="font-semibold text-gray-600 py-2">Equipo Visitante<abbr title="required">*</abbr></label>
									
										<select name="equipo_visitante_id" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="equipo_visitante_id">
											@foreach ($equipos as $equipo)
												<option value="{{$equipo->id}}">
													{{$equipo->nombre}}
												</option>
											@endforeach
										</select>
										<p class="text-sm text-red-500 hidden mt-3" id="error">Por Favor Rellene Este Campo</p>
									</div>
								</div>
							</div>

							<div class="md:flex flex-row md:space-x-4 w-full text-xs">
								<div class="mb-3 space-y-2 w-full text-xs">
									<label for ="fecha_hora" class="font-semibold text-gray-600 py-2">Fecha & Hora Del Encuentro<abbr title="required">*</abbr></label>
									<input name="fecha_hora" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="datetime-local" id="fecha_hora">
									<p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
								<div class="mb-3 space-y-2 w-full text-xs">
									<label for="goles_local" class="font-semibold text-gray-600 py-2">Gol(es) Local<abbr title="required">*</abbr></label>
									<input name="goles_local" id="goles_local" placeholder="Gol(es) Local" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="number" min="0" max="40">
									<p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
								<div class="mb-3 space-y-2 w-full text-xs">
									<label for="goles_visitante" class="font-semibold text-gray-600 py-2">Gol(es) Visitante<abbr title="required">*</abbr></label>
									<input name="goles_visitante" id="goles_visitante" placeholder="Gol(es) Visitante" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="number" min="0" max="40">
									<p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
							</div>
						
							<p class="text-xs text-red-500 text-right my-3">Los campos obligatorios est??n marcados con un asterisco<abbr title="Required field">*</abbr></p>
							<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
								<button type="submit" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Guardar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>

	</form>

	<div class="restaurador"></div>
</x-app-layout>
