<x-app-layout>
	<br>
	<div class="menu">
		<a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
		<a class="link" href="/sede-excel">Descargar Excel Sedes</a>
	</div>

	<form action="{{route('sede-archivo.store',$sede)}}" method="POST" enctype="multipart/form-data">
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
						<h2 class="font-semibold text-lg mr-auto">Agregar Archivo A La Sede</h2>
						<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
					</div>
					<div class="mt-5">
						<div class="form">
							<div class="md:space-y-2 mb-3">
                <div class="mb-3 space-y-2 w-full text-xs">
                    <label for="sede_id" class="font-semibold text-gray-600 py-2">Sede<abbr title="required">*</abbr></label>
                    <select name="sede_id" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" id="sede_id">
                        <option value="{{$sede->id}}">
                            {{$sede->id . ' - ' . $sede->nombre}}
                        </option>
                    </select>
                    <p class="text-sm text-red-500 hidden mt-3" id="error">Por Favor Rellene Este Campo</p>
                </div>
							</div>

              <div class="relative flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(https://source.unsplash.com/900x1600/?nature,paisaje);">
                
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
                  <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
                  
                    <div class="text-center">
                      <h2 class="mt-5 text-3xl font-bold text-gray-900">
                        Subir Archivo
                      </h2>
                    </div>
                    <br>
                    <div class="grid grid-cols-1 space-y-2">
                      <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                          <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                        </div>
                        <input type="file" name="archivo" id="archivo" class="hidden"  onchange="processSelectedFile(this)"/>
                        <p class="no-underline md:underline text-1x1">Seleccionar Archivo</p>
                      </label>
                    </div>

                    <div class="text-center">
                      <h3 class="mt-5 text-2xl font-bold text-gray-900" id="filename"></h3>
                    </div>

                  </div>
              </div>

							<p class="text-xs text-red-500 text-right my-3">Los campos obligatorios están marcados con un asterisco<abbr title="Required field">*</abbr></p>
							<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
								<button type="submit" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Subir</button>
							</div>


						</div>
					</div>
				</div>
			</div>
	
		</div>

	</form>


	<div class="restaurador"></div>

  <br><br>

  <script>
    function processSelectedFile(fileInput) {
      var files = fileInput.files;

      for (var i = 0; i < files.length; i++) {
        document.getElementById("filename").innerHTML = files[i].name;
        break;
      }
    }

  </script>

</x-app-layout>
