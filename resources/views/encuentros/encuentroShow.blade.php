<x-app-layout>
    <h1 class="display-4 text-center">Mostrar Encuentro</h1>
    <br>
    <div class="menu">
		<a class="link" href="/encuentro/create">Registrar Encuentro</a>
        <a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
        <a class="link" href="/encuentro">Mostrar Encuentros</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>

	<div class="main">
		<h2 class="text-center display-5">Encuentro #<span>{{$encuentro->id}}</span></h2>

        <div class="card-group">
            <div class="card">
                <img src="{{$equipo_local->imagen}}" class="card-img-top" alt="No Disponible">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('equipo.show',$equipo_local)}}">{{$equipo_local->nombre}}</a></h5>
                    <p class="card-text"><b><span>Resultado</span></b><br>{{$encuentro->resultado}}</p>
                </div>
            </div>
            <div class="card">
                <img src="{{$equipo_visitante->imagen}}" class="card-img-top" alt="No Disponible">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('equipo.show',$equipo_visitante)}}">{{$equipo_visitante->nombre}}</a></h5>
                    <p class="card-text"><b><span>Fecha</span></b><br>{{$encuentro->fecha_hora}}</p>
                </div>
            </div>
            <div class="card">
                <img src="{{$sede->imagen}}" class="card-img-top" alt="No Disponible">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('sede.show',$sede)}}">{{$sede->nombre}}</a></h5>
                    <p class="card-text"><b><span>Observaciones</span></b><br>{{$encuentro->observaciones}}</p>
                </div>
            </div>
        </div>

	</div>

    <div class="restaurador"></div>
</x-app-layout>
