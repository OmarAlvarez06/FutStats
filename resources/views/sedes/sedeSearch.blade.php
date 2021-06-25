<x-app-layout>
    <br>
    <div class="menu">
        @can('admin')
            <a class="link" href="/sede/create">Registrar Sede</a>
		@endcan
        <a class="link" href="/sede">Mostrar Sedes</a>
        <a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
        <a class="link" href="/sede-excel">Descargar Excel Sedes</a>
	</div>
		
    <div class="main">
        @if (isset($mensaje))
			@include('layouts.mensaje',$mensaje)
		@endif
        <h1 class="display-4 text-center">Buscar Sede(s)</h1>
        <br>
        <form action="/sede-get" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="shadow flex">
                <input name="identifier" class="w-full rounded p-2" type="text" placeholder="Buscar Sede Por Nombre..." required>
                <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>

        @if (count($sedes) >= 1)
            <br><br>
            <h2 class="text-center text-4xl">Sede(s) Encontrada(s)</h2>
            <br><br>
            @foreach ($sedes as $sede)
                <div class="flex justify-center items-center">
                    <div class="flex flex-col bg-white shadow-lg border-t-8 border-green-700 rounded-tl-full overflow-hidden">
                        <img src="{{$sede->imagen}}" alt="Imagen De La Sede" class="w-96 h-96 mx-auto" />
                        <div class="px-6 py-4">
                            <div class="flex items-center pt-3">
                                <img class="w-12 h-12 rounded-full"src="{{$sede->imagen}}" alt="Foto Del Equipo"/>
                                <div class="ml-4">
                                    <a class="font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('sede.show',$sede)}}">{{$sede->nombre}}</p>
                                    <a href="{{'https://www.google.com/maps/place/'.$sede->ubicacion}}" target="_blank" class="text-black hover:text-red-500 whitespace-no-wrap text-sm text-gray-700 mt-1">{{$sede->ubicacion}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                
            @endforeach
        @endif

	</div>

    <div class="restaurador"></div>

</x-app-layout>
