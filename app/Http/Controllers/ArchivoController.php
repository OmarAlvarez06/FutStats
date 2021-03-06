<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArchivoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        Gate::authorize('admin');
        $sede = Sede::find($id);
        return view('archivos.archivoForm',compact('sede'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Sede $sede)
    {
        Gate::authorize('admin');

        $request->validate([
            'archivo' => ['required'],
        ]);

        $file = $request->archivo;

        $archivo = new Archivo();
        if($file->isValid()){
            $nombre_hash = $file->store('public/archivos');
            $real_nombre_hash = "/storage/" . substr($nombre_hash,7);
            $archivo->nombre_hash = $real_nombre_hash;
            $archivo->nombre = $file->getClientOriginalName();
            $archivo->sede_id = $sede->id;
            $archivo->mime = $file->getClientMimeType();
            $archivo->save();
            return redirect()->route('sede.show',$sede)->with(['mensaje' => 'Archivo Agregado Correctamente']);
        }else{
            return redirect()->route('sede.show',$sede)->with(['mensaje' => 'Archivo Inválido Para Subir']);
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('admin');

        $archivo = Archivo::find($id);
        $nombre = $archivo->nombre;
        $sede = $archivo->sede;
        $cadena = substr($archivo->nombre_hash,1);
        if(file_exists($cadena))
            unlink($cadena);
        $archivo->delete();
        return redirect()->route('sede.show',$sede)->with(['mensaje' => $nombre . ' Eliminado Correctamente']);
    }


}
