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
        $personas = Persona::get();
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

        $faker = Faker::create('en_PE');

         #region Validar datos
         $nombre_request = $request->input('nombre');
         $edad_request = $request->input('edad');
         $sexo_request = $request->input('sexo');
         $rol_request = $request->input('rol');
         $equipo_request = $request->input('equipo');

         $nombre = (empty($nombre_request)) ? $faker->name() : $nombre_request;
         $edad = (empty($edad_request)) ? $faker->numberBetween(18,70) :  $edad_request;
         $sexo = (empty($sexo_request)) ? 'F' : $sexo_request;
         $rol = (empty($rol_request)) ? 'Jugador' : $rol_request;
         $equiposCount = count(Equipo::all());
         $equipo = (empty($equipo_request)) ? $faker->numberBetween(1,$equiposCount) : $equipo_request;
         

         #endregion

        $persona = new Persona();
        $persona->nombre = $nombre;
        $persona->edad = $edad;
        $persona->sexo = $sexo;
        $persona->rol = $rol;
        $persona->equipo_id = $equipo;

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

        #region Validar Datos
        $nombre_request = $request->input('nombre');
        $edad_request = $request->input('edad');
        $sexo_request = $request->input('sexo');
        $rol_request = $request->input('rol');
        $equipo_request = $request->input('equipo');

        $nombre = ($persona->nombre != $nombre_request) ? $nombre_request: $persona->nombre;
        $edad = ($persona->edad != $edad_request) ? $edad_request : $persona->edad;
        $sexo = ($persona->sexo != $sexo_request) ? $sexo_request : $persona->sexo;
        $rol = ($persona->rol != $rol_request) ? $rol_request : $persona->rol;
        $equipo = ($persona->equipo_id != $equipo_request) ? $equipo_request : $persona->equipo_id;
        $imagen = $persona->imagen;

        #endregion

        if($request->hasfile('imagen')){
            $cadena = substr($imagen,1);
            unlink($cadena);
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/personas/',$filename);
            $imagen = '/uploads/personas/' . $filename;
        }

        $array = [
            'nombre' => $nombre,
            'edad' => $edad,
            'sexo' => $sexo,
            'rol' => $rol,
            'imagen' => $imagen,
            'equipo_id' => $equipo,
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
        $coincidencias = Persona::where('nombre', 'regexp', $regex)->get();
        return view('personas.personaCoincidences',compact('coincidencias'));
        
    }

    
}
