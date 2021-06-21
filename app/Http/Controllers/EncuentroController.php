<?php

namespace App\Http\Controllers;

use App\Exports\EncuentrosExport;
use App\Models\DetalleEncuentro;
use App\Models\Equipo;
use App\Models\Sede;
use App\Models\Encuentro;
use App\Models\Persona;
use App\Models\PersonaEncuentro;
use Illuminate\Http\Request;

class EncuentroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Encuentro::all();

        $encuentros = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($equipo_local->sede_id);

            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($encuentros,$dato);

        }

        return view ('encuentros.encuentroIndex')->with('encuentros',$encuentros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('encuentros.encuentroForm',compact('equipos'));
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
            'equipo_local_id' => ['required'],
            'equipo_visitante_id' => ['required','different:equipo_local_id'],
            'fecha_hora' => ['required','unique:encuentros,fecha_hora'],
            'goles_local' => ['required','min:0','max:100'],
            'goles_visitante' => ['required','min:0','max:100'],

        ]);

        $equipo_local_id = $request->input('equipo_local_id');
        $equipo_visitante_id = $request->input('equipo_visitante_id');
        $goles_local = $request->input('goles_local');
        $goles_visitante = $request->input('goles_visitante');
        $fecha_hora = $request->input('fecha_hora');

        $encuentro = new Encuentro();
        $encuentro->equipo_local_id = $equipo_local_id; 
        $encuentro->equipo_visitante_id = $equipo_visitante_id;  
        $encuentro->fecha_hora = $fecha_hora;
        $encuentro->goles_local = $goles_local;
        $encuentro->goles_visitante = $goles_visitante;        

        $encuentro->save();

        return redirect()->route('encuentro.show',$encuentro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Encuentro $encuentro)
    {
        $equipo_local = Equipo::find($encuentro->equipo_local_id);
        $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
        $sede = Sede::find($equipo_local->sede_id);

        return view('encuentros.encuentroShow', compact('encuentro','equipo_local','equipo_visitante','sede'));
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $matchs = Encuentro::all();

        $encuentros = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($equipo_local->sede_id);

            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($encuentros,$dato);

        }

        $pdf = app('dompdf.wrapper');
        view()->share('encuentros',$encuentros);
        $pdf->loadView('pdfs.pdfEncuentro', $encuentros);
        return $pdf->download('encuentros.pdf');
    }

    public function downloadExcel(){

        return new EncuentrosExport();
    }

    /**
     * Display a view to find a Encuentro by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_id()
    {
        $equipo_local = array();
        $equipo_visitante = array();
        $encuentro = array();
        return view('encuentros.encuentroSearchID',compact('encuentro','equipo_local','equipo_visitante'));
    }
    
    /**
     * Gets a created Encuentro in storage by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets_id(Request $request)
    {
        $id_buscar = $request->input('identifier');
        $encuentro = Encuentro::find($id_buscar);

        $equipo_local =  (empty($encuentro)) ? array() : Equipo::find($encuentro->equipo_local_id);
        $equipo_visitante = (empty($encuentro)) ?  array() : Equipo::find($encuentro->equipo_visitante_id);
        

        return view('encuentros.encuentroSearchID',compact('encuentro','equipo_local','equipo_visitante'));
        
    }

}
