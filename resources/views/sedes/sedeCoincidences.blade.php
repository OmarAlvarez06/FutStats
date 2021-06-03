@extends('layouts.Layout')

@section('title', 'Mostrar Sede(s) Encontradas')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

	<div class="menu">
        <a class="link" href="/sede/create">Registrar Sede</a>
        <a class="link" href="/sede-search">Buscar Sede</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
	</div>

	<div class="main">
		<h1 align="center">Sede(s) Encontrados</h1>

        @foreach ($coincidencias as $sede)

            <div class="container mt-5 d-flex justify-content-center">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <div class="image"> 
                            <img src="{{$sede->imagen}}"  class="img-thumbnail" width="600px" height="600px" alt="No Disponible">
                        </div>
                        <div class="ml-3 w-100">
                            <h4 class="mb-0 mt-0">{{$sede->nombre}}</h4> 
                            <span>{{$sede->ubicacion}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
        @endforeach

	</div>
@endsection