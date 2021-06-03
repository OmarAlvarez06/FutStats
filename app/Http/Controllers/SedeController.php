<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Faker\Factory as Faker;

class SedeController extends Controller
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
        $sedes = Sede::all();
        return view('sedes.sedeIndex', compact('sedes'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sedes.sedeForm');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker::create('en_US');

        #region Validar datos
        $nombre_request = $request->input('nombre');
        $ubicacion_request = $request->input('ubicacion');

        $nombre = (empty($nombre_request)) ? $faker->streetName() : $nombre_request;
        $ubicacion = (empty($ubicacion_request)) ? ($faker->address()) :  $ubicacion_request;
        

        #endregion

        $sede = new Sede();
        $sede->nombre = $nombre;
        $sede->ubicacion = $ubicacion;

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/sedes/',$filename);
            $route = '/uploads/sedes/' . $filename;
            $sede->imagen = $route;

        }else{
            $tiempo = time();
            $url = 'https://loremflickr.com/400/400/paisaje';
            $img = 'uploads/sedes/'.$tiempo.'.jpg';
            $route = '/uploads/sedes/'.$tiempo.'.jpg';
            file_put_contents($img, file_get_contents($url));
            $sede->imagen = $route;
        }

        $sede->save();
    
        return redirect()->route('sede.show',$sede);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        return view('sedes.sedeShow', compact('sede'));
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $data = Sede::all();
        $pdf = app('dompdf.wrapper');
        view()->share('sedes',$data);
        $pdf->loadView('pdfs.sedePDF', $data);
        $pdf->setPaper('a4', 'landscape');
        $name = time() . '_sedes.pdf';
        return $pdf->download($name);
    }

     /**
     * Display a view to find a Equipo.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('sedes.sedeSearch');
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
        $coincidencias = Sede::where('nombre', 'regexp', $regex)->get();
        return view('sedes.sedeCoincidences',compact('coincidencias'));
    }

}
