@extends('layouts.Layout')

@section('title', 'Mostrar Sede')

@section('main')
	<!-- DIV MAIN (Registros, formularios y mostrar la informacion)
	MOSTRAR PERSONAS REGISTRADAS -->

    
	<div class="menu">
		<a class="link" href="/sede">Mostrar</a>
	</div>
    
	<div class="main">
		<h1 align="center" class="display-4">Sede</h1>

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

	</div>
@endsection