@extends('layouts.Layout')

@section('title', 'Buscar Equipo(s)')

@section('main')

	<div class="menu">
        <a class="link" href="/equipo/create">Registrar Equipo</a>
		<a class="link" href="/equipo">Mostrar Equipos</a>
        <a class="link" href="/equipo-pdf">Descargar PDF Equipos</a>
	</div>
		
	<div class="main">
		<h1 align="center" class="display-4">Buscar Equipo(s)</h1>

        <form action="/equipo-get" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="form-group row inputing">
                <!-- Nombre -->
                <label class="col-sm-2 col-form-label" for="nombre">Nombre A Buscar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="identifier" placeholder="Ingresa Aquí El Valor A Buscar" value="">
                </div>
            </div>

            <!-- Boton Enviar -->
            <button class=" btn btn-success btn-lg btn-block">Enviar</button>

        </form>

	</div>
@endsection