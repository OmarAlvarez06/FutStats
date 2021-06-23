<x-app-layout>
    <br>
	<div class="menu">
        <a class="link" href="/persona/create">Registrar Persona</a>
		<a class="link" href="/persona">Mostrar Personas</a>
        <a class="link" href="/persona-pdf">Descargar PDF Personas</a>
        
	</div>
		
	<div class="main">
        @if (isset($mensaje))
			@include('layouts.mensaje',$mensaje)
		@endif
        <h1 class="display-4 text-center">Buscar Persona(s)</h1>
        <br>
        <form action="/persona-get" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="shadow flex">
                <input name="identifier" class="w-full rounded p-2" type="text" placeholder="Buscar Persona Por Nombre..." required>
                <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>

        @if (count($personas) >= 1)
            <br><br>
            <h2 class="text-center text-4xl">Persona(s) Encontrada(s)</h2>
            <br><br>
            @foreach ($personas as $persona)
                <div class="flex justify-center items-center">
                    <div class="flex flex-col bg-white shadow-lg border-t-8 border-green-700 rounded-tl-full overflow-hidden">
                        <img src="{{$persona->imagen}}" alt="Imagen De La Persona" class="w-96 h-96 mx-auto" />
                        <div class="px-6 py-4">
                            <div class="flex items-center pt-3">
                                <img class="w-12 h-12 rounded-full"src="{{$persona->imagen}}" alt="Foto De La Persona"/>
                                <div class="ml-4">
                                    <a class="font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('persona.show',$persona)}}">{{$persona->nombre}}</p>
                                    <p class="text-sm text-gray-700 mt-1">{{$persona->rol}}</p>
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
