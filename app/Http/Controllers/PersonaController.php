<?php


namespace App\Http\Controllers;


use App\Models\PersonaEquipo;
use App\Models\Persona;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;

class PersonaController extends Controller
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
        $personas = Persona::get();
        //$personas = DB::table('personas')->where('rol','Jugador')->get();
        return view('personas.personaIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('personas.personaForm',compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->edad = $request->input('edad');
        $persona->sexo = $request->input('sexo');
        $persona->rol = $request->input('rol');

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/personas/',$filename);
            $route = '/uploads/personas/' . $filename;
            $persona->imagen = $route;

        }else{
            $persona->imagen = '';
        }

        $persona->save();

        //registrar ahora en persona_equipo:

        $persona_equipo = new PersonaEquipo();
        $persona_equipo->id_persona = $persona->id;
        $persona_equipo->id_equipo = $request->input('equipo');
        $persona_equipo->fecha_inicio = $request->input('fecha_inicio');
        $persona_equipo->fecha_cierre = $request->input('fecha_cierre');
        $persona_equipo->save();

        return redirect()->route('persona.show',$persona);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $equipos = array();
        $persona_equipo = PersonaEquipo::where('id_persona', $persona->id)->get();

        foreach ($persona_equipo as $dato) {

            $equipo = Equipo::findOrFail($dato->id_equipo);
            if($equipo != null){

                $datosEquipo = array(
                    'fecha_inicio' => $dato->fecha_inicio,
                    'fecha_cierre' => $dato->fecha_cierre,
                    'equipo' => $equipo,
                );

                array_push($equipos,$datosEquipo);
            }
        }

        
        if(!empty($equipos))
            return view('personas.persona_equipoShow', compact('persona','equipos'));
        else
            return view('personas.personaShow', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {

        return view('personas.personaForm', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {

        $persona->nombre = $request->input('nombre');
        $persona->edad = $request->input('edad');
        $persona->sexo = $request->input('sexo');
        $persona->rol = $request->input('rol');
        $cadena = substr($persona->imagen,1);
        unlink($cadena);

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/personas/',$filename);
            $route = '/uploads/personas/' . $filename;
            $persona->imagen = $route;

        }else{
            $persona->imagen = '';
        }

        $array = [

            'nombre' => $persona->nombre,
            'edad' => $persona->edad,
            'sexo' => $persona->sexo,
            'rol' => $persona->rol,
            'imagen' => $persona->imagen,
        ];

        Persona::where('id', $persona->id)->update($array);

        return redirect()->route('persona.show', $persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('persona.index');
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $data = Persona::all();
        $pdf = app('dompdf.wrapper');
        view()->share('personas',$data);
        $pdf->loadView('pdfs.personaPDF', $data);
        $name = time() . '_personas.pdf';
        return $pdf->download($name);
    }

    private function validateValues(Request $request){
        
    }

}
