@extends('layouts.Layout')

@section('title', 'Mostrar Encuentro(s) Encontrado(s)')

@section('main')

	<div class="menu">
        <a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>

	<div class="main">
		<h1 align="center">Encuentro(s) Encontrado</h1>

        @foreach($encuentros as $encuentro)
            <h4 align="center">Encuentro #<span>{{$encuentro['encuentro']->id}}</span></h4>

            <div class="card-group">
                <div class="card">
                    <img src="{{$encuentro['equipo_local']->imagen}}" class="card-img-top" alt="No Disponible">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('equipo.show',$encuentro['equipo_local'])}}">{{$encuentro['equipo_local']->nombre}}</a></h5>
                        <p class="card-text"><b><span>Resultado</span></b><br>{{$encuentro['encuentro']->resultado}}</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{$encuentro['equipo_visitante']->imagen}}" class="card-img-top" alt="No Disponible">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('equipo.show',$encuentro['equipo_visitante'])}}">{{$encuentro['equipo_visitante']->nombre}}</a></h5>
                        <p class="card-text"><b><span>Fecha</span></b><br>{{$encuentro['encuentro']->fecha_hora}}</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{$encuentro['sede']->imagen}}" class="card-img-top" alt="No Disponible">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('sede.show',$encuentro['sede'])}}">{{$encuentro['sede']->nombre}}</a></h5>
                        <p class="card-text"><b><span>Observaciones</span></b><br>{{$encuentro['encuentro']->observaciones}}</p>
                    </div>
                </div>
            </div>

            <br><br>
        @endforeach

	</div>
@endsection