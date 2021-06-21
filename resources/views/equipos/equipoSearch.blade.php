<x-app-layout>
    <br>
    <div class="menu">
        <a class="link" href="/equipo/create">Registrar Equipo</a>
		<a class="link" href="/equipo">Mostrar Equipos</a>
        <a class="link" href="/equipo-pdf">Descargar PDF Equipos</a>
        <a class="link" href="/equipo-excel">Descargar Excel Equipos</a>
	</div>
		
	<div class="main">
        <h1 class="display-4 text-center">Buscar Equipo(s)</h1>
        <br>
        <form action="/equipo-get" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="shadow flex">
                <input name="identifier" class="w-full rounded p-2" type="text" placeholder="Buscar Equipo Por Nombre..." required>
                <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>

        @if (!empty($equipos))
            <br><br>
            <h2 class="text-center text-4xl">Equipo(s) Encontrado(s)</h2>
            <br><br>
            @foreach ($equipos as $equipo)
                <div class="flex justify-center items-center">
                    <div class="flex flex-col bg-white shadow-lg border-t-8 border-green-700 rounded-tl-full overflow-hidden">
                        <img src="{{$equipo->imagen}}" alt="Logo Del Equipo" class="w-96 h-96 mx-auto" />
                        <div class="px-6 py-4">
                            <div class="flex items-center pt-3">
                                <img class="w-12 h-12 rounded-full"src="{{$equipo->imagen}}" alt="Foto Del Equipo"/>
                                <div class="ml-4">
                                    <a class="font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('equipo.show',$equipo)}}">{{$equipo->nombre}}</p>
                                    <a class="text-sm text-gray-700 mt-1 hover:text-red-500 whitespace-no-wrap" href="{{route('sede.show',$equipo->sede)}}">{{$equipo->sede->nombre}}</a>
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
