@extends('layouts.pdfLayout')

@section('title', 'Equipos PDF')

@section('principal')
<h1 align="center" class="display-4">Equipos</h1>
	<table border="1" align="center" class=" table-dark table table-image">
		<thead>
			<tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Registro</th>
                <th scope="col">Activo</th>
                <th scope="col">Imagen</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{$equipo->id}}</td>
                    <td><a href="{{ route('equipo.show', $equipo)}}">{{$equipo->nombre}}</a></td>
                    <td>{{$equipo->fecha_registro}}</td>
                    <?php
                        $activo = 'No';
                        if($equipo->activo == 1)
                            $activo = 'Si';
                    ?>
                    <td>{{$activo}}</td>
                    <td class="w-25">
                        <img src="{{public_path($equipo->imagen)}}"  width="300px" height="300px" alt="No Disponible">
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
@endsection