<?php


namespace App\Http\Controllers;


use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class PersonaController extends Controller
{
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
        return view('personas.personaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $image_file = $request->imagen;
        $image = Image::make($request->file('imagen')->getRealPath());
        Response::make($image->encode('jpeg'));
        
        $form_data = array(
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'rol' => $request->rol,
            'imagen' => $image
            
        );
    
        $persona = Persona::create($form_data);

        return redirect()->route('persona.show',$persona);

    }

    public function fetch_image($image_id)
    {
        $persona = Persona::findOrFail($image_id);

        $image_file = Image::make($persona->imagen);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
