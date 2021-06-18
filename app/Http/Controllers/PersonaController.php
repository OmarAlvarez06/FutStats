<?php


namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Faker\Factory as Faker;

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
        $people = Persona::get();
        $valores = array();

        foreach ($people as $person){
            
            $value = [
                'persona' => $person,
                'equipo' => Equipo::find($person->equipo_id),
            ];

            array_push($valores,$value);

        }
        return view('personas.personaIndex', compact('valores'));
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
            $file->move('uploads/personas/',$filename);
            $route = '/uploads/personas/' . $filename;
            $persona->imagen = $route;

        }else{
            $tiempo = time();
            $url = 'https://loremflickr.com/400/400/people';
            $img = 'uploads/personas/'.$tiempo.'.jpg';
            $route = '/uploads/personas/'.$tiempo.'.jpg';
            file_put_contents($img, file_get_contents($url));
            $persona->imagen = $route;
        }

        $persona->save();
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
        $equipo = Equipo::find($persona->equipo_id);
        return view('personas.personaShow', compact('persona','equipo'));
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
            $file->move('uploads/personas/',$filename);
            $imagen = '/uploads/personas/' . $filename;
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
        $cadena = substr($persona->imagen,1);
        if(file_exists($cadena))
            unlink($cadena);
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
        $pdf = app('dompdf.wrapper')->setPaper('a4', 'landscape');
        view()->share('personas',$data);
        $pdf->loadView('pdfs.personaPDF', $data);
        $name = time() . '_personas.pdf';
        return $pdf->download($name);
    }

    /**
     * Display a view to find a Persona.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $personas = array();
        return view('personas.personaSearch');
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
        return view('personas.personaSearch',compact('personas'));
        
    }

    
}
