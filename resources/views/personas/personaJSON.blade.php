<x-app-layout>
	<br>
	<div class="menu">
		@can('admin')
			<a class="link" href="{{route('persona.create')}}">Registrar Persona</a>
		@endcan
        <a class="link" href="{{route('persona.index')}}">Mostrar Personas</a>
		<a class="link" href="{{route('persona.search')}}">Buscar Personas</a>
		<a class="link" href="{{route('persona.pdf')}}">Descargar PDF Personas</a>
		<a class="link" href="{{route('persona.excel')}}">Descargar Excel Personas</a>
        
	</div>
	<div class="main">
		<h1 class="display-4 text-center">Obtener JSON De Persona</h1>
		
        <div class="bg-white shadow-lg rounded-lg">
            <h2 class="block">Consultas Sobre Roles De Personas</h2>
            <br>
            <div class="block">
                <a href="{{route('persona.json-role','Jugador')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Jugadores</a>
                <a href="{{route('persona.json-role','Director')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Directivos </a>
                <a href="{{route('persona.json-role','Auxiliar')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Auxiliares</a>
            </div>
            <br>
            <hr>
            <h2 class="block">Consultas Sobre Sexo De Personas</h2>
            <br>
            <div class="block">
                <a href="{{route('persona.json-sex','M')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Hombres</a>
                <a href="{{route('persona.json-sex','F')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Mujeres</a>
                <a href="{{route('persona.json-sex','O')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded inline">JSON Otro</a>
            </div>
            <br>
        </div>
	
	</div>
	<div class="restaurador"></div>
	
</x-app-layout>