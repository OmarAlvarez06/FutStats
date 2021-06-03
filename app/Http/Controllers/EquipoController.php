<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Faker\Factory as Faker;

class EquipoController extends Controller
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
        $equipos = Equipo::get();
        return view('equipos.equipoIndex', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.equipoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $faker = Faker::create('en_US');

        #region Validar datos
        $nombre_request = $request->input('nombre');
        $fecha_creacion_request = $request->input('fecha_creacion');

        $nombre = (empty($nombre_request)) ? $faker->city() : $nombre_request;
        $fecha_creacion = (empty($fecha_creacion_request)) ? $faker->dateTimeBetween('-10 week', '+10 week') :  $fecha_creacion_request;
        

        #endregion

        $equipo = new Equipo();
        $equipo->nombre = $nombre;
        $equipo->fecha_creacion = $fecha_creacion;

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/equipos/',$filename);
            $route = '/uploads/equipos/' . $filename;
            $equipo->imagen = $route;

        }else{
            $tiempo = time();
            $url = 'https://loremflickr.com/400/400/animal';
            $img = 'uploads/equipos/'.$tiempo.'.jpg';
            $route = '/uploads/equipos/'.$tiempo.'.jpg';
            file_put_contents($img, file_get_contents($url));
            $equipo->imagen = $route;
        }

        $equipo->save();
    
        return redirect()->route('equipo.show',$equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        
        $personas = Equipo::find($equipo->id)->people;

        if(!empty($personas))
            return view('equipos.equipo_personaShow', compact('equipo','personas'));
        else
            return view('equipos.equipoShow', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.equipoForm', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {

        #region Validar Datos
        $nombre_request = $request->input('nombre');
        $fecha_creacion_request = $request->input('fecha_creacion');

        $nombre = ($equipo->nombre != $nombre_request) ? $nombre_request: $equipo->nombre;
        $fecha_creacion = ($equipo->fecha_creacion != $fecha_creacion_request) ? $fecha_creacion_request : $equipo->fecha_creacion;
        $activo = $equipo->activo;
        $imagen = $equipo->imagen;

        #endregion

        $equipo->nombre = $nombre;
        $equipo->fecha_creacion = $fecha_creacion;

        if($request->hasfile('imagen')){
            $cadena = substr($equipo->imagen,1);
            unlink($cadena);
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/equipos/',$filename);
            $route = '/uploads/equipos/' . $filename;
            $equipo->imagen = $route;
        }

        $array = [

            'nombre' => $equipo->nombre,
            'fecha_creacion' => $equipo->fecha_creacion,
            'imagen' => $equipo->imagen,
        ];

        Equipo::where('id', $equipo->id)->update($array);

        return redirect()->route('equipo.show', $equipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipo.index');    
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $data = Equipo::all();
        $pdf = app('dompdf.wrapper')->setPaper('a4', 'landscape');
        view()->share('equipos',$data);
        $pdf->loadView('pdfs.equipoPDF', $data);
        $name = time() . '_equipos.pdf';
        return $pdf->download($name);
    }

    /**
     * Display a view to find a Equipo.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('equipos.equipoSearch');
    }

    /**
     * Gets a created Equipo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets(Request $request)
    {
        $identifier = $request->input('identifier');

        $regex = '[a-zA-Z]*' . $identifier . '[a-zA-Z]*';
        $coincidencias = Equipo::where('nombre', 'regexp', $regex)->get();
        return view('equipos.equipoCoincidences',compact('coincidencias'));
    }

}
