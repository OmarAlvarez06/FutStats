@extends('layouts.Layout')

@section('title', 'Buscar Encuentro(s) Por Equipo(s)')

@section('main')

	<div class="menu">
        <a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>
		
	<div class="main">
		<h1 align="center" class="display-4">Buscar Encuentro(s) Por Equipo(s)</h1>

        <form action="/encuentro-get-team" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="form-group row inputing">
                <!-- ID -->
                <label class="col-sm-2 col-form-label" for="id_buscar">ID Del Equipo A Buscar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="id_buscar" placeholder="Ingresa Aquí El ID Del Equipo A Buscar En Encuentros" value="">
                </div>
            </div>

            <!-- Boton Enviar -->
            <button class=" btn btn-success btn-lg btn-block">Enviar</button>

        </form>

	</div>
@endsection