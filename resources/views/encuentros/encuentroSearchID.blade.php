<x-app-layout>
    <h1 class="display-4 text-center">Buscar Encuentro(s) Por ID</h1>
    <br>
    <div class="menu">
        <a class="link" href="/encuentro/create">Registrar Encuentro</a>
		<a class="link" href="/encuentro">Mostrar Encuentros</a>
        <a class="link" href="/encuentro-search-team">Buscar Encuentros Por Equipo</a>
		<a class="link" href="/encuentro-pdf">Descargar PDF Encuentros</a>
	</div>
		
	<div class="main">
        <form action="/encuentro-get-id" method="GET" enctype="multipart/form-data">
            @csrf

            <div class="form-group row inputing">
                <!-- Nombre -->
                <label class="col-sm-2 col-form-label" for="id_buscar">ID A Buscar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="id_buscar" placeholder="Ingresa Aquí El ID Del Encuentro A Buscar" value="">
                </div>
            </div>

            <!-- Boton Enviar -->
            <button class=" btn btn-success btn-lg btn-block">Enviar</button>

        </form>

	</div>

    <div class="restaurador"></div>
</x-app-layout>
