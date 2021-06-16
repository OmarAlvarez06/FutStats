<x-app-layout>
	<h1 class="display-4 text-center">Mostrar Sede</h1>
    <br>
	<div class="menu">
		<a class="link" href="/sede/create">Registrar Sede</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sedes</a>
	</div>
    
	<div class="main">

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

	<div class="restaurador"></div>
</x-app-layout>
