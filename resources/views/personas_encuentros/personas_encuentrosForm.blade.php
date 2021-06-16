<x-app-layout>
    <h1 class="display-4 text-center">>Registrar Observación</h1>
	<br>
	<div class="menu">
		<a class="link" href="/personaencuentro">Mostrar Observaciones</a>
	</div>

	<div class="main">
		
		<form method="POST" action="{{ route('personaencuentro.store')}}">
			@csrf

			<label for="persona">Seleccione La Persona: </label>
			<select name="persona">
				@foreach ($personas as $persona)
					<option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
				@endforeach			
			</select>

			<br><br>
			
			<label for="encuentro">Seleccione El Encuentro: </label>
			<select name="encuentro">
				@foreach ($encuentros as $encuentro)
					<option value="{{ $encuentro->id }}">Equipo Local:{{ $encuentro->local }} | Equipo Visitante:{{ $encuentro->visitante}} | Sede:{{ $encuentro->sede}} | Fecha:{{ $encuentro->fecha_hora}}</option>
				@endforeach			
			</select>
			
			<br><br>
			
			<label for="observacion_tipo">Seleccione El Tipo De Oservación: </label>
			<select name="observacion_tipo">
				<option value="Gol">Gol</option>
				<option value="Amonestación">Amonestación</option>
				<option value="Expulsión">Expulsión</option>
				<option value="Lesión">Lesión</option>
				<option value="Cambio Entrada">Cambio Entrada</option>
				<option value="Cambio Salida">Cambio Salida</option>
				<option value="AutoGol">AutoGol</option>
			</select>
			
			<br><br>
			
			<label for="minuto">Seleccione La Hora De Observación: </label>
			<input type="time" name="minuto">

			<br><br>

			<!-- Boton Enviar -->
			<button class=" btn btn-success btn-lg btn-block">Enviar</button>
		</form>
	</div>

	<div class="restaurador"></div>
</x-app-layout>