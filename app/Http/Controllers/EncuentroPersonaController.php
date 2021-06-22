<?php

namespace App\Http\Controllers;

use App\Models\EncuentroPersona;
use App\Models\Encuentro;
use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Http\Request;

class EncuentroPersonaController extends Controller
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
            if($persona_local->rol == 'Jugador')
                array_push($personas,$persona_local);
        }

        $personas_visitante = Persona::where('equipo_id',$equipo_visitante->id)->get();
        foreach ($personas_visitante as $persona_visitante){
            if($persona_visitante->rol == 'Jugador')
                array_push($personas,$persona_visitante);
        }
        return view('encuentro_personas.encuentroPersonaForm',compact('encuentro','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Encuentro $encuentro)
    {

        $request->validate([
            'persona_id' => ['required'],
            'tipo_observacion' => ['required'],
            'observacion' => ['required','string','min:5','max:100'],

        ]);

        $persona_id = $request->input('persona_id');
        
        $tipo_observacion = $request->input('tipo_observacion');
        $observacion = $request->input('observacion');

        $encuentro->personas()->attach($persona_id,['tipo_observacion' => $tipo_observacion, 'observacion' => $observacion]);
       
        return redirect()->route('encuentro.show',$encuentro);


    }


}
