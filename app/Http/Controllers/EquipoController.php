<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Persona;
use App\Models\Sede;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use App\Exports\EquiposExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $equipos = Equipo::all();
        return view('equipos.equipoIndex', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = Sede::all();
        return view('equipos.equipoForm',compact('sedes'));
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
            'fundacion' => ['required'],
            'sede_id' => ['required'],
        ]);

        $nombre = $request->input('nombre');
        $fundacion = $request->input('fundacion');
        $nombre = $request->input('nombre');
        $sede_id = $request->input('sede_id');

        $equipo = new Equipo();
        $equipo->nombre = $nombre;
        $equipo->fundacion = $fundacion;
        $equipo->sede_id = $sede_id;

        if($request->hasfile('imagen')){
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/equipos/',$filename);
            $route = '/storage/equipos/' . $filename;
            $equipo->imagen = $route;

        }else{
            $tiempo = time();
            $url = 'https://loremflickr.com/400/400/animal';
            $img = 'storage/equipos/'.$tiempo.'.jpg';
            $route = '/storage/equipos/'.$tiempo.'.jpg';
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
        $personas = $equipo->personas;
        return view('equipos.equipoShow', compact('equipo','personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        $sedes = Sede::all();
        return view('equipos.equipoForm', compact('equipo','sedes'));
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
        $request->validate([
            'nombre' => ['required','string','regex:/^[[:alpha:]]+[[:space:]]*/','min:5','max:100'],
            'fundacion' => ['required'],
            'sede_id' => ['required'],
        ]);

        $nombre_request = $request->input('nombre');
        $fundacion_request = $request->input('fundacion');
        $sede_id_request = $request->input('sede_id');
        $imagen_request = $request->input('imagen');

        $nombre = ($equipo->nombre != $nombre_request) ? $nombre_request: $equipo->nombre;
        $fundacion = ($equipo->fundacion != $fundacion_request) ? $fundacion_request : $equipo->fundacion;
        $sede_id = ($equipo->sede_id != $sede_id_request) ? $sede_id_request : $equipo->sede_id;

        if($request->hasfile('imagen') && $imagen_request != $equipo->imagen){
            $cadena = substr($equipo->imagen,1);
            if(file_exists($cadena))
                unlink($cadena);
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/equipos/',$filename);
            $route = '/storage/equipos/' . $filename;
            $imagen = $route;
        }else{
            $imagen = $equipo->imagen;
        }

        $array = [
            'nombre' => $nombre,
            'fundacion' => $fundacion,
            'imagen' => $imagen,
            'sede_id' => $sede_id,
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
        $cadena = substr($equipo->imagen,1);
        if(file_exists($cadena))
            unlink($cadena);
        $equipo->delete();
        return redirect()->route('equipo.index');    
    }

    /**
     * 
     * Creates and download a pdf file of all teams
     * 
     */
    public function downloadPDF(){
        $equipos = Equipo::all();
        $pdf = app('dompdf.wrapper');
        view()->share('equipos',$equipos);
        $pdf->loadView('pdfs.pdfEquipo', $equipos);
        return $pdf->download('equipos.pdf');

    }

    public function downloadExcel(){

        return new EquiposExport();
    }

    /**
     * Display a view to find a Equipo.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $equipos = array();
        return view('equipos.equipoSearch',compact('equipos'));
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
        $equipos = Equipo::where('nombre', 'regexp', $regex)->get();
        return view('equipos.equipoSearch',compact('equipos'));
    }

}
