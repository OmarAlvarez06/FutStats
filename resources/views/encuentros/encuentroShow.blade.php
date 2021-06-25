<x-app-layout>
    <br>
    <div class="menu">
    	@can('admin')
			<a class="link" href="/encuentro/create">Registrar Encuentro</a>
			<a class="link" href="{{'/encuentro-persona/create/'.$encuentro->id}}">Registrar Detalle De Encuentro</a>
		@endcan
        <a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
		<a class="link" href="/encuentro-excel">Descargar Excel Encuentros</a>
	</div>

    <div class="main">

		@if (isset($mensaje))
			@include('layouts.mensaje',$mensaje)
		@endif
		<h1 class="display-4 text-center">Información Del Encuentro</h1>
		<div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
			<div class="flex flex-col">
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
			</div>
			<div class="flex flex-col">
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
			</div>
			
		</div>

		<br><br>

		<h1 class="display-4 text-center">Detalles Del Encuentro</h1>
		<br>
        @foreach ($encuentro_personas as $encuentro_persona)

            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-96 w-96 lg:h-60 lg:w-60   lg:mb-0 mb-3">
                        <img src="{{$encuentro_persona['persona']->imagen}}" alt="Imagen De La Persona"  class=" w-96 h-96 object-scale-down lg:object-cover  lg:h-60 rounded-2xl">
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                <span>{{$encuentro_persona['persona']->id}}</span><span> - Persona</span>
                            </div>
                            <a class="flex-auto text-lg font-medium font-bold text-black hover:text-red-500 whitespace-no-wrap" href="{{route('persona.show',$encuentro_persona['persona'])}}">{{$encuentro_persona['persona']->nombre}}</a>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex flex-wrap ">
                            <div class="flex-1 items-center">
                                <p><b>Tipo Observación: </b></p>
                                <p>{{$encuentro_persona['encuentro_persona']->tipo_observacion}}</p>
                            </div>
                        </div>
                        <p class="mt-3"></p>
                        <div>
                            <div class="flex-1 items-center">
                                <p><b>Obervacion: </b></p>
                                <p>{{$encuentro_persona['encuentro_persona']->observacion}}</p>
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
