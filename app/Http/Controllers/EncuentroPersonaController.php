<?php

namespace App\Http\Controllers;

use App\Models\Encuentro;
use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class EncuentroPersonaController extends Controller
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
        Gate::authorize('admin');
        
        $request->validate([
            'persona_id' => ['required'],
            'tipo_observacion' => ['required'],
            'observacion' => ['required','string','min:5','max:100'],

        ]);

        $persona_id = $request->input('persona_id');
        
        $tipo_observacion = $request->input('tipo_observacion');
        $observacion = $request->input('observacion');

        $encuentro->personas()->attach($persona_id,['tipo_observacion' => $tipo_observacion, 'observacion' => $observacion]);
       
        return redirect()->route('encuentro.show',$encuentro)->with(['mensaje' => 'Detalle Del Encuentro Registrado Correctamente']);


    }

    public function statistics(){
        
        //select persona_id,count(persona_id) as cuenta from encuentro_persona where tipo_observacion='Autogol' group by persona_id order by cuenta desc;

        #region goleadores
        $values_goleadores = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Gol')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $goleadores = array();

        foreach($values_goleadores as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($goleadores,$data);
        }
        #endregion
       
        #region autogoleadores
        $values_autogoleadores = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Autogol')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $autogoleadores = array();

        foreach($values_autogoleadores as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($autogoleadores,$data);
        }

        #endregion
        
        #region expulsiones
        $values_expulsiones = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Expulsión')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $expulsiones = array();

        foreach($values_expulsiones as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($expulsiones,$data);
        }
        #endregion

        #region amonestaciones
        $values_amonestaciones = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Amonestación')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $amonestaciones = array();

        foreach($values_amonestaciones as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($amonestaciones,$data);
        }

        #endregion

        #region lesionados
        $values_lesionados = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Lesión')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $lesionados = array();

        foreach($values_lesionados as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($lesionados,$data);
        }
        #endregion

        #region cambios
        $values_cambios = DB::table('encuentro_persona')
        ->select(DB::raw('persona_id, count(persona_id) as cuenta'))
        ->where('tipo_observacion','Cambio')
        ->groupBy('persona_id')
        ->orderByDesc('cuenta')
        ->limit(10)
        ->get();

        $cambios = array();

        foreach($values_cambios as $value){
            $data = [
                'persona' => Persona::find($value->persona_id),
                'valor' => $value->cuenta,
            ];

            array_push($cambios,$data);
        }
        #endregion

        return view('encuentro_personas.estadisticas',compact('goleadores','autogoleadores','expulsiones','amonestaciones','lesionados','cambios'));
    }


}
