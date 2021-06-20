<?php

namespace App\Http\Controllers;

use App\Models\DetalleEncuentro;
use App\Models\Encuentro;
use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Http\Request;

class DetalleEncuentroController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $encuentro = Encuentro::find($id);
        $personas = array();
        $equipo_local = Equipo::find($encuentro->equipo_local_id);
        $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);

        $personas_local = Persona::where('equipo_id',$equipo_local->id)->get();
        foreach ($personas_local as $persona_local){
            array_push($personas,$persona_local);
        }

        $personas_visitante = Persona::where('equipo_id',$equipo_visitante->id)->get();
        foreach ($personas_visitante as $persona_visitante){
            array_push($personas,$persona_visitante);
        }
        return view('detalle_encuentros.detalleEncuentroForm',compact('encuentro','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'persona_id' => ['required'],
            'encuentro_id' => ['required'],
            'tipo_observacion' => ['required'],
            'observacion' => ['required','string','min:5','max:100'],

        ]);

        $persona_id = $request->input('persona_id');
        $encuentro_id = $request->input('encuentro_id');
        $tipo_observacion = $request->input('tipo_observacion');
        $observacion = $request->input('observacion');


        $detalle_encuentro = new DetalleEncuentro();
        $detalle_encuentro->persona_id  = $persona_id;
        $detalle_encuentro->encuentro_id  = $encuentro_id;
        $detalle_encuentro->tipo_observacion  = $tipo_observacion;
        $detalle_encuentro->observacion  = $observacion;

        $detalle_encuentro->save();

        $encuentro = Encuentro::find($encuentro_id);

        return redirect()->route('encuentro.show',$encuentro);


    }


}
