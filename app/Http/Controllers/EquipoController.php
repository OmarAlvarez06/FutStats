<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;

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
       
        #region Validar datos
        $nombre_request = $request->input('nombre');
        $fecha_registro_request = $request->input('fecha_registro');

        $nombre = (empty($nombre_request)) ? $this->faker->name() : $nombre_request;
        $fecha_registro = (empty($fecha_registro_request)) ? $this->faker->$this->faker->dateTimeBetween('-10 week', '+10 week') :  $fecha_registro_request;
        

        #endregion

        $equipo = new Equipo();
        $equipo->nombre = $nombre;
        $equipo->fecha_registro = $fecha_registro;
        $equipo->activo = 1;

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
            $img = 'public/uploads/equipos/'.$tiempo.'.jpg';
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
        $personas = array();
        $persona_equipo = Persona::all();

        foreach ($persona_equipo as $dato) {

            if($dato->id_equipo == $equipo->id){

                array_push($personas,$dato);
            }
        }

        
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
        $fecha_registro_request = $request->input('fecha_registro');

        $nombre = ($equipo->nombre != $nombre_request) ? $nombre_request: $equipo->nombre;
        $fecha_registro = ($equipo->fecha_registro != $fecha_registro_request) ? $fecha_registro_request : $equipo->fecha_registro;
        $activo = $equipo->activo;
        $imagen = $equipo->imagen;

        #endregion

        $equipo->nombre = $nombre;
        $equipo->fecha_registro = $fecha_registro;
        $equipo->activo = $activo;

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
            'fecha_registro' => $equipo->fecha_registro,
            'imagen' => $equipo->imagen,
            'activo' => $equipo->activo,
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
        $pdf = app('dompdf.wrapper');
        view()->share('equipos',$data);
        $pdf->loadView('pdfs.equipoPDF', $data);
        $name = time() . '_equipos.pdf';
        return $pdf->download($name);
    }
}
