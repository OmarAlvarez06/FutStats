@extends('layouts.pdfLayout')

@section('title', 'Sedes PDF')

@section('principal')
        <h1 align="center" class="display-4">Sedes</h1>
	
        <table border="1"class="table table-dark table-image">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sedes as $sede)
                    <tr>
                        <td>{{$sede->id}}</td>
                        <td>
                            <a href="{{route('sede.show', $sede)}}">{{$sede->nombre}}</a>
                        </td>
                        <td>{{$sede->ubicacion}}</td>
                        <td class="w-25">
                            <img src="{{public_path($sede->imagen)}}" width="100px" height="100px" alt="No Disponible">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                    
@endsection