<x-app-layout>
    <h1 class="display-4 text-center">Registrar Sede</h1>
    <br>

    <div class="menu">
		<a class="link" href="/sede">Mostrar Sedes</a>
		<a class="link" href="/sede-search">Buscar Sedes</a>
		<a class="link" href="/sede-pdf">Descargar PDF Sede</a>
	</div>

    <form action="{{ route('sede.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="main">
            <div class="form-group row inputing">
                <!-- Nombre -->
                <label class="col-sm-2 col-form-label" for="nombre">Nombre</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nombre" placeholder="Ingresa Aquí El Nombre De La Sede" value="">
                </div>
            </div>

            <div class="form-group row inputing">
                <!-- Nombre -->
                <label class="col-sm-2 col-form-label" for="ubicacion">Ubicación</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ubicacion" placeholder="Ingresa Aquí La Ubicación De La Sede" value="">
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Imagen</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="uploadInput" name="imagen" onchange="readURL(this);" value="imagen">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

           
            <div class="text-center">
                <img  id="openedImage" class="rounded mx-auto d-block" src="#">
                <br>
            </div>

            <!-- Boton Enviar -->
            <button class=" btn btn-success btn-lg btn-block">Enviar</button>

        </div>
    </form>

    <div class="restaurador"></div>


</x-app-layout>
