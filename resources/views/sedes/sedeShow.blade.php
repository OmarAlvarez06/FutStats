<x-app-layout>
    <br>
	<div class="menu">
		<a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
	</div>
    
	<div class="main">
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
							<p>{{$sede->created_at}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br><br>

		<h2 class="text-center text-5xl">Equipo(s)</h2>
		<br>

        @foreach ($equipos as $equipo)

			<div class="flex justify-center items-center">
				<div class="flex flex-col bg-white shadow-lg border-t-8 border-green-700 rounded-tl-full overflow-hidden">
					<img src="{{$equipo->imagen}}" alt="Logo Del Equipo" class="w-96 h-96 mx-auto" />
					<div class="px-6 py-4">
						<div class="flex items-center pt-3">
							<img class="w-12 h-12 rounded-full"src="{{$equipo->imagen}}" alt="Logo Del Equipo"/>
							<div class="ml-4">
								<a class="font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('equipo.show',$equipo)}}">{{$equipo->nombre}}</p>
								<p class="text-sm text-gray-700 mt-1">{{$equipo->fundacion}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>

        @endforeach

	</div>

	<div class="restaurador"></div>
</x-app-layout>
