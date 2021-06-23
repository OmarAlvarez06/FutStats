<?php


namespace App\Http\Controllers;

use App\Exports\PersonasExport;
use App\Models\Persona;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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
        $personas = Persona::all();
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

        $request->validate([
            'nombre' => ['required','string','regex:/^[[:alpha:]]+[[:space:]]*/','min:5','max:100'],
            'edad' => ['required','integer','min:18','max:100'],
            'sexo' => ['required'],
            'rol' => ['required'],
            'equipo_id' => ['required'],
        ]);

        $nombre = $request->input('nombre');
        $edad = $request->input('edad');
        $sexo = $request->input('sexo');
        $rol = $request->input('rol');
        $equipo_id = $request->input('equipo_id');

        $persona = new Persona();
        $persona->nombre = $nombre;
        $persona->edad = $edad;
        $persona->sexo = $sexo;
        $persona->rol = $rol;
        $persona->equipo_id = $equipo_id;

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/personas/',$filename);
            $route = '/storage/personas/' . $filename;
            $persona->imagen = $route;

        }else{
            $tiempo = time();
            $url = 'https://loremflickr.com/400/400/people';
            $img = 'storage/personas/'.$tiempo.'.jpg';
            $route = '/storage/personas/'.$tiempo.'.jpg';
            file_put_contents($img, file_get_contents($url));
            $persona->imagen = $route;
        }

        $persona->save();
        $mensaje = ['mensaje' => 'Persona Registrada Correctamente'];
        return view('personas.personaShow',compact('persona','mensaje'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
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
        $equipos = Equipo::all();
        return view('personas.personaForm', compact('persona','equipos'));
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
        $request->validate([
            'nombre' => ['required','string','regex:/^[[:alpha:]]+[[:space:]]*/','min:5','max:100'],
            'edad' => ['required','integer','min:18','max:100'],
            'sexo' => ['required'],
            'rol' => ['required'],
            'equipo_id' => ['required'],
        ]);

        $nombre_request = $request->input('nombre');
        $edad_request = $request->input('edad');
        $sexo_request = $request->input('sexo');
        $rol_request = $request->input('rol');
        $equipo_id_request = $request->input('equipo_id');
        $imagen_request = $request->input('imagen');

        $nombre = ($persona->nombre != $nombre_request) ? $nombre_request: $persona->nombre;
        $edad = ($persona->edad != $edad_request) ? $edad_request : $persona->edad;
        $sexo = ($persona->sexo != $sexo_request) ? $sexo_request : $persona->sexo;
        $rol = ($persona->rol != $rol_request) ? $rol_request : $persona->rol;
        $equipo_id = ($persona->equipo_id != $equipo_id_request) ? $equipo_id_request : $persona->equipo_id;
        $imagen = $persona->imagen;

        if($request->hasfile('imagen') && $imagen_request != $persona->imagen){
            $cadena = substr($imagen,1);
            if(file_exists($cadena))
                unlink($cadena);
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/personas/',$filename);
            $imagen = '/storage/personas/' . $filename;
        }else{
            $imagen = $persona->imagen;
        }

        $array = [
            'nombre' => $nombre,
            'edad' => $edad,
            'sexo' => $sexo,
            'rol' => $rol,
            'imagen' => $imagen,
            'equipo_id' => $equipo_id,
        ];

        Persona::where('id', $persona->id)->update($array);

        $persona->nombre = $nombre;
        $persona->edad = $edad;
        $persona->sexo = $sexo;
        $persona->rol = $rol;
        $persona->imagen = $imagen;
        $persona->equipo_id = $equipo_id;
        
      
        $mensaje = ['mensaje' => 'Persona Editada Correctamente'];
        return view('personas.personaShow',compact('persona','mensaje'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $nombre = $persona->nombre;
        $cadena = substr($persona->imagen,1);
        if(file_exists($cadena))
            unlink($cadena);
        $persona->delete();
        
        $personas = Persona::all();
        $mensaje = ['mensaje' => $nombre .' Ha Sid@ Eliminad@ Correctamente'];
        return view('personas.personaIndex',compact('personas','mensaje'));
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){
        $personas = Persona::all();
        $pdf = app('dompdf.wrapper');
        view()->share('personas',$personas);
        $pdf->loadView('pdfs.pdfPersona', $personas);
        return $pdf->download('personas.pdf');
    }

    public function downloadExcel(){

        return new PersonasExport();
    }

    /**
     * Display a view to find a Persona.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $personas = array();
        return view('personas.personaSearch',compact('personas'));
    }

    /**
     * Gets a created Persona in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets(Request $request)
    {
        $identifier = $request->input('identifier');
        $regex = '[a-zA-Z]*' . $identifier . '[a-zA-Z]*';
        $personas = Persona::where('nombre', 'regexp', $regex)->get();
        if(count($personas) < 1){
            $mensaje = ['mensaje' => 'Persona(s) No Encontrada(s)'];
            return view('personas.personaSearch',compact('personas','mensaje'));
        }else{
            return view('personas.personaSearch',compact('personas'));
        }
        
    }

    
}
