<x-app-layout>
	<br>
	<div class="menu">
		@can('admin')
			<a class="link" href="{{route('encuentro.create')}}">Registrar Encuentro</a>
		@endcan
		<a class="link" href="{{route('encuentro.index')}}">Mostrar Encuentros</a>
        <a class="link" href="{{route('encuentro.search')}}">Buscar Encuentros</a>
		<a class="link" href="{{route('encuentro.pdf')}}">Descargar PDF Encuentros</a>
		<a class="link" href="{{route('encuentro.excel')}}">Descargar Excel Encuentros</a>
	</div>

	<form action="{{route('encuentro-persona.store',$encuentro)}}" method="POST" enctype="multipart/form-data">
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
						<h2 class="font-semibold text-lg mr-auto">Registrar Detalle De Encuentro</h2>
						<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
					</div>
					<div class="mt-5">
						<div class="form">
							<div class="md:space-y-2 mb-3">
								
								<div class="md:flex flex-row md:space-x-4 w-full text-xs">
									<div class="mb-3 space-y-2 w-full text-xs">
										<label for="encuentro_id" class="font-semibold text-gray-600 py-2">Encuentro<abbr title="required">*</abbr></label>
										<select name="encuentro_id" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="encuentro_id">
											<option value="{{$encuentro->id}}">
												{{$encuentro->id}}
											</option>
										</select>
										<p class="text-sm text-red-500 hidden mt-3" id="error">Por Favor Rellene Este Campo</p>
									</div>
									<div class="mb-3 space-y-2 w-full text-xs">
										<label for="persona_id" class="font-semibold text-gray-600 py-2">Persona<abbr title="required">*</abbr></label>
									
										<select name="persona_id" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="persona_id">
											@foreach ($personas as $persona)
												<option value="{{$persona->id}}">
													{{$persona->nombre}}
												</option>
											@endforeach
										</select>
										<p class="text-sm text-red-500 hidden mt-3" id="error">Por Favor Rellene Este Campo</p>
									</div>
								</div>
							</div>

							<div class="md:flex flex-row md:space-x-4 w-full text-xs">
								<div class="mb-3 space-y-2 w-full text-xs">
									<label for ="tipo_observacion" class="font-semibold text-gray-600 py-2">Tipo De Observación<abbr title="required">*</abbr></label>
									<select name="tipo_observacion" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="tipo_observacion">
										
										<option value="Gol">
											Gol
										</option>
										<option value="Amonestación">
											Amonestación
										</option>
										<option value="Expulsión">
											Expulsión
										</option>
										<option value="Autogol">
											Autogol
										</option>
										<option value="Lesión">
											Lesión
										</option>
										<option value="Cambio">
											Cambio
										</option>
										
									</select>
									<p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
								<div class="mb-3 space-y-2 w-full text-xs">
									<label for="observacion" class="font-semibold text-gray-600 py-2">Observación<abbr title="required">*</abbr></label>
									<input name="observacion" id="observacion" placeholder="Observación" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text">
									<p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
							</div>
						
							<p class="text-xs text-red-500 text-right my-3">Los campos obligatorios están marcados con un asterisco<abbr title="Required field">*</abbr></p>
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
