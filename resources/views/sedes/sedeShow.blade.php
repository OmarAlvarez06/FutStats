<x-app-layout>
    <br>
	<div class="menu">
		@can('admin')
			<a class="link" href="{{route('sede.create')}}">Registrar Sede</a>
			<a class="link" href="{{route('sede-archivo.create',$sede->id)}}">Agregar Archivo</a>
		@endcan
		<a class="link" href="{{route('sede.index')}}">Mostrar Sedes</a>
		<a class="link" href="{{route('sede.search')}}">Buscar Sedes</a>
		<a class="link" href="{{route('sede.pdf')}}">Descargar PDF Sedes</a>
		<a class="link" href="{{route('sede.excel')}}">Descargar Excel Sedes</a>
	</div>
    
	<div class="main">
		@if (Session::get('mensaje') != null)
			@include('layouts.mensaje',['mensaje' => Session::get('mensaje')])
		@endif
		<h1 class="display-4 text-center">Sede</h1>
		
		<div class="bg-white shadow-md  rounded-3xl p-4">
			<div class="flex-none lg:flex">
				<div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
					<img src="{{$sede->imagen}}" alt="Imagen De La Sede"  class=" w-96 h-96 object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
				</div>
				<div class="flex-auto ml-3 justify-evenly py-2">
					<div class="flex flex-wrap ">
						<div class="w-full flex-none text-xs text-blue-700 font-medium ">
							<span>{{$sede->id}}</span><span> - Sede</span>
						</div>
						<h2 class="flex-auto text-lg font-medium">{{$sede->nombre}}</h2>
					</div>
					<p class="mt-3"></p>
					<div class="flex py-4  text-sm text-gray-600">
						<div class="flex-1 items-center">
							<p><b>Ubicación: </b></p>
							<a href="{{'https://www.google.com/maps/place/'.$sede->ubicacion}}" target="_blank" class="text-black hover:text-red-500 whitespace-no-wrap">{{$sede->ubicacion}}</a>
						</div>
						<br>
						<div class="flex-1 items-center">
							<p><b>Registrado: </b></p>
							<p>{{$sede->created_at->format('d/m/Y')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br><br>

		<h2 class="text-center text-5xl">Equipo(s)</h2>
		<br>

        @foreach ($sede->equipos as $equipo)

			<div class="flex justify-center items-center">
				<div class="flex flex-col bg-white shadow-lg border-t-8 border-green-700 rounded-tl-full overflow-hidden">
					<img src="{{$equipo->imagen}}" alt="Logo Del Equipo" class="w-96 h-96 mx-auto" />
					<div class="px-6 py-4">
						<div class="flex items-center pt-3">
							<img class="w-12 h-12 rounded-full"src="{{$equipo->imagen}}" alt="Logo Del Equipo"/>
							<div class="ml-4">
								<a class="font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('equipo.show',$equipo)}}">{{$equipo->nombre}}</a>
								<p class="text-sm text-gray-700 mt-1">{{$equipo->fundacion}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>

        @endforeach

		<h2 class="text-center text-5xl">Archivo(s)</h2>
		<br>

		@foreach ($sede->archivos as $archivo)
			<div class="max-w-min mx-auto bg-white rounded-xl shadow-md overflow-y-auto md:max-w-lg flex items-stretch">
				<div class="md:flex-shrink-0">
					@if ($archivo->mime == 'image/jpeg' || $archivo->mime == 'image/png')
						<img class="h-full w-full object-cover md:w-60 overflow-auto" src="{{$archivo->nombre_hash}}" alt="Image File">
					@elseif ($archivo->mime == 'application/pdf')
						<img class="h-full w-full object-cover md:w-60 overflow-auto" src="https://www.betechwise.com/wp-content/uploads/2020/07/What-Is-a-PDF-File-And-What-Are-PDFs-For.jpg" alt="Image File Type">
					@elseif ($archivo->mime == 'audio/mpeg')
						<img class="h-full w-full object-cover md:w-60 overflow-auto" src="https://mundowin.com/wp-content/uploads/2019/06/Audio-Files.png" alt="Image File Type">
					@elseif ($archivo->mime == 'application/msword')
						<img class="h-full w-full object-cover md:w-60 overflow-auto" src="https://ultimahoracol.com/wp-content/uploads/2020/09/1578915774_395635_1578915855_noticia_normal.jpg" alt="Image File Type">
					@else
						<img class="h-full w-full object-cover md:w-60 overflow-auto" src="https://lh3.googleusercontent.com/umr7HiiYmPxHvMc05quIxE2Zz2Q54w4cpydZRSvQhhaBoPDdhbMrRa-lsnEYZyazqPU=s360-rw" alt="Image File Type">
					@endif
				</div>
				<div class="p-8 md:flex-shrink-0 uppercase tracking-wide text-sm text-indigo-500 font-semibold justify-items-end">
						<h4 class="block">Datos Del Archivo</h4>
						<br>
						<div class="block">
							<img src="https://img.icons8.com/key" class="inline w-10 h-10"> 
							<p class="font-bold text-black inline"> {{$archivo->id}}</p>
						</div>
						<br>
						<div class="block">
							<img src="https://img.icons8.com/name" class="inline w-10 h-10"> 
							<p class="font-bold text-black inline"> {{$archivo->nombre}}</p>
						</div>
						<br>
						<div class="block">
							<img src="https://img.icons8.com/type" class="inline w-10 h-10"> 
							<p class="font-bold text-black inline"> {{$archivo->mime}}</p>
						</div>
						<br>
						<div class="block">
							<img src="https://img.icons8.com/trash" class="inline w-10 h-10"> 
							<a class="font-bold text-black hover:text-red-500 whitespace-no-wrap inline" href="{{route('sede-archivo.destroy',$archivo->id)}}"> Eliminar</a>
						</div>
						<br>
						<div class="block">
							<img src="https://img.icons8.com/download" class="inline w-10 h-10"> 
							<a class="font-bold text-black hover:text-red-500 whitespace-no-wrap inline" href="{{$archivo->nombre_hash}}" download=""> Descargar</a>
						</div>
					
				</div>
			</div>
			<br>
		@endforeach

		

	</div>

	<div class="restaurador"></div>
</x-app-layout>
