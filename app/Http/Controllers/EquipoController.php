<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Persona;
use App\Models\Sede;
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
        $teams = Equipo::get();
        $valores = array();

        foreach ($teams as $team){
            
            $value = [
                'equipo' => $team,
                'sede' => Sede::find($team->sede_id),
            ];

            array_push($valores,$value);

        }
        return view('equipos.equipoIndex', compact('valores'));
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
        $personas = $equipo->persona;
        $sede = Sede::find($equipo->sede_id);
        return view('equipos.equipoShow', compact('equipo','personas','sede'));
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
            $file->move('uploads/equipos/',$filename);
            $route = '/uploads/equipos/' . $filename;
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
        $pdf = app('dompdf.wrapper')->setPaper('a4', 'landscape');
        view()->share('equipos',$equipos);
        $pdf->loadView('pdfs.equipoPDF', $equipos);
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
