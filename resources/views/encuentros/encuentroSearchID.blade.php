<x-app-layout>
    <br>
    <div class="menu">
        @can('admin')
			<a class="link" href="{{route('encuentro.create')}}">Registrar Encuentro</a>
		@endcan
        <a class="link" href="{{route('encuentro.index')}}">Mostrar Encuentros</a>
		<a class="link" href="{{route('encuentro.pdf')}}">Descargar PDF Encuentros</a>
		<a class="link" href="{{route('encuentro.excel')}}">Descargar Excel Encuentros</a>
	</div>
		
    <div class="main">
        @if (isset($mensaje))
			@include('layouts.mensaje',$mensaje)
		@endif
        <h1 class="display-4 text-center">Buscar Encuentro(s)</h1>
        <br>
        <form action="{{route('encuentro.gets')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="shadow flex">
                <input name="identifier" class="w-full rounded p-2" type="number" placeholder="Buscar Encuentro Por ID..." required>
                <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>

        @if (!empty($encuentro))
            <br><br>
            <a class="text-center text-4xl flex-auto  font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('encuentro.show',$encuentro)}}"><span>{{$encuentro->id}}</span> - Encuentro</a>
            <br><br>
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
                        <img src="{{$equipo_local->imagen}}" alt="Logo Del Equipo Local"  class=" w-96 h-96 object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                <span>{{$equipo_local->id}}</span><span> - Equipo Local</span>
                            </div>
                            <a class="flex-auto text-lg font-medium font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('equipo.show',$equipo_local)}}">{{$equipo_local->nombre}}</a>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex py-4  text-sm text-gray-600">
                            <div class="flex-1 items-center">
                                <p><b>Fundado: </b></p>
                                <p>{{$equipo_local->fundacion}}</p>
                            </div>
                            <br>
                            <div class="flex-1 items-center">
                                <p><b>Registrado: </b></p>
                                <p>{{$equipo_local->created_at}}</p>
                            </div>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                <p class="flex-auto text-lg font-medium">Goles A Favor: </p>
                                <p class="flex-auto text-lg font-medium">{{$encuentro->goles_local}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
                        <img src="{{$equipo_visitante->imagen}}" alt="Logo Del Equipo Visitante"  class=" w-96 h-96 object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                <span>{{$equipo_visitante->id}}</span><span> - Equipo Visitante</span>
                            </div>
                            <a class="flex-auto text-lg font-medium font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('equipo.show',$equipo_visitante)}}">{{$equipo_visitante->nombre}}</a>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex py-4  text-sm text-gray-600">
                            <div class="flex-1 items-center">
                                <p><b>Fundado: </b></p>
                                <p>{{$equipo_visitante->fundacion}}</p>
                            </div>
                            <br>
                            <div class="flex-1 items-center">
                                <p><b>Registrado: </b></p>
                                <p>{{$equipo_visitante->created_at}}</p>
                            </div>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                <p class="flex-auto text-lg font-medium">Goles A Favor: </p>
                                <p class="flex-auto text-lg font-medium">{{$encuentro->goles_visitante}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
           
        @endif

	</div>

    <div class="restaurador"></div>
</x-app-layout>
