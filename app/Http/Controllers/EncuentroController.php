<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Sede;
use App\Models\Encuentro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Faker\Factory as Faker;

class EncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Encuentro::all();

        $encuentros = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($encuentro->sede_id);

            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($encuentros,$dato);

        }

        return view ('encuentros.encuentroIndex')->with('encuentros',$encuentros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        $sedes = Sede::all();
        return view('encuentros.encuentroForm',compact('equipos','sedes'));
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

        $equipo_local_id_request = $request->input('equipo_local');
        $equipo_visitante_id_request = $request->input('equipo_visitante');
        $sede_id_request = $request->input('sede');
        $goles_local_request = $request->input('goles_local');
        $goles_visitante_request = $request->input('goles_visitante');
        $observaciones_request = $request->input('observaciones');
        $fecha_hora_request = $request->input('fecha_hora');

        $equiposCount = count(Equipo::all());
        $sedeCount = count(Sede::all());

        $equipo_local_id = (empty($equipo_local_id_request)) ? $faker->numberBetween(1,$equiposCount) : $equipo_local_id_request;

        $equipo_visitante_id = $equipo_local_id;
        if(empty($equipo_visitante_id_request)){
            while($equipo_visitante_id == $equipo_local_id)
                $equipo_visitante_id = $faker->numberBetween(1,$equiposCount);
        }else{
            $equipo_visitante_id = $equipo_visitante_id_request;
            while($equipo_visitante_id == $equipo_local_id)
                $equipo_visitante_id = $faker->numberBetween(1,$equiposCount);
        }
        
        $sede_id = (empty($sede_id_request)) ? $faker->numberBetween(1,$sedeCount) : $sede_id_request;
        $goles_local = (empty($goles_local_request)) ? $faker->numberBetween(0,10) : $goles_local_request;
        $goles_visitante = (empty($goles_visitante_request)) ? $faker->numberBetween(0,10) : $goles_visitante_request;
        $observaciones = (empty($observaciones_request)) ? $faker->paragraph() : $observaciones_request;
        $fecha_hora = (empty($fecha_hora_request)) ? $faker->dateTimeBetween('-1 week', '+5 week') : $fecha_hora_request;
        
        $resultado = $goles_local . ' - ' . $goles_visitante;


        $encuentro = new Encuentro();
        $encuentro->equipo_local_id = $equipo_local_id; 
        $encuentro->equipo_visitante_id = $equipo_visitante_id; 
        $encuentro->sede_id = $sede_id; 
        $encuentro->resultado = $resultado; 
        $encuentro->fecha_hora = $fecha_hora; 
        $encuentro->observaciones = $observaciones;         

        $encuentro->save();
        return redirect()->route('encuentro.show',$encuentro);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Encuentro $encuentro)
    {
        $equipo_local = Equipo::find($encuentro->equipo_local_id);
        $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
        $sede = Sede::find($encuentro->sede_id);
        return view('encuentros.encuentroShow', compact('encuentro','equipo_local','equipo_visitante','sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $matchs = Encuentro::all();

        $data = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($encuentro->sede_id);


            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($data,$dato);

        }
        $pdf = app('dompdf.wrapper')->setPaper('a4', 'landscape');
        ;
        view()->share('encuentros',$data);
        $pdf->loadView('pdfs.encuentroPDF', $data);
        $name = time() . '_encuentros.pdf';
        return $pdf->download($name);
    }

    /**
     * Display a view to find a Encuentro by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_id()
    {
        return view('encuentros.encuentroSearchID');
    }


    /**
     * Display a view to find a Encuentro by team.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_team()
    {
        return view('encuentros.encuentroSearchTeam');
    }

    /**
     * Gets a created Encuentro in storage by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets_id(Request $request)
    {
        $id_buscar = $request->input('id_buscar');
        $coincidencia = Encuentro::find($id_buscar);
        if(!empty($coincidencia)){
            $equipo_local = Equipo::find($coincidencia->equipo_local_id);
            $equipo_visitante = Equipo::find($coincidencia->equipo_visitante_id);
            $sede = Sede::find($coincidencia->sede_id);

            return view('encuentros.encuentroCoincidence',compact('coincidencia','equipo_local','equipo_visitante','sede'));
        }else{
            return view('encuentros.encuentroNoCoincidence');
        }
        
    }

    /**
     * Gets a created Encuentro in storage by team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gets_team(Request $request)
    {
        $id_buscar = $request->input('id_buscar');
        $coincidencias = Encuentro::where('equipo_local_id', $id_buscar)->orWhere('equipo_visitante_id', $id_buscar)->get();

        $encuentros = array();

        foreach($coincidencias as $coincidencia){


            $dato = [
                
                'encuentro' => $coincidencia,
                'equipo_local' => Equipo::find($coincidencia->equipo_local_id),
                'equipo_visitante' => Equipo::find($coincidencia->equipo_visitante_id),
                'sede' => Sede::find($coincidencia->sede_id),

            ];

            array_push($encuentros,$dato);
        }


        return view('encuentros.encuentroCoincidences',compact('encuentros'));
        
    }

}
