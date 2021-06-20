<?php

namespace App\Http\Controllers;

use App\Exports\SedesExport;
use App\Models\Sede;
use App\Models\Equipo;
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
        $request->validate([
            'nombre' => ['required','string','regex:/^[[:alpha:]]+[[:space:]]*/','min:5','max:100','unique:sedes,nombre'],
            'ubicacion' => ['required','string','min:5','max:255'],
        ]);

        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        
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
        $equipos = $sede->equipo;
        return view('sedes.sedeShow', compact('sede','equipos'));
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $sedes = Sede::all();
        $pdf = app('dompdf.wrapper');
        view()->share('sedes',$sedes);
        $pdf->loadView('pdfs.pdfSede', $sedes);
        return $pdf->download('sedes.pdf');
    }

    public function downloadExcel(){

        return new SedesExport();
    }

     /**
     * Display a view to find a Equipo.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $sedes = array();
        return view('sedes.sedeSearch',compact('sedes'));
    }

    /**
     * Gets a created Sede in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets(Request $request)
    {
        $identifier = $request->input('identifier');
        $regex = '[a-zA-Z]*' . $identifier . '[a-zA-Z]*';
        $sedes = Sede::where('nombre', 'regexp', $regex)->get();
        return view('sedes.sedeSearch',compact('sedes'));
    }

}
