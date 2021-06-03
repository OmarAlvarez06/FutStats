@extends('layouts.Layout')

@section('title', 'Buscar Persona(s)')

@section('main')

	<div class="menu">
        <a class="link" href="/persona/create">Registrar Persona</a>
		<a class="link" href="/persona">Mostrar Personas</a>
        <a class="link" href="/persona-pdf">Descargar PDF Personas</a>
	</div>
		
	<div class="main">
		<h1 align="center" class="display-4">Buscar Persona(s)</h1>

        <form action="/persona-get" method="GET" enctype="multipart/form-data">
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