<x-app-layout>
    <br>

    <div class="menu">
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sede</a>
	</div>

    <form action="{{ route('sede.store')}}" method="POST" enctype="multipart/form-data">
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
						<h2 class="font-semibold text-lg mr-auto">Registrar/Editar Sede</h2>
						<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
					</div>
					<div class="mt-5">
						<div class="form">
							<div class="md:space-y-2 mb-3">
								<label class="text-xs font-semibold text-gray-600 py-2">Imagen De La Sede<abbr class="hidden" title="required">*</abbr></label>
								
								<div class="flex items-center py-6">
									<div class="mr-4 flex-none rounded-xl border overflow-hidden">
										<img class="object-cover" id="openedImage" src="{{ $sede->imagen ?? '' }}" alt="Imagen Subida">
									</div>
									<label class="cursor-pointer ">
										<span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Subir Imagen</span>
										<input type="file" class="hidden" :multiple="multiple" :accept="accept" id="uploadInput" name="imagen" onchange="readURL(this);" value="imagen">
									</label>
								</div>


								<div class="w-full flex flex-col mb-3">
                                    <label for ="nombre" class="font-semibold text-gray-600 py-2">Nombre De La Sede<abbr title="required">*</abbr></label>
                                    <input name="nombre" value="{{ $sede->nombre ?? '' }}" placeholder="Nombre De La Sede" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" id="nombre" min="5" max="100">
                                    <p class="text-red text-xs hidden">Por Favor Rellene Este Campo</p>
								</div>
                                <div class="w-full flex flex-col mb-3">
                                    <label for="ubicacion" class="font-semibold text-gray-600 py-2">Ubicación<abbr title="required">*</abbr></label>
                                    <input name="ubicacion" value="{{ $sede->ubicacion ?? '' }}" id="ubicacion" placeholder="Ubicación De La Sede" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text">
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
