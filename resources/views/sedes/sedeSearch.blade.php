@extends('layouts.Layout')

@section('title', 'Buscar Sede(s)')

@section('main')

	<div class="menu">
        <a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
        <a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
	</div>
		
	<div class="main">
		<h1 align="center" class="display-4">Buscar Sedes(s)</h1>

        <form action="/sede-get" method="GET" enctype="multipart/form-data">
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