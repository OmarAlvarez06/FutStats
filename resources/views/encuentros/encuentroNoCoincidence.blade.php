@extends('layouts.Layout')

@section('title', 'Mostrar Encuentro Encontrado')

@section('main')

	<div class="menu">
        <a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-id">Buscar Encuentros Por ID</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>

	<div class="main">
		<h1 align="center">Encuentro Encontrado</h1>

        <h4 align="center">Encuentro No Encontrado</span></h4>


	</div>
@endsection